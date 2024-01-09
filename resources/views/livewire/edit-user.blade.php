<div>
    <div class="header-user">
        <h2> ข้อมูลลูกค้า:{{ $user->name }} {{ $user->surname }} </h2>
        <button type="submit" class="add-new-button" wire:click="save">
            <img src="{{ asset('icon/icon-submit.svg') }}"  class="icon-smt-btn">
            อัพเดทข้อมูล
        </button>
    </div>

    <ul class="content-tab">
        <div class="create-customers-tabs">
        <li class="@if($currentTab == 'basicInfo') active @endif">
            <a wire:click.prevent="setTab('basicInfo')" href="#">ข้อมูลเบื้องต้น</a>
        </li>
        <li class="@if($currentTab == 'healthInfo') active @endif">
            <a wire:click.prevent="setTab('healthInfo')" href="#">ข้อมูลสุขภาพเชิงลึก</a>
        </li>
        <li class="@if($currentTab == 'preferences') active @endif">
            <a wire:click.prevent="setTab('preferences')" href="#">ที่อยู่จัดส่ง</a>
        </li>
    </div>
    </ul>


    <form  wire:submit="save">
        <div class="tab-hearder">
            @if($currentTab == 'basicInfo')
                @include('livewire.edit-basic-user')
            @elseif($currentTab == 'healthInfo')
                @include('livewire.edit-health-user')
            @elseif($currentTab == 'preferences')
                @include('livewire.edit-address-user')
            @endif
        </div>

        <div class="footer-btn">
            @if($currentTab !== 'preferences')
                <button type="button" wire:click="goToNextTab" class="add-new-button">
                    บันทึกต่อ
                    <img src="{{ asset('icon/icon-arrowright.svg') }}"  class="icon-smt-btn">
                </button>
            @else
            <button type="submit" class="add-new-button">
                <img src="{{ asset('icon/icon-submit.svg') }}"  class="icon-smt-btn">
                อัพเดท
            </button>
            @endif
        </div>
    </form>
</div>
