<?php
use Gloudemans\Shoppingcart\Facades\Cart;
?>

@extends('layouts.app')

@section('content')
    <section class="py-4 pref">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">قائمة المفضلات</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="bg-transparent text-white breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-white"
                                    href="{{ route('frontend.index') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">مفضلاتي</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="py-5 ">
            <h2 class="h5 text-uppercase mb-4">قائمة المفضلات</h2>
            <div class="row">
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">

                        <table class="table text-nowrap">
                            <thead class="pref">
                                <tr style="border-bottom: 1px solid;">
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase bg-transparent text-white">البطاقة</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase bg-transparent text-white">السعر</strong></th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase bg-transparent text-white">نقل الي السلة</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col"> <strong
                                            class="text-sm text-uppercase bg-transparent text-white">حذف</strong>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-0">

                                @forelse (Cart::instance('wishlist')->content() as $item)
                                    <livewire:frontend.wishlist.wishlist-item-component :item="$item->rowId" />

                                @empty
                                    <tr>
                                        <td class="pl-0 border-light" colspan="5">
                                            <p class="text-center">
                                                No wish list items found!
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                {{-- <livewire:frontend.wish-list-total-component /> --}}
            </div>
        </section>
    </div>

    <div class="holder">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-tag "></i>
                        </div>
                        <div class="text">
                            <h4>أسعارنا الأفضل</h4>
                            {{-- <p>
                                سيتم تسليم طلبك خلال 3-5 أيام عمل بعد كل ذلك
                                العناصر الخاصة بك متاحة
                            </p> --}}
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping"></i>
                        </div>
                        <div class="text">
                            <h4>عروضنا الأقوى</h4>
                        </div>
                    </div>

                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-call-center"></i>
                        </div>
                        <div class="text">
                            <h4>خدمة عملاء متميزة</h4>

                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-shopping-1"></i>
                        </div>
                        <div class="text">
                            <h4>منتجات تناسب احتياجك</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
