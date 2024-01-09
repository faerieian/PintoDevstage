
<div class="content-area">
    <div class="content-header">
        <h2 class="content-title-recipes">สร้างกลุ่มสารอาหารใหม่</h2>
    </div>

    <div class="form-container-recipes">
        <div class="recipes-container">
            <div class="recipes-flex-item-left">
        <form class="recipes-form"  wire:submit="save">
            <span class="title-bold"><h3> เพิ่มกลุ่มสารอาหาร </h3></span>

            <div class="form-group-recipes">
                <label for="coden">รหัสสารอาหาร</label>
                <input type="text" id="coden" name="coden" class="form-control" placeholder="" wire:model.live="coden">
                @error('code') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group-recipes">
                <label for="name">ชื่อสารอาหาร</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="" wire:model.live="name">
                @error('namerecipes') <span class="error">{{ $message }}</span> @enderror
            </div>

             <div class="form-group-recipes">
                 <button  type="submit" class="add-new-button">
                     <img src="{{ asset('icon/icon-submit.svg') }}"  class="icon-smt-btn">
                     บันทึกกลุ่มสารอาหารใหม่
                 </button>
             </div>

         </form>

         @error('code') <span class="error">{{ $message }}</span> @enderror
         @error('name') <span class="error">{{ $message }}</span> @enderror

        </div>
                {{-- end item flex left --}}
                <div class="recipes-flex-item-right">
         <div class="new-recipes-column">
             <!-- Add new column content here -->
             <span class="title-bold-filter"><h3> ทั้งหมด(11) </h3></span>
             <div class="content-table">
                <!-- Table content here -->
                <table>
                    <thead>
                        <tr>
                            <th class="th-title">
                                รหัสโจทย์
                                <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                            </th>
                            <th class="th-title">ชื่อสารอาหาร</th>
                            <th class="th-title">
                                จำนวนวัตถุดิบ
                                <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this row for each entry in table -->
                        {{-- <tr>
                            <td class="custid">pro</td>
                            <td class="td-text">โปรตัน</td>
                            <td class="td-text-csamount">39</td>
                        </tr> --}}
                        <!-- ... more rows ... -->
                        @foreach($nutrient as $nutr)
                    <tr>
                        <td class="custid">{{ $nutr->coden }}</td>
                        <td class="td-text">{{ $nutr->name }}</td>
                        <td class="td-text-csamount">{{ $nutr->customers_count ?? '0' }}</td>
                    </tr>
                         @endforeach



                    </tbody>
                </table>

            </div>
         </div>

        </div>
        {{-- end item flex right --}}
     </div>
     {{-- end recipes container --}}
    </div>
</div>
</div>
</div>
