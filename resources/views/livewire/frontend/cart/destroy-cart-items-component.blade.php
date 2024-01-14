<div>
    @if (Cart::instance('default')->count() > 0)
        <div class="text-center mt-4">
            <a href="#" wire:click.prevent="removeAll()" class="btn btn--grey js-remove-all-product rounded-pill">
                <i class="icon-recycle"></i>
                الغاء السلة
            </a>

        </div>
    @endif
</div>
