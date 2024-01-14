<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product ;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartComponent extends Component
{

    use LivewireAlert;

    public $cartCount;
    public $wishListCount;

    // is used to run and operate event updateCart in all pages to update carts and wishlistcarts with there counts from carts fussades in real time
    protected $listeners = [
        'updateCart' => 'update_cart',
        'removeFromCart' => 'remove_from_cart',
        'removeAll' => 'remove_all',
        'removeFromWishList' => 'remove_from_wish_list',
        'moveToCart' => 'move_to_cart'
    ];

    public function mount(){
        
        // السطرين التاليين سوف يعطينا العدداد للعناصر حتي اذا تم طلب المنتج اكثر من منرة سيعتبرة من ضمن عناصر العد
        // $this->cartCount = Cart::instance('default')->count();
        // $this->wishListCount = Cart::instance('wishlist')->count();

        $this->cartCount = Cart::instance('default')->content()->count();
        $this->wishListCount = Cart::instance('wishlist')->content()->count();
       
    }

    public function update_cart(){

        $this->cartCount = Cart::instance('default')->content()->count();
        $this->wishListCount = Cart::instance('wishlist')->content()->count();

    }

    public function remove_from_cart($rowId){
        
            $cart = Cart::content()->where('rowId',$rowId);
            if($cart->isNotEmpty()){
                Cart::remove($rowId);
            }
             // Cart::instance('default')->remove($rowId);
             $this->emit('updateCart');
             $this->alert('success','تمت إزالة العنصر من سلة التسوق الخاصة بك !');
     
             if(cart::instance('default')->count() == 0){
                 return redirect()->route('frontend.cart');
             }
        

       

    }

    public function remove_all(){
        Cart::instance('default')->destroy();

        // Cart::instance('default')->remove($rowId);
        $this->emit('updateCart');
        $this->alert('success','تمت إزالة جميع العناصر من سلة التسوق الخاصة بك!');

        if(cart::instance('default')->count() == 0){
            return redirect()->route('frontend.cart');
        }

    }

    public function remove_from_wish_list($rowId){


        $cart = Cart::content()->where('rowId',$rowId);
            if($cart->isNotEmpty()){
                Cart::instance('wishlist')->remove($rowId);
            }

        // Cart::instance('wishlist')->remove($rowId);
        $this->emit('updateCart');
        $this->alert('success','تمت إزالة العنصر من قائمة أمنياتك!');

        if(cart::instance('wishlist')->count() == 0){
            return redirect()->route('frontend.wishlist');
        }
        
    }

    public function move_to_cart($rowId){


        $item = Cart::instance('wishlist')->get($rowId);

        $duplicates = Cart::instance('default')->search(function ($cartItem , $rId ) use($rowId) {
            return $rId === $rowId;
        });

        if($duplicates->isNotEmpty()){

            Cart::instance('wishlist')->remove($rowId);
            $this->alert('error','المنتج موجود بالفعل في سلة المفضلات!');
        }else{
            Cart:: instance('default')->add($item->id , $item->name, 1, $item->price)->associate(Product::class);
            Cart::instance('wishlist')->remove($rowId);
            $this->emit('updateCart');

            $this->alert('success','تمت إضافة المنتج إلى سلة المفضلات الخاصة بك بنجاح');
        }

        if(cart::instance('wishlist')->count() == 0){
            return redirect()->route('frontend.wishlist');
        }

        
    }

    public function render()
    {
        $this->cartCount = Cart::instance('default')->content()->count();
        $this->wishListCount = Cart::instance('wishlist')->content()->count();

        return view('livewire.frontend.cart-component');
    }
}
