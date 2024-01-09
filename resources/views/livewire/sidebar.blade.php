<div>
    <aside class="sidebar">
        <nav>
            <ul>
                <!-- menu items -->
                <li class="list-navmenu {{ $activeTab == 'dashboard' ? 'active' : '' }}" wire:click="$set('activeTab', 'dashboard')">

                    {{-- change icon-dashboard when active --}}
                    @if ($activeTab == 'dashboard')
                    <!-- Active icon -->
                    <img src="{{ asset('icon/icondash-sidebar-hover.svg') }}" alt="Dashboard" class="icon-dashboard">
                    @else
                    <!-- Default icon -->
                    <img src="{{ asset('icon/icondash-sidebar.svg') }}" alt="Dashboard" class="icon-dashboard">
                    @endif

                    <a href="{{ route('dashboard') }}" wire:navigate> หน้าแรก </a>
                </li>
                    <!-- ... customer list ... -->
                <li class="list-navmenu {{ $activeTab == 'customer' ? 'active' : '' }}" wire:click="$set('activeTab', 'customer')">

                     {{-- change icon-customer when active --}}
                     @if ($activeTab == 'customer')
                     <!-- Active icon -->
                     <img src="{{ asset('icon/iconcust-sidebar-hover.svg') }}" alt="Customer" class="icon-customer">
                     @else
                     <!-- Default icon -->
                     <img src="{{ asset('icon/iconcust-sidebar.svg') }}" alt="Customer" class="icon-customer">
                     @endif

                    ลูกค้า
                    @if ($activeTab == 'customer')
                        <!-- Sub-menu content for 'customer' -->
                        <ul class="submenu">
                            {{-- <li class="list-submenu"> <a wire:navigate href="{{ route('customerdetails') }}"> ดูข้อมูลลูกค้าทั้งหมด </a></li> --}}
                            <li class="list-submenu {{ Route::currentRouteName() == 'userdetails' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('userdetails') }}">ดูข้อมูลลูกค้าทั้งหมด </a>
                              </li>

                              <li class="list-submenu {{ Route::currentRouteName() == 'user' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('user') }}">สร้างลูกค้าใหม่ </a>
                              </li>
                              <li class="list-submenu {{ Route::currentRouteName() == 'recipes' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('recipes') }}">สูตรความต้องการ </a>
                              </li>
                        </ul>
                    @endif
                </li>
                <!-- ... food menu ... -->
                <li class="list-navmenu {{ $activeTab == 'menu' ? 'active' : '' }}" wire:click="$set('activeTab', 'menu')">

                         {{-- change icon-foodmenu when active --}}
                     @if ($activeTab == 'menu')
                     <!-- Active icon -->
                     <img src="{{ asset('icon/iconfood-sidebar-hover.svg') }}" alt="Foodmenu" class="icon-foodmenu">
                     @else
                     <!-- Default icon -->
                     <img src="{{ asset('icon/iconfood-sidebar.svg') }}" alt="Foodmenu" class="icon-foodmenu">
                     @endif

                    เมนูอาหาร
                    @if ($activeTab == 'menu')
                        <!-- Sub-menu content for 'foodmenu' -->
                        <ul class="submenu">
                            <li class="list-submenu">test1</li>
                            <li class="list-submenu">test2</li>
                            <li class="list-submenu">test3</li>
                        </ul>
                    @endif
                </li>

                 <!-- ... ingredients ... -->
                 <li class="list-navmenu {{ $activeTab == 'ingredients' ? 'active' : '' }}" wire:click="$set('activeTab', 'ingredients')">

                      {{-- change icon-ingredients when active --}}
                      @if ($activeTab == 'ingredients')
                      <!-- Active icon -->
                      <img src="{{ asset('icon/iconingr-sidebar-hover.svg') }}" alt="ingredients" class="icon-ingredients">
                      @else
                      <!-- Default icon -->
                      <img src="{{ asset('icon/iconingr-sidebar.svg') }}" alt="ingredients" class="icon-ingredients">
                      @endif

                    วัตถุดิบ
                    @if ($activeTab == 'ingredients')
                        <!-- Sub-menu content for 'ingredients' -->
                        <ul class="submenu">
                            <li class="list-submenu {{ Route::currentRouteName() == 'ingredientsdetails' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('ingredientsdetails') }}">ดูข้อมูลวัตุดิบทั้งหมด </a>
                              </li>
                            <li class="list-submenu {{ Route::currentRouteName() == 'ingredients' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('ingredients') }}">สร้างวัตุดิบใหม่ </a>
                              </li>
                            <li class="list-submenu {{ Route::currentRouteName() == 'nutrients' ? 'active' : '' }}">
                                <a wire:navigate href="{{ route('nutrients') }}">สร้างกลุ่มสารอาหารใหม่ </a>
                              </li>
                            <li class="list-submenu">สร้างประเภทใหม่</li>
                        </ul>
                    @endif
                </li>

                 <!-- ... order ... -->
                 <li class="list-navmenu {{ $activeTab == 'order' ? 'active' : '' }}" wire:click="$set('activeTab', 'order')">

                       {{-- change icon-order when active --}}
                       @if ($activeTab == 'order')
                       <!-- Active icon -->
                       <img src="{{ asset('icon/iconorder-sidebar-hover.svg') }}" alt="order" class="icon-order">
                       @else
                       <!-- Default icon -->
                       <img src="{{ asset('icon/iconorder-sidebar.svg') }}" alt="order" class="icon-order">
                       @endif

                    ออร์เดอร์
                    @if ($activeTab == 'order')
                        <!-- Sub-menu content for 'order' -->
                        <ul class="submenu">
                            <li class="list-submenu">test1</li>
                            <li class="list-submenu">test2</li>
                            <li class="list-submenu">test3</li>
                        </ul>
                    @endif
                </li>
                <!-- ... prepare ... -->
                <li class="list-navmenu {{ $activeTab == 'prepare' ? 'active' : '' }}" wire:click="$set('activeTab', 'prepare')">

                     {{-- change icon-prepare when active --}}
                     @if ($activeTab == 'prepare')
                     <!-- Active icon -->
                     <img src="{{ asset('icon/iconprepare-sidebar-hover.svg') }}" alt="prepare" class="icon-prepare">
                     @else
                     <!-- Default icon -->
                     <img src="{{ asset('icon/iconprepare-sidebar.svg') }}" alt="prepare" class="icon-prepare">
                     @endif

                    จัดเตรียม
                    @if ($activeTab == 'prepare')
                        <!-- Sub-menu content for 'prepare' -->
                        <ul class="submenu">
                            <li class="list-submenu">test1</li>
                            <li class="list-submenu">test2</li>
                            <li class="list-submenu">test3</li>
                        </ul>
                    @endif
                </li>

                  <!-- ... delivery ... -->
                  <li class="list-navmenu {{ $activeTab == 'delivery' ? 'active' : '' }}" wire:click="$set('activeTab', 'delivery')">

                     {{-- change icon-delivery when active --}}
                     @if ($activeTab == 'delivery')
                     <!-- Active icon -->
                     <img src="{{ asset('icon/icondelivery-sidebar-hover.svg') }}" alt="delivery" class="icon-delivery">
                     @else
                     <!-- Default icon -->
                     <img src="{{ asset('icon/icondelivery-sidebar.svg') }}" alt="delivery" class="icon-delivery">
                     @endif

                    จัดส่ง
                    @if ($activeTab == 'delivery')
                        <!-- Sub-menu content for 'delivery' -->
                        <ul class="submenu">
                            <li class="list-submenu">test1</li>
                            <li class="list-submenu">test2</li>
                            <li class="list-submenu">test3</li>
                        </ul>
                    @endif
                </li>
            </ul>
        </nav>
    </aside>
</div>
