<?php

namespace App\Http\Livewire\Frontend;

use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\PaymentCategory;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodOffline;
use App\Models\State;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CheckoutComponent extends Component
{

    use LivewireAlert;

    public $cart_subtotal; 
    public $cart_tax;
    public $cart_tax_Text;
    public $cart_total;
    
    public $coupon_code;
    public $cart_discount;


    public $payment_categories;
    public $payment_methods = [];
    public $payment_method_details = [];


    public $payment_category_id = '' ;
    public $payment_method_id = '';
    public $payment_method_detail_id = '' ;

    public $payment_category_name_ar;
       

 


    protected $listeners = [
        'updateCart'=>'mount'
    ];

    public function mount(){
        // access all addresses related to customer
        $this->cart_subtotal    = getNumbers()->get('subtotal');
        $this->cart_tax         = getNumbers()->get('productTaxes');
        $this->cart_tax_Text    = getNumbers()->get('taxText');
        $this->cart_discount    = getNumbers()->get('discount');
        $this->cart_total       = getNumbers()->get('total');

    }


    public function applyDiscount(){
        
        //check if the getNumbers()->get('subtotal') > 0 means there are product in the cart
        if( getNumbers()->get('subtotal') > 0 ){

            // Get coupon infrom from db using coupon_code came from view livewire /checkout-component.blade.php
            $coupon = Coupon::whereCode($this->coupon_code)->whereStatus(true)->first();
            
            // if there is no coupon came from db equil by query above 
            if(!$coupon){

                // give alert and make coupon_code as null for getting new coupon
                $this->coupon_code = '';
                $this->alert('error', 'Coupon is invalid !');

            }else{
                
                // if there is coupon in db then use discount function from model to get the discount to cart_subtotal 
                $couponValue = $coupon->discount($this->cart_subtotal);
                
                // if discount came right and bigger than zero then 
                if($couponValue > 0){

                    // make the session of coupon to use in general helper in getNumbers() function and view
                    session()->put('coupon', [
                        'code' => $coupon->code , 
                        'value' => $coupon->value, // maybe is percentage or fixed
                        'discount' => $couponValue // get only discount in fixed came from discount function in the productCouponModel
                    ]); 

                    $this->coupon_code = session()->get('coupon')['code'];
                    $this->emit('updateCart');
                    
                    $this->alert('success','coupon is applied successfully');

                } else if($couponValue == 0){ // means checkDate() says date is expired
                    $this->alert('error','product coupon is invalid or expired');
                }else{ // means checkUsedTimes() in productCoupon model says we losed all try of coupon because we used it
                    $this->alert('error','product coupon is used more than its permition which ' . $coupon->use_times .' time/s ' );
                }
            }

        }else{
            $this->coupon_code = '';
            $this->alert('error', 'No products available in your cart');
        }

    } 

    public function removeCoupon(){
        session()->remove('coupon');// it will remove coupon session so it will remove discount from getNumbers() function in GeneralHelper.php
        $this->coupon_code = '';
        $this->emit('updateCart');
        $this->alert('success','Coupon is removed');
    }


    public function updatePaymentCategory(){
        $payment_category = PaymentCategory::whereId($this->payment_category_id)->first();
        $this->payment_category_name_ar = $payment_category->name_ar;
        $this->payment_method_id= '';
        $this->payment_methods = [];
        $this->payment_method_details = [];
    } 


    public function render()
    {
        
        $this->payment_categories = PaymentCategory::whereStatus(true)->get();
        $this->payment_methods = $this->payment_category_id != '' ? PaymentMethodOffline::whereStatus(true)->wherePaymentCategoryId($this->payment_category_id)->get() : [] ; 
        $this->payment_method_details = $this->payment_method_id != '' ? PaymentMethodOffline::whereStatus(true)->whereId($this->payment_method_id)->get() : [];


        return view('livewire.frontend.checkout-component',[
            'payment_categories' => $this->payment_categories,
            'payment_methods' => $this->payment_methods,
            'payment_method_details' => $this->payment_method_details,

        ]);
    }
}
