<div>
    <div><h2> สร้างวัตถุดิบใหม่</h2></div>

    <ul class="content-tab">
        <div class="create-customers-tabs">
        <li class="@if($currentTab == 'ingredients-tab') active @endif">
            <a wire:click.prevent="setTab('ingredients-tab')" href="#">ข้อมูลวัตถุดิบ</a>
        </li>
        <li class="@if($currentTab == 'nutrition') active @endif">
            <a wire:click.prevent="setTab('nutrition')" href="#">ข้อมูลโภชนาการ</a>
        </li>
    </div>
    </ul>


    <form  wire:submit="save">
        <div class="tab-hearder">
            @if($currentTab == 'ingredients-tab')
                @include('livewire.ingredients-tab')
            @elseif($currentTab == 'nutrition')
                @include('livewire.create-nutrition')
            @endif
        </div>

        <div class="footer-btn">
            @if($currentTab !== 'nutrition')
                <button type="button" wire:click="goToNextTab" class="add-new-button">
                    บันทึกต่อ
                    <img src="{{ asset('icon/icon-arrowright.svg') }}"  class="icon-smt-btn">
                </button>
            @else
            <button type="submit" class="add-new-button">
                <img src="{{ asset('icon/icon-submit.svg') }}"  class="icon-smt-btn">
                บันทึกวัตถุดิบใหม่
            </button>
            @endif
        </div>
    </form>
</div>
