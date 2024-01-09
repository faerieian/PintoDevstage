    <!-- Include additional CSS file -->
    <link href="{{ asset('css/style_nutrition.css') }}" rel="stylesheet">
    <div class="content-table"  id="nutrition-form">

           <!-- Nutrients Fields -->
            @foreach ($nutrients as $index => $nutrient)
            <div>
                <input wire:model="nutrients.{{ $index }}.name" placeholder="ชื่อสารอาหาร">
                <input wire:model="nutrients.{{ $index }}.value" placeholder="ปริมาณต่อ 100 กรัม">
                <input wire:model="nutrients.{{ $index }}.unit" placeholder="หน่วย">
            </div>
        @endforeach
        <button wire:click.prevent="addNutrientField" class="btnadd" >เพิ่มองค์ประกอบ</button>
        <!-- First Row -->
        {{-- <div class="form-nutrition">
            <div class="input-group">
                <label for="nutrient1">สารอาหาร</label>
                <input type="text" id="nutrient1" name="nutrient1" placeholder="ชื่อสารอาหาร">
            </div>
            <div class="input-group">
                <label for="value1">ปริมาณต่อ 100 กรัม</label>
                <input type="text" id="value1" name="value1" placeholder="ปริมาณต่อ 100 กรัม">
            </div>
            <div class="input-group">
                <label for="unit1">หน่วย</label>
                <input type="text" id="unit1" name="unit1" placeholder="หน่วย">
            </div>
        </div> --}}
        <!-- Subsequent Rows -->
        <!-- ... -->



    </div>


