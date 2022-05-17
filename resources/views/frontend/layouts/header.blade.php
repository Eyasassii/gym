<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="#"><img src="/assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    @if(auth()->user())
                        <div class="header-btns d-none d-lg-block f-right">
                            <x-utils.link
                                class="btn"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <x-slot name="text">
                                    @lang('Logout')
                                    <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none"/>
                                </x-slot>
                            </x-utils.link>
                        </div>
                        <x-utils.link
                            class="dropdown-item"
                            icon="c-icon mr -2 cil-account-logout"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none"/>
                            </x-slot>
                        </x-utils.link>
                    @else
                        <!-- Header-btn -->
                        <div class="header-btns d-none d-lg-block f-right">
                            <a href="{{ route('frontend.auth.login') }}" class="btn">{{__('auth.login')}}</a>
                        </div>
                    @endif
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
