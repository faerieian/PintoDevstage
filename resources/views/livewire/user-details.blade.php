<div class="content-area">
    <div class="content-header">
        <h2 class="content-header-title">ข้อมูลลูกค้าทั้งหมด</h2>
        <button class="add-new-button">+ สร้างลูกค้าใหม่</button>
    </div>
    <div class="content-tab">
        <div class="category-tabs">
            <p class="title-tab active">ทั้งหมด (900)</p>
            <p class="title-tab">ตามสั่ง (800)</p>
            <p class="title-tab">โปรแกรม (100)</p>
        </div>
        <div class="search-bar">
            <div class="input-group">
                <img src="{{ asset('icon/icon-search.svg') }}" alt="Search" class="icon-search">
                <input type="text" placeholder="ค้นหาลูกค้า" class="custom-input">
            </div>
        </div>
    </div>


    <div class="content-table">
        <!-- Table content here -->
        <table style="margin-top: 30px">
            <thead>
                <tr>
                    <th class="th-title">
                        รหัสลูกค้า
                        <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                    </th>
                    <th class="th-title">LINE ID</th>
                    <th class="th-title">
                        ชื่อลูกค้า
                        <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                    </th>
                    <th class="th-title">ชื่อเล่น</th>
                    <th class="th-title">ประเภท</th>
                    <th class="th-title">
                        สมัคร
                        <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                    </th>
                    <th class="th-title">
                        รวมยอดชำระ
                        <img src="{{ asset('icon/icon-arrow-filter.svg') }}" alt="Filter" class="icon-filter">
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Repeat this row for each entry in table -->
                {{-- <tr>
                    <td class="custid">000900</td>
                    <td class="td-text">ninkidog</td>
                    <td class="td-text">รจนวรรณ เลียงพาณิชย์</td>
                    <td class="td-text">นึง</td>
                    <td class="td-text">โปรแกรม : ลดน้ำหนัก</td>
                    <td class="td-text">2023/09/19</td>
                    <td class="td-amount-total">10,350</td>
                </tr> --}}
                <!-- ... more rows ... -->

                @foreach ($users as $user)
                <tr>
                    <td class="custid">{{ $user->id }}</td>
                    <td class="td-text">{{ $user->line_id }}</td>
                    <td class="td-text">
                          <!-- Link to edit user -->
                          <button class="btn-edit" wire:click="redirectToEdit({{ $user->id }})">
                            {{ $user->name }} {{ $user->surname }}
                        </button>

                    </td>
                    <td class="td-text">{{ $user->nickname }}</td>
                    <td class="td-text">{{ $user->work_type }}</td>
                    <td class="td-text">{{ $user->created_at->format('Y/m/d') }}</td>
                    <td class="td-amount-total"> <!-- need to fetch this data separately -->
                        <!-- Display total amount here -->
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>
      <!-- ... paginations ... -->
      <div class="pagination">
        <img src="{{ asset('icon/icon-chevron-left.svg') }}" alt="ChevronLeft" class="icon-chevron">
        <span class="page-number active">1</span>
        <span class="page-number">2</span>
        <span class="page-number">3</span> <!-- Current active page -->
        <span class="page-number">4</span>
        <span class="page-number">5</span>
        <img src="{{ asset('icon/icon-chevron-right.svg') }}" alt="ChevronRight" class="icon-chevron">
    </div>

</div>
