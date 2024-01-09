   <div class="delivery-form">
        <div class="">

            <div class="form-group-basic-info-custom">
                <label for="Main Area">
                    <img src="{{ asset('icon/icon-home.svg') }}"  class="icon-smt-btn">
                     <span class="area-title"> ที่อยู่หลัก </span>
                </label>
                <textarea id="mainaddress" name="mainaddress" rows="4" class="form-control" wire:model="mainaddress" ></textarea>
            </div>

        <div class="form-group-basic-info-custom">
            <label for="Share Location">
                Share Location
            </label>
            <input type="text" id="location" name="location" class="form-control" placeholder="" wire:model="location">
        </div>

        <div class="form-group-basic-info-custom">
            <label for="Phone number">
                เบอร์มือถือ
            </label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="" wire:model="phone">
        </div>

    </div>

    <div class="box-container">

        <div class="form-group-basic-info-custom box-input-top">
            <label for="Secondary Area">
                <img src="{{ asset('icon/icon-home.svg') }}"  class="icon-smt-btn">
            <span  class="area-title" >ที่อยู่รอง (ถ้ามี) </span>
            </label>
            <textarea id="secondaryaddress" name="secondaryaddress" rows="4" class="form-control"  wire:model="secondaryaddress"></textarea>
        </div>

    <div class="form-group-basic-info-custom">
        <label for="Share Location">Share Location</label>
        <input type="text" id="secondarylocation" name="secondarylocation" class="form-control" placeholder="" wire:model="secondarylocation">
    </div>

    <div class="form-group-basic-info-custom">
        <label for="Phone number">เบอร์มือถือ</label>
        <input type="text" id="secondaryphone" name="secondaryphone" class="form-control" placeholder="" wire:model="secondaryphone">
    </div>

</div>


   </div>
