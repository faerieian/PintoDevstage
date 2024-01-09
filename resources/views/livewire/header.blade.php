<div>
    <header class="header">
        <div class="header-content" style="display: flex; justify-content: space-between; align-items: center;">
            <div class="logo">
                <!-- logo here -->
                <img src="{{ asset('icon/icon-pintoplus-logo.svg') }}" alt="Logo">
            </div>
            <div class="header-right">
                <span>{{ now()->timezone('Asia/Bangkok')->locale('th')->isoFormat('ddddที่ D MMMM') }} {{ now()->year + 543 }}</span>
                <span class="clock-icon"><img src="{{ asset('icon/clock.svg') }}" alt="clock Icon" style="width: 12px; height: 12px;"></span>
                <span>{{ now()->timezone('Asia/Bangkok')->format('H:i') }}</span>
                <span class="divider"></span>
                <div class="dropdown">
                    <button class="header-btn" wire:click="toggleDropdown">
                        <span class="user-profile-img"> <img src="{{ asset('image/userprofile.png') }}" alt="UserProfile"></span>
                        <span class="user-name-txt"> Hello, Nook</span>
                        <span class="arrow-icon"> <img src="{{ asset('icon/arrowdropdown.svg') }}" alt="Dropdown Icon" style="width: 10px; height: 10px;"></span>
                    </button>
                    @if ($dropdownOpen)
                    <div class="dropdown-menu" wire:transition="fade">
                        <a href="#" wire:click="goToProfile">User Profile</a>
                        <a href="#" wire:click="logout">Log Out</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>

</div>
