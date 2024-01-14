<div>
    <div class="d-flex">
        {{-- wishlist part  --}}
        <div class="dropdn dropdn_fullheight minicart d-none">
            <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMiniwishlist">
                <i class="icon-heart-stroke"></i>
                <span class="minicart-qty">({{ $wishListCount }})</span>
                <span class="minicart-total hide-mobile">$34.99</span>
            </a>
        </div>

        {{-- cart part  --}}
        <div class="dropdn dropdn_fullheight minicart">
            <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" data-panel="#dropdnMinicart">
                <i class="icon-basket"></i>
                <span class="minicart-qty">({{ $cartCount }})</span>
                <span class="minicart-total hide-mobile">$34.99</span>
            </a>
        </div>
    </div>


</div>
