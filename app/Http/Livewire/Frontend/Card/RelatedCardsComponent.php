<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RelatedCardsComponent extends Component
{ 
    use LivewireAlert;

    public $related_cards;


    public function addToCart($id){ 

        $card = Card::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        
        // check if card is already exist in the default cart
        $duplicates = Cart::instance('default')->search(function($cartItem,$rowId) use($card) {
            return $cartItem->id === $card->id;
        });

        if($duplicates->isNotEmpty()){
            $this->alert('error','الباقة  مضافة مسبقا!!');
        }else{
            Cart:: instance('default')->add($card->id, $card->name, 1, $card->price)->associate(Card::class);
            //This event is used to update cart and withlist count on success adding to cart in all pages 
            $this->emit('updateCart');
            $this->alert('success','تم إضافة الباقة الي السلة بنجاح!');
        }

    }

    public function addToWishList($id){
        
        $card = Card::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        
        $duplicates = Cart::instance('wishlist')->search(function($cartItem,$rowId) use($card) {
            return $cartItem->id === $card->id;
        });

        if($duplicates->isNotEmpty()){
            $this->alert('error','الباقة مضافة مسبقا');
        }else{
            Cart:: instance('wishlist')->add($card->id, $card->name, 1, $card->price)->associate(Card::class);
            $this->emit('updateCart');
            $this->alert('success','تم اضافة الباقة الي قائمة مفضلاتك بنجاح');
        }


    }

    public function render()
    {
        return view('livewire.frontend.card.related-cards-component');
    }
}
