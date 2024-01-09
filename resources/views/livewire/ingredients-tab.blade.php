    <!-- Include additional CSS file -->
    <link href="{{ asset('css/style_userinfo.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style_nutrition.css') }}" rel="stylesheet">
    <div class="content-table">
    <div class="creuser-table">


        <div class="form-group-basic-info">
            <label>ประเภทสินค้า</label>
            <div class="radio-group">
                <label for="boxedfood">
                    <input type="radio" id="boxedfood" value="boxedfood" wire:model="selectedCategory">
                    <span class="radio-label"> อาหารกล่อง </span>
                </label>

                <label for="drink">
                    <input type="radio" id="drink" value="drink" wire:model="selectedCategory">
                    <span class="radio-label"> เครื่องดื่ม </span>
                </label>
            </div>
        </div>

        <div class="form-group-basic-info">
            <label for="name">ชื่อวัตถุดิบ</label>
            <input type="text"  id="name" name="name" class="form-control" placeholder=""  wire:model="name">
        </div>



        <div class="form-group-basic-info">
            <label for="nutrition">กลุ่มสารอาหาร</label>
            <div class="birthdate-selectors">

                <!-- สารอาหาร -->
                 <!-- Nutrition Select -->
                <select wire:model="nutritionType">
                    <option value="">เลือกสารอาหาร</option>
                    <option value="คาโบไฮเดรต">คาโบไฮเดรต</option>
                    <option value="โปรตีน">โปรตีน</option>
                    <option value="ผัก">ผัก</option>
                </select>


            </div>
        </div>

        <div class="form-group-basic-info">
            <label for="typenutrition">ประเภท</label>
            <div class="birthdate-selectors">

                  <!-- Type Nutrition Select -->
                <select wire:model="typeNutrition">
                    <option value="">เลือกประเภท</option>
                    <option value="ข้าว">ข้าว</option>
                    <option value="ธัญพืช">ธัญพืช</option>
                    <option value="ผักหัว">ผักหัว</option>
                    <option value="แป้ง">แป้ง</option>
                </select>

            </div>
        </div>
    </div>



</div>
