
<div class="content-area">
    <div class="content-header">
        <h2 class="content-title-recipes">โจทย์ความต้องการ</h2>
    </div>

    <div class="form-container-recipes">
        <div class="recipes-container">
            <div class="recipes-flex-item-left">
        <form class="recipes-form"  wire:submit="save">
            <span class="title-bold"><h3> เพิ่มสูตรความต้องการ </h3></span>

            <div class="form-group-recipes">
                <label for="code">รหัสสูตร</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="" wire:model.live="code">
                @error('code') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group-recipes">
                <label for="name">ชื่อสูตรความต้องการ</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="" wire:model.live="name">
                @error('namerecipes') <span class="error">{{ $message }}</span> @enderror
            </div>

             <div class="form-group-recipes">
                 <button  type="submit" class="add-new-button">
                     <img src="{{ asset('icon/icon-submit.svg') }}"  class="icon-smt-btn">
                     บันทึกสูตรความต้องการใหม่
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
                                รหัสลูกค้า
                                <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                            </th>
                            <th class="th-title">ชื่อสูตร</th>
                            <th class="th-title">
                                จำนวนลูกค้า
                                <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this row for each entry in table -->
                        {{-- <tr>
                            <td class="custid">Gut</td>
                            <td class="td-text">ปรับสมดุลย์ลำใส้</td>
                            <td class="td-text-csamount">39</td>
                        </tr> --}}
                        <!-- ... more rows ... -->
                        @foreach($recipes as $recipe)
                    <tr>
                        <td class="custid">{{ $recipe->code }}</td>
                        <td class="td-text">{{ $recipe->name }}</td>
                        <td class="td-text-csamount">{{ $recipe->customers_count ?? '0' }}</td>
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
