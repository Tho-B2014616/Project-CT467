<br>
<br>

<div class="col-md-8 offset-2 pb-5">
    <div class="container__search">
        <h1 class="text-center pb-4">Tìm kiếm sản phẩm</h1>
        <!-- Form search -->
        <div class="form__search">
            <form method="POST" action="" id="searchForm">
               <input type="text" name="table" value="product" style="display: none;">
                <input type="text" name="action" value="search" style="display: none;"> 
                <select id="selectField" class="form-control form-control-lg" onchange="showFields()">
                    <option value="tensp">Tìm theo tên</option>
                    <option value="field1">Tìm theo nhà cung cấp</option>
                    <option value="field3">Tìm theo số lô</option>
                </select>

                <div class="form-display form-group" id="tenspFields" style="display: block;">
                    <label for="tensp" class="form-label">Nhập tên sản phẩm để tìm:</label>
                    <input type="text" class="form-control form-control-lg" name="tensp" id="tensp">
                </div>

                <div class="form-display form-group" id="field1Fields">
                    <label for="field1" class="form-label">Nhập tên nhà cung cấp:</label>
                    <input type="text" class="form-control form-control-lg" name="ten_ncc" id="field1">
                </div>

                <div class="form-display form-group" id="field3Fields">
                    <label for="field3" class="form-label">Nhập số lô:</label>
                    <input type="number" class="form-control form-control-lg" name="so_lo" id="field3">
                </div>

                <div class="input-group-append d-flex justify-content-center">
                    <button class="btn btn-primary btn-lg " name="search-btn" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function showFields() {
    const selectedValue = document.getElementById('selectField').value;

    // Hide all form groups
    const formGroups = document.getElementsByClassName('form-display');
    for (const formGroup of formGroups) {
        formGroup.style.display = 'none';
    }

    // Show the selected form group
    const selectedFormGroup = document.getElementById(selectedValue + 'Fields');
    if (selectedFormGroup) {
        selectedFormGroup.style.display = 'block';
    }
}
</script>