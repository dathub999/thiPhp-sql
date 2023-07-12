$(document).ready(function () {
    $('#payment').on('click', function (e) {
        // e.preventDefault(); // Now nothing will happen
        // let url = $('.update_cart-url').data('url');
        // let id = $(this).data('id');
        // let quantity=$(this).parents('tr').find('input.qunatity').val();
        // $.ajax({
        //     type:"GET",
        //     url:url,
        //     data: {id:id,quantity:quantity},

        //     success :function(data){
        //         if(data.code=200){
        //             $('body').html(data.cart_component);
        //         }
        //     },
        //     error :function(){

        //     },
    });
    $('.cart_update').on('click', function (e) {
        e.preventDefault(); // Now nothing will happen
        let url = $('.update_cart-url').data('url');
        let id = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.qunatity').val();
        $.ajax({
            type: "GET",
            url: url,
            data: { id: id, quantity: quantity },

            success: function (data) {
                if (data.code = 200) {
                    $('body').html(data.cart_component);
                }
            },
            error: function () {

            },
        })
    });
    $('.addorder').on('click', function (e) {
        e.preventDefault(); // Now nothing will happen
        let url = $('.addorderr').data('url');
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: url,  
            data: { id: id  },
            success: function (data) {
                if (data.code = 200) {
                   alert('Order placed successfully');
                   
                }
            },
            error: function () {
                alert('error');
            },
        })
    });

});
// Lấy tham chiếu đến nút "no" và phần tử thông báo


// Gắn sự kiện click vào nút "no"
// noButton.addEventListener('click', function() {
//   // Hiển thị thông báo khi nút "no" được nhấp
// //   notification.style.csstext = 'display:block;position:absolute;color:red'   ;
// var htmlBlock = document.createElement('#notification');
//   htmlBlock.innerHTML = '<p>This is an HTML block.</p><p>It can contain multiple elements.</p>';
//   notification.style.cssText = 'display: block; color: red; font-size: 16px; position:absolute ';
//   notification.appendChild(htmlBlock);
//   notification.textContent = 'Bạn đã chọn "No"';
// });

var noButton = document.getElementById('noButton');
var notification = document.getElementById('notification');

noButton.addEventListener('click', function () {
//     // Ẩn thông báo nếu đang hiển thị
    notification.style.display = 'none';

//     // Xóa nội dung thông báo
    notification.innerHTML = '';

//     // Tạo phần tử HTML mới cho icon dấu tích xanh
    var successIcon = document.createElement('i');
    successIcon.classList.add('fas', 'fa-check-circle', 'success-icon');

//     // Tạo phần tử HTML mới cho nút tắt
    var closeButton = document.createElement('button');
    closeButton.textContent = 'X';
    closeButton.classList.add('close-button');

//     // Tạo phần tử HTML mới cho thông báo
    var notificationContent = document.createElement('div');
    notificationContent.innerHTML = '<p>Successful payment</p>';
    notificationContent.appendChild(successIcon);
    notificationContent.appendChild(closeButton);

//     // Thêm các lớp CSS từ Bootstrap cho thông báo và định dạng nút tắt
    notification.classList.add('alert', 'alert-success', 'success-message');
    closeButton.classList.add('btn', 'btn-danger', 'close-button-style');

//     // Chèn nội dung thông báo vào phần tử thông báo
    notification.appendChild(notificationContent);

//     // Hiển thị thông báo
    notification.style.display = 'block';

});
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('close-button')) {
        // Ẩn thông báo và làm mới lại nội dung
        notification.style.display = 'none';
        notification.innerHTML = '';
    }
});


//             //]]>

// // $(function () {
// //     $(document).on('click', '.cart_update', cartUpdate);
// // })