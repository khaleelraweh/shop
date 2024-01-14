<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateQtyComponent extends Component
{
    use LivewireAlert;

    public $card;
    public $quantity =1;

    public function decreaseQuantity(){
        if($this->quantity > 1){

            $this->quantity--;
        }
    } 
      
    public function increaseQuantity(){

        if($this->card->quantity == -1 ){
            $this->quantity++;
        }else{
            if(  $this->card->quantity  >  $this->quantity  ){
                $this->quantity++;
            }else{
                $this->alert('warning','هذه هي الكمية القصوى التي يمكنك إضافتها!');
            }
        }

        
    }

    public function addToCart(){

        // check if the card is already exist in the cart :search in the instance defalut in the table
        $duplicates = Cart::instance('default')->search(function($cartItem,$rowId){
            return $cartItem->id === $this->card->id;
        });

        if($duplicates->isNotEmpty()){
            $this->alert('error','الباقة موجودة مسبقا!!');
        }else{
            Cart:: instance('default')->add(
                $this->card->id,
                $this->card->name,
                $this->quantity,
                $this->card->price
            )->associate(Card::class);

            $this->emit('updateCart');
            $this->quantity = 1;
            $this->alert('success','تم اضافة الباقة الي السلة بنجاح');
        }
    }

    public function addToWishList(){

        $duplicates = Cart::instance('wishlist')->search(function($cartItem,$rowId){
            return $cartItem->id === $this->card->id;
        });

        if($duplicates->isNotEmpty()){
            $this->alert('error','الباقة موجودة مسبقا !!');
            $wishListStatus = true;
        }else{
            
            Cart:: instance('wishlist')->add(
                $this->card->id,
                $this->card->name,
                1, 
                $this->card->price
            )->associate(Card::class);

            $this->emit('updateCart');
            $this->alert('success','تم إضافة الباقة الي مفضلاتك بنجاح');
    
        }
    }


    public function render()
    {
        return view('livewire.frontend.card.update-qty-component');
    }
}
