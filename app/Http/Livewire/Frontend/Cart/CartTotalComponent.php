<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartTotalComponent extends Component
{

    use LivewireAlert;

    public $cart_subtotal;
    public $cart_discount;
    public $cart_tax;
    public $cart_total;

    public $cart_tax_Text;
    public $coupon_code;
    public $cart_shipping;


    // to update subtotal and total every time we update using increment function and decrement funtion in ..
    protected $listeners = [
        'updateCart'=>'mount'
    ]; 
    
    public function mount(){

        $this->cart_subtotal    = getNumbers()->get('subtotal');
        $this->cart_tax         = getNumbers()->get('productTaxes');
        $this->cart_tax_Text    = getNumbers()->get('taxText');
        $this->cart_discount    = getNumbers()->get('discount');
        $this->cart_total       = getNumbers()->get('total');
        $this->cart_shipping    = getNumbers()->get('shipping');

    }
    public function mountUpdate(){

        $this->cart_subtotal    = getNumbers()->get('subtotal');
        $this->cart_tax         = getNumbers()->get('productTaxes');
        $this->cart_tax_Text    = getNumbers()->get('taxText');
        $this->cart_discount    = getNumbers()->get('discount');
        $this->cart_total       = getNumbers()->get('total');
        $this->cart_shipping    = getNumbers()->get('shipping');
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

    public function render()
    {
        return view('livewire.frontend.cart.cart-total-component');
    }
}
