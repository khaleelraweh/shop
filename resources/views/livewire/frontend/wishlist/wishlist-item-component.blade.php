{{-- this called in  views/frontend/wishlist.blade.php in wishlist item section  --}}

<tr x-data="{ open: true }" x-show="open">

    <th class="ps-3 py-3 border-light" scope="row">
        <div class="d-flex align-items-center">
            <a class="reset-anchor d-block animsition-link"
                href="{{ route('frontend.card', $wishListItem->model->slug) }}">
                <img src="{{ asset('assets/cards/' . $wishListItem->model->firstMedia?->file_name) }}"
                    alt="{{ $wishListItem->model->name }}" width="70" />
            </a>
            <div class="ms-3">
                <strong class="h6 bg-transparent">
                    <a class="reset-anchor animsition-link"
                        href="{{ route('frontend.card', $wishListItem->model->slug) }}">
                        {{ $wishListItem->model->name }}
                    </a>
                </strong>
            </div>
        </div>
    </th>

    <td class="p-3 align-middle border-light ">
        <p class="mb-0 small">${{ $wishListItem->model->price }}</p>
    </td>
    {{-- move item from wish list to cart  --}}
    <td class="p-3 align-middle border-light">
        <div class="moveToCart">
            <a wire:click.prevent="moveToCart('{{ $wishListItem->rowId }}')" x-on:click="open = ! open"
                class="btn btn-link text-decoration-none reset-anchor animsition-link">
                نقل الى سلة التسوق
            </a>
        </div>
        </div>
    </td>

    {{-- Remove item from cart and cart page using removeFromCart function and alpinejs lab --}}
    <td class="p-3 align-middle border-light">
        <a wire:click.prevent="removeFromWishList('{{ $wishListItem->rowId }}')" x-on:click="open = ! open"
            class="reset-anchor " style="cursor: pointer">
            <i class="icon-recycle"></i>
        </a>
    </td>
</tr>

{{-- {{dd($item)}} --}}
