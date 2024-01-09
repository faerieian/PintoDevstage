<div class="form-container-health">

    <div class="health-form">
            <div class="flex-item-left">
        <div class="form-group-health">
            <label for="Underlyingdisease">โรคประจำตัว</label>
            <input type="text" id="underlying_disease" name="underlyingdisease" class="form-control-health" placeholder="" wire:model="underlying_disease">
        </div>

        <div class="form-group-health">
            <label>กรุ๊ปเลือด</label>
            <div class="radio-group">
                <label for="bloodtypeA">
                    <input type="radio" id="bloodtypeA" name="bloodtype" value="A" wire:model="blood_type" >

                    <span class="radio-label"> A </span>
                </label>

                <label for="bloodtypeB">
                    <input type="radio" id="bloodtypeB" name="bloodtype" value="B" wire:model="blood_type">

                    <span class="radio-label"> B </span>
                </label>

                <label for="bloodtypeAB">
                    <input type="radio" id="bloodtypeAB" name="bloodtype" value="AB" wire:model="blood_type" >
                    <span class="radio-label"> AB </span>
                </label>
                <label for="bloodtypeO">
                    <input type="radio" id="bloodtypeO" name="bloodtype" value="O" wire:model="blood_type" >
                    <span class="radio-label"> O </span>
                </label>
            </div>
        </div>

        <div class="form-row-inline-health">
            <!-- Number input for LDL -->
            <div class="form-group-health">
                <label for="bloodldl">ค่าเลือด LDL</label>
                <input type="number" id="bloodldl" name="bloodldl" placeholder="" wire:model="blood_ldl">
            </div>
            <!-- Number input for HFL -->
            <div class="form-group-health">
                <label for="bloodhfl">ค่าเลือด HFL</label>
                <input type="number" id="bloodhfl" name="bloodhfl" placeholder=""  wire:model="blood_hfl">
            </div>

        </div>



        <div class="form-group-health">
            <label for="regular_medication">ยาประจำตัว</label>
            <input type="text" id="regular_medication" name="regular_medication" class="form-control-health" placeholder="" wire:model="regular_medication">
        </div>

        <div class="form-group-health">
            <label for="sideeffects">อาการข้างเคียง</label>
            <input type="text" id="sideeffects" name="sideeffects" class="form-control-health" placeholder="" wire:model="side_effects">
        </div>

        <div class="form-group-health">
            <label>ขับถ่าย</label>
            <div class="radio-group">
                <label for="defecation_patternA">
                    <input type="radio" id="defecation_patternA" name="defecation_pattern" value="regularly" wire:model="defecation_pattern">
                    <span class="radio-label">เป็นเวลา</span>
                </label>

                <label for="defecation_patternB">
                    <input type="radio" id="defecation_patternB" name="defecation_pattern" value="3-4days" wire:model="defecation_pattern">
                    <span class="radio-label"> 3-4วัน </span>

                </label>

                <label for="defecation_patternAB">
                    <input type="radio" id="defecation_patternAB" name="defecation_pattern" value="sometime" wire:model="defecation_pattern">
                    <span class="radio-label"> สวนบางครั้ง </span>
                </label>
                <label for="defecation_patternO">
                    <input type="radio" id="defecation_patternO" name="defecation_pattern" value="always" wire:model="defecation_pattern">
                    <span class="radio-label">ท้องเสียประจำ</span>
                </label>
            </div>
        </div>

        <div class="form-group-health">
            <label for="other_health_info">อื่นๆ</label>
            <textarea id="other_health_info" name="other_health_info" rows="3" class="form-control-health" wire:model="other_health_info"></textarea>
        </div>

        {{-- end flex item --}}
    </div>

    <div class="flex-item-right">
    <div class="new-column">
        <!-- Add new column content here -->
        <span class="title-bold"><h3> เอกสารสุขภาพ </h3></span>
        <div class="file-upload">
            <label for="files" class="browse-files-button">Browse Files</label>
            <input type="file" wire:model="health_documents" wire:key="health_documents_input" multiple>
            {{-- <button type="button" class="browse-files-button">Browse Files</button> --}}
            <!-- List of files -->
            <div class="file-list">
                <button type="button" class="file-item">
                    NinkSkintest.doc
                    <img src="{{ asset('icon/icon-trash.svg') }}"  class="icon-btn-trash">
                </button>
                <button type="button" class="file-item">
                    NinkChestXray.pdf
                    <img src="{{ asset('icon/icon-trash.svg') }}"  class="icon-btn-trash">
                </button>
                <!-- Add more files as needed -->
            </div>
        </div>
    </div>
</div>
    </div>
</div>
