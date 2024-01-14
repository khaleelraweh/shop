<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartAsidebarItemComponent extends Component
{
    use LivewireAlert;

    protected $listeners = ['refreshComponent'=>'$refresh'];
   
    public $itemRowId; // every item in the cart has special rowId as key 
    public $item_quantity = 1; 

    public $cart_subtotal;
    public $cart_discount;
    public $cart_tax;
    public $cart_total;
 
    public function mount(){

        $this->item_quantity = Cart::instance('default')->get($this->itemRowId)->qty ?? 1;
        
        $this->cart_subtotal = Cart::instance('default')->subtotal();
        $this->cart_tax = Cart::Instance('default')->tax();
        $this->cart_total = Cart::Instance('default')->total();
    }
 
    // to update subtotal and total every time we update using increment function and decrement funtion in ..
    // protected $listeners = [
    //     'updateCart'=>'mount'
    // ]; 
 
   

    public function decreaseQuantity($rowId){

        if($this->item_quantity > 1 ){
            $this->item_quantity = $this->item_quantity - 1;
            Cart::instance('default')->update($rowId, $this->item_quantity);
            $this->emit('updateCart');
        }
    } 

    public function increaseQuantity($rowId){

        if($this->item_quantity > 0 ){
            $this->item_quantity = $this->item_quantity + 1;
            Cart::instance('default')->update($rowId, $this->item_quantity);
            $this->emit('updateCart');
        }

    }

    public function removeFromCart($rowId){
        $this->emit('removeFromCart' , $rowId );
   }

   
    public function render()
    {
        
            
        return view('livewire.frontend.cart-asidebar-item-component', [
            
            'cartItem' =>  Cart::instance('default')->get($this->itemRowId) ,
        ]);
    }
}
