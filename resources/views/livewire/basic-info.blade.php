    <!-- Include additional CSS file -->
    <link href="{{ asset('css/style_userinfo.css') }}" rel="stylesheet">

    <div class="content-table">
    <div class="creuser-table">
        <div class="form-group-basic-info">
            <label for="lineId">Line ID</label>
            <input type="text"  id="lineId" name="lineId" class="form-control" placeholder="" wire:model.live="lineId">
        </div>

        <div class="form-group-basic-info">
            <label>เพศ</label>
            <div class="radio-group">
                <label for="male">
                    <input type="radio" id="male" name="gender" value="male" wire:model="gender" >
                    <span class="radio-label"> ชาย </span>
                </label>

                <label for="female">
                    <input type="radio"  id="female" name="gender" value="female" wire:model="gender">
                    <span class="radio-label"> หญิง </span>
                </label>

                <label for="other">
                    <input type="radio"  id="other" name="gender" value="other" wire:model="gender">
                    <span class="radio-label"> ทางเลือก </span>
                </label>
            </div>
        </div>


        <div class="form-group-basic-info">
            <label for="name">ชื่อจริง</label>
            <input type="text"  id="name" name="name" class="form-control" placeholder=""  wire:model="name">
        </div>

        <div class="form-group-basic-info">
            <label for="surname">นามสกุล</label>
            <input type="text"  id="surname" name="surname" class="form-control" placeholder="" wire:model="surname">
        </div>

        <div class="form-group-basic-info">
            <label for="nickname">ชื่อเล่น</label>
            <input type="text"  id="nickname" name="nickname" class="form-control" placeholder="" wire:model="nickname">
        </div>

        <div class="form-row-inline">
            <div class="form-group">
                <label for="weight">น้ำหนัก (ก.ก.)</label>
                <input type="number" id="weight" name="weight" placeholder="53" wire:model="weight" >
            </div>
            <div class="form-group">
                <label for="height">ส่วนสูง (ซ.ม.)</label>
                <input type="number" id="height" name="height" placeholder="156" wire:model="height" >
            </div>
        </div>


        <div class="form-group-basic-info">
            <label for="birthdate">วันเกิด</label>
            <div class="birthdate-selectors">
                <!-- Day -->
                <select  name="day" id="day" wire:model="day">
                    <option value="" disabled selected>วัน</option>
                    @for ($day = 1; $day <= 31; $day++)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endfor
                </select>

                <!-- Month -->
                <select  name="month" id="month" wire:model="month">
                    <option value="" disabled selected>เดือน</option>
                    <option value="1">มกราคม</option>
                    <option value="2">กุมภาพันธ์</option>
                    <option value="3">มีนาคม</option>
                    <option value="4">เมษายน</option>
                    <option value="5">พฤษภาคม</option>
                    <option value="6">มิถุนายน</option>
                    <option value="7">กรกฎาคม</option>
                    <option value="8">สิงหาคม</option>
                    <option value="9">กันยายน</option>
                    <option value="10">ตุลาคม</option>
                    <option value="11">พฤศจิกายน</option>
                    <option value="12">ธันวาคม</option>
                </select>


                <!-- Year -->
            <select name="year" id="year" wire:model="year">
                <option value="" disabled selected>ปี (พ.ศ.)</option>
                @for ($loopYear = date('Y') + 543; $loopYear >= 2500; $loopYear--) {{-- Current year + 543 to convert to Buddhist era --}}
                    <option value="{{ $loopYear }}">{{ $loopYear }}</option>
                @endfor
            </select>

            </div>
        </div>
    </div>
        {{-- end div creuser-table --}}
        <div class="creuser-table">
        <div class="form-group-basic-info-custom box-container">
            <label class="title-bold">สูตรอาหารที่ต้องการ <span class="label-sp"> (ไม่เกิน 2 โจทย์ความต้องการ)</span></label>
            <div class="checkbox-group">

                <input type="checkbox" id="general" value="general" wire:model="interests.general">
                <label for="general">ทั่วไป</label>

                <input type="checkbox" id="anti-aging" value="anti-aging" wire:model="interests.anti-aging">
                <label for="anti-aging">Anti-Aging</label>

                <input type="checkbox" id="diet" value="diet" wire:model="interests.diet">
                <label for="diet">ลดน้ำหนัก</label>

                <input type="checkbox" id="muscle" value="muscle" wire:model="interests.muscle">
                <label for="muscle">สร้างกล้ามเนื้อ</label>

                <input type="checkbox" id="brian" value="brian" wire:model="interests.brian">
                <label for="brian">สมอง</label>

                <input type="checkbox" id="pressure" value="pressure" wire:model="interests.pressure">
                <label for="pressure">ความดัน/โรคหัวใจ</label>

                <input type="checkbox" id="diabetes" value="diabetes" wire:model="interests.diabetes">
                <label for="diabetes">เบาหวาน</label>

                <input type="checkbox" id="liver" value="liver" wire:model="interests.liver">
                <label for="liver">โรคตับ</label>

                <input type="checkbox" id="chemo" value="chemo" wire:model="interests.chemo">
                <label for="chemo">ก่อนคีโม</label>

                <input type="checkbox" id="cao" value="cao" wire:model="interests.cao">
                <label for="cao">เก๊า</label>

                <input type="checkbox" id="intestine" value="intestine" wire:model="interests.intestine">
                <label for="intestine">ปรับสมดุลลำไส้</label>
            </div>
        </div>

    </div>
    {{-- end div creuser-table  --}}
    <div class="creuser-table">
        <div class="box-container">
            <span class="title-bold"><h3> ข้อมูลกิจกรรม</h3></span>


        <div class="form-group-basic-info-custom">
            <label for="work_type">ทำงานประเภท</label>
            <input type="text" id="work_type" name="work_type" class="form-control" placeholder="" wire:model="work_type">
        </div>

        <div class="form-group-basic-info-custom-style">
            <label class="title-thin">การออกกำลังกาย</label>
            <div class="radio-group box-input-top">
                <label for="exercise_frequency1">
                    <input type="radio" id="exercise_frequency1" name="exercise" value="frequent" wire:model="exercise_frequency">
                    <span class="radio-label"> เป็นประจำเกือบทุกวัน </span>
                </label>

                <label for="exercise_frequency2">
                    <input type="radio" id="exercise_frequency2" name="exercise" value="1-2-days" wire:model="exercise_frequency">
                    <span class="radio-label"> เล็กน้อย 1-2 วันต่อสัปดาห์ </span>
                </label>

                <label for="exercise_frequency3">
                    <input type="radio" id="exercise_frequency3" name="exercise" value="none" wire:model="exercise_frequency">
                    <span class="radio-label"> ไม่ออกกำลังกาย </span>
                </label>
            </div>
        </div>

        <div class="form-group-basic-info-custom-style box-input-top">
            <label  class="title-thin">การนอน</label>
            <div class="radio-group box-input-top">
                <label for="sleep_pattern1">
                    <input type="radio" id="sleep_pattern1" name="sleep_pattern" value="more-8" wire:model="sleep_pattern">
                    <span class="radio-label"> นอนเยอะ 10 ชั่วโมง </span>
                </label>

                <label for="sleep_pattern2">
                    <input type="radio" id="sleep_pattern2" name="sleep_pattern" value="6-8" wire:model="sleep_pattern">
                    <span class="radio-label">นอนดี 8-10 ชั่วโมง </span>
                </label>

                <label for="sleep_pattern3">
                    <input type="radio" id="sleep_pattern3" name="sleep_pattern" value="less-8" wire:model="sleep_pattern">
                    <span class="radio-label"> นอนน้อย ต่ำกว่า 8 ชั่วโมง </span>
                </label>
            </div>
        </div>

        <div class="form-group-basic-info-custom-style box-input-top">
            <label  class="title-thin">รับประทารอาหารต่อวัน</label>
            <div class="radio-group box-input-top">
                <label for="meals_per_day1">
                    <input type="radio" id="meals_per_day1" name="meals_per_day" value="3time" wire:model="meals_per_day">
                    <span class="radio-label"> 3 มื้อ </span>
                </label>

                <label for="meals_per_day2">
                    <input type="radio" id="meals_per_day2" name="meals_per_day" value="2time" wire:model="meals_per_day">
                    <span class="radio-label"> 2 มื้อ </span>
                </label>

                <label for="meals_per_day3">
                    <input type="radio" id="meals_per_day3" name="meals_per_day" value="1time" wire:model="meals_per_day">
                    <span class="radio-label"> 1 มื้อ </span>
                </label>
            </div>
        </div>


        <div class="form-group-basic-info-custom box-input-top">
            <label for="food_allergies">ประวัติการแพ้อาหาร</label>
            <textarea id="food_allergies" name="food_allergies" rows="2" class="form-control" wire:model="food_allergies"
            ></textarea>
        </div>
    </div>
</div>
    {{-- end div creuser-table --}}

</div>
