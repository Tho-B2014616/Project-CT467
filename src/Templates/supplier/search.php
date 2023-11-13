<br>
<br>

<div class="col-md-8 offset-2 pb-5">
    <div class="container__search">
        <h1 class="text-center pb-4">Tìm kiếm nhà cung cấp</h1>
        <!-- Form search -->
        <div class="form__search">
            <form method="POST" action="" id="searchForm">
               <input type="text" name="table" value="supplier" style="display: none;">
                <input type="text" name="action" value="search" style="display: none;"> 

                <div class="form-display form-group" id="tenspFields" style="display: block;">
                    <label for="tensp" class="form-label">Nhập tên nhà cung cấp để tìm:</label>
                    <input type="text" class="form-control form-control-lg" name="ten_ncc" id="tensp">
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
