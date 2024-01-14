<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
 
class WishlistAsidebarItemComponent extends Component
{

    use LivewireAlert;


    public $itemRowId; // every item in the cart has special rowId as key 
    public $item_quantity = 1; 

    public $cart_subtotal;
    public $cart_discount;
    public $cart_tax;
    public $cart_total;


    // public function mount(){

    //     $this->item_quantity = Cart::instance('wishlist')->get($this->itemRowId)->qty ?? 1;
        
    //     $this->cart_subtotal = Cart::instance('wishlist')->subtotal();
    //     $this->cart_tax = Cart::Instance('wishlist')->tax();
    //     $this->cart_total = Cart::Instance('wishlist')->total();
    // }
 

    

    // to update subtotal and total every time we update using increment function and decrement funtion in ..
    // protected $listeners = [
    //     'updateCart'=>'mount'
    // ]; 
 
    // public function mountUpdate(){

    //     $this->cart_subtotal = Cart::instance('wishlist')->subtotal();
    //     $this->cart_tax = Cart::Instance('wishlist')->tax();
    //     $this->cart_total = Cart::Instance('wishlist')->total();
    // }

    public function decreaseQuantity($rowId){

        if($this->item_quantity > 1 ){
            $this->item_quantity = $this->item_quantity - 1;
            Cart::instance('wishlist')->update($rowId, $this->item_quantity);
            $this->emit('updateCart');
        }

    } 

    public function increaseQuantity($rowId){

        if($this->item_quantity > 0 ){
            $this->item_quantity = $this->item_quantity + 1;
            Cart::instance('wishlist')->update($rowId, $this->item_quantity);
            $this->emit('updateCart');
        }

    }

    public function removeFromCart($rowId){
         $this->emit('removeFromCart' , $rowId );
         return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.frontend.wishlist-asidebar-item-component' , [
            'cartItem' =>Cart::instance('wishlist')->get($this->itemRowId)
        ]);
    }
}
