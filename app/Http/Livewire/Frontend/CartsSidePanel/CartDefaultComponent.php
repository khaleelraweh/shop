<?php

namespace App\Http\Livewire\Frontend\CartsSidePanel;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartDefaultComponent extends Component
{
    use LivewireAlert;

    // public $cart_subtotal;
    // public $cart_discount; //discount from coupon
    // public $cart_tax;
    // public $cart_shipping;
    // public $cart_total;

    public $admin_discount = 0;

    public $total_original_price = 0;
    public $total_offer_price = 0;
    public $total_final_price = 0 ;


    public $carts;

    public $item_quantity = 1; 

    protected $listeners = [
        'updateCart' => 'mountUpdate'
    ];

    public function mount(){
        // $this->cart_subtotal = getNumbers()->get('subtotal');
        // $this->cart_discount = getNumbers()->get('discount');
        // $this->cart_tax = getNumbers()->get('productTaxes');
        // $this->cart_shipping = getNumbers()->get('shipping');
        // $this->cart_total = getNumbers()->get('total');

        $this->refreshCart();
        $this->admin_discount = Session()->get('offer_discount');

        
    }

    

    public function mountUpdate(){
        // $this->cart_subtotal = Cart::instance('default')->subtotal();
        // $this->cart_tax = Cart::Instance('default')->tax();
        
        $this->refreshCart();
        $this->admin_discount = Session()->get('offer_discount');
    }

    public function refreshCart(){
        // $this->carts = Cart::instance('default')->content();

        $this->total_offer_price = 0;
        $this->total_original_price = 0 ;
        foreach (Cart::instance('default')->content() as $item) {
            // $this->total_original_price +=  $item->model->price * $item->qty   ; 
            $this->total_offer_price += $item->model->offer_price * $item->qty ;
        }
        Session()->put('offer_discount', $this->total_offer_price);
        $this->total_final_price = getNumbers()->get('total'); // get total price after discount by general helper
        $this-> total_original_price = Cart::instance('default')->total();
    }
    

    public function decreaseQuantity($rowId){

        $card = Cart::get($rowId);

        if($card->qty > 1 ){
            $qty = $card->qty  - 1;
            Cart::instance('default')->update($rowId , $qty);
            $this->emit('updateCart');
        }

    } 

    public function increaseQuantity($rowId){

        $card = Cart::get($rowId);
        $qty = $card->qty  + 1;
        Cart::instance('default')->update($rowId,  $qty);
        $this->emit('updateCart');
     
    }

    public function removeFromCart($rowId){
        $this->emit('removeFromCart' , $rowId );

        // Cart::remove($rowId);
        // $this->emit('updateCart');
        // $this->alert('success','Item removed from your cart! ');

   }




    public function render()
    {
        // $this->refreshCart();
        // session()->forget('offer_discount1');
        return view('livewire.frontend.carts-side-panel.cart-default-component');
    }
}
