<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\SiteSetting;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    


    public function index(){
        // $main_slider = Slider::whereStatus(1)->whereNull('parent_id')->get();
        
       $main_sliders = Slider::with('firstMedia')
            ->MainSliders()
            // ->inRandomOrder()
            ->orderBy('published_on','desc')
            ->Active()
            ->take( 
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_main_sliders']
             )
        ->get();

        $adv_sliders = Slider::with('firstMedia')
            ->AdvertisorSliders()
            // ->inRandomOrder()
            ->orderBy('published_on','desc')
            ->Active()
            ->take(
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_advertisor_sliders']
            )
        ->get();


        $random_cards = Product::with('firstMedia', 'lastMedia' , 'photos')
            ->CardCategory()
            ->inRandomOrder()
            ->Active()
            ->HasQuantity()
            ->ActiveCategory()
            ->take(
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_random_cards']
            )
        ->get();

        $card_categories = ProductCategory::with('firstMedia')
            ->Active()
            ->RootCategory()
            ->CardCategory()
            ->HasProducts()
            ->take(
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_card_categories']
            )
        ->get();

        $common_questions = CommonQuestion::query()
        ->active()
        ->take(
            SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_questions']
        )
        ->get();

        $blog = News::query()
        ->active()
        ->take(
            SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_bogs']
        )
        ->get();
 
        return view('frontend.index',compact('main_sliders','adv_sliders','card_categories','random_cards','common_questions' ,'blog'));
    }

 
    public function card($slug){
        //get choisen card 
        $card  = Product::with('category','tags','photos','reviews')
        ->withAvg('reviews','rating')
        ->whereSlug($slug)
        ->Active()
        ->HasQuantity()
        ->ActiveCategory()
        ->firstOrFail();

        //get all related card that are the same of card_category of the card choisen
        $related_cards = Product::with('firstMedia','photos')->whereHas('category', function ($query) use ($card){
            $query->whereId($card->product_category_id)->whereStatus(true);
        })->inRandomOrder()
        ->Active()
        ->HasQuantity()
        ->take(
            SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_related_cards']
        )
        ->get(); // get in random order  only card which is active and has quantity :and take from them 4 card 

        return view('frontend.card',compact('card','related_cards'));
    }

    public function card_category($slug = null){

        // This is the specific category chosen
        $card_category = ProductCategory::withCount('cards')
                            ->whereSlug($slug)
                            ->whereStatus(true)
        ->first();

        
        
        // get all cards related to category chosen
        $cards = Product::with('firstMedia' , 'photos');
        $cards = $cards->with('category')->whereHas('category', function ($query) use ($slug) {
            $query->where([
                'slug' => $slug,
                'status'   => true
            ]);
        })->get();


        //get all card categories to show them of more choice 
        $more_categories = ProductCategory::with('firstMedia')
            ->Active()
            ->RootCategory()
            ->CardCategory()
            ->HasProducts()
            ->take(
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_more_categories']
            )
            ->where('slug' , '!=',$slug)
        ->get();

        return view('frontend.card_category',compact('card_category' , 'cards' , 'more_categories'));
    }

    public function cart(){

        $more_cards = Product::with('firstMedia', 'lastMedia' , 'photos')
            ->CardCategory()
            ->inRandomOrder()
            ->Active()
            ->HasQuantity()
            ->ActiveCategory()
            ->take(
                SiteSetting::whereNotNull('value')
                    ->pluck('value','name')
                    ->toArray()['site_more_like_cards']
            )
        ->get();

        return view('frontend.cart', compact('more_cards'));
    }

    public function wishlist(){
        return view('frontend.wishlist');
    }

    

   


}
