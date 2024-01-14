@php
    // get the current RouteName Fired this page
    $current_page = \Route::currentRouteName();
@endphp


<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('assets/users/' . auth()->user()->user_image) }}" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->full_name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">
                    Menu
                </li>

                @foreach ($admin_side_menu as $menu)
                    @if (count($menu->appearedChildren) == 0)
                        <li>
                            <a href="{{ route('admin.' . $menu->as) }}" class="waves-effect">
                                <i class="{{ $menu->icon != null ? $menu->icon : 'fas fa-home' }}"></i>
                                <span><b>{{ $menu->display_name }}</b></span>
                            </a>
                        </li>
                    @else
                        {{-- sup menu title --}}
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="{{ $menu->icon != null ? $menu->icon : 'fas fa-home' }}"></i>
                                <span><b>{{ $menu->display_name }}</b></span>
                            </a>
                            {{-- sup menu item  --}}
                            @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                <ul class="sub-menu" aria-expanded="false">
                                    @foreach ($menu->appearedChildren as $sub_menu)
                                        <li>
                                            <a href="{{ route('admin.' . $sub_menu->as) }}">
                                                <i
                                                    class="{{ $sub_menu->icon != null ? $sub_menu->icon : 'fas fa-home' }}"></i>
                                                <span><b> {{ $sub_menu->display_name }}</b></span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
