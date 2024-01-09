<div>
    <div><h2> สร้างลูกค้าใหม่</h2></div>

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
                @include('livewire.basic-info')
            @elseif($currentTab == 'healthInfo')
                @include('livewire.health')
            @elseif($currentTab == 'preferences')
                @include('livewire.user-address')
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
                บันทึกลูกค้าใหม่
            </button>
            @endif
        </div>
    </form>
</div>
