<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class MoreCardsComponent extends Component
{
    use LivewireAlert
    ;
    public $more_cards;

    public function addToCart($id){ 

        $card = card::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();
        
        $duplicates = Cart::instance('default')->search(function($cartItem,$rowId) use($card) {
            return $cartItem->id === $card->id;
        });

        if($duplicates->isNotEmpty()){
            $this->alert('error','الباقة  مضافة مسبقا!!');
        }else{
            Cart:: instance('default')->add($card->id, $card->name, 1, $card->price)->associate(Card::class);
            $this->emit('updateCart');
            $this->alert('success','تم إضافة الباقة الي السلة بنجاح!');
            return redirect()->back();
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
        return view('livewire.frontend.cart.more-cards-component');
    }
}
