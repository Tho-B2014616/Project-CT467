// Handle Add Phiếu nhập / Phiếu xuất
function addItem() {
    var newItem = `
        <div class="input-group mb-2">
            <input type="text" name="ten_hh" class="form-control form-control-lg" min="1" placeholder="Tên hàng hóa" required>
            <input type="number" name="sl_hh" class="form-control form-control-lg" min="1" placeholder="Số lượng" required>
            <div class="input-group-append">
                <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
            </div>
        </div>
    `;
    document.getElementById("hang_hoa").insertAdjacentHTML("beforeend", newItem);
}

function removeItem(btn) {
    btn.closest(".input-group").remove();
}

// Hàm tạo nút phân trang
function createPaginationButtons(totalPages, currentPage) {
    const paginationContainer = document.getElementById('pagination-container');
    paginationContainer.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const listItem = document.createElement('li');
        const link = document.createElement('a');
        link.href = '#';
        link.textContent = i;

        if (i === currentPage) {
            listItem.classList.add('active');
        }

        link.addEventListener('click', () => {
            displayData(i);
            highlightCurrentPage(i);
        });

        listItem.appendChild(link);
        paginationContainer.appendChild(listItem);
    }
}

// Hàm làm nổi bật trang hiện tại
function highlightCurrentPage(page) {
    const paginationContainer = document.getElementById('pagination-container');
    const pages = paginationContainer.getElementsByTagName('li');

    for (let i = 0; i < pages.length; i++) {
        pages[i].classList.remove('active');
    }

    pages[page - 1].classList.add('active');
}

// Hiển thị trang đầu tiên khi trang web được tải
displayData(1);
createPaginationButtons(Math.ceil(products.length / itemsPerPage), 1);