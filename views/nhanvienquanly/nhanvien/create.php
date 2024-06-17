<?php
/*
if (isset($data['result'])) {
    $code = $data['result']['code'];
    $mess = $data['result']['message'];
} else {
    $code = -1;
}*/
?>
<div class="container justify-content-center mt-5 mb-5">
    <a href="?controller=nhanvien&action=index" class="btn btn-primary">Quay về</a>
    <h2 class="text-center">THÊM NHÂN VIÊN</h2>
    <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <?php if ( isset($data['result']['code']) ) { 
        if( $data['result']['code']==0 ) {
            echo "<div class='alert alert-success text-center mx-5'>Thêm nhân viên thành công</div>";
        } else if ( $data['result']['code']>0 ) {
            $mess = $data['result']['message'];
            echo "<div class='alert alert-danger text-center mx-5'><p>Xảy ra lỗi khi thêm nhân viên: $mess</p></div>";
        }}?>
        <form id="addnv-form" method="post" action="?controller=nhanvien&action=create" class="mx-5 p-3" novalidate>
            <div class="form-group">
                <label for="hoten">Họ tên</label>
                <input name="hoten" type="text" placeholder="Họ tên" id="hoten" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">Mật khẩu</label>
                <input name="pass" type="password" placeholder="Mật khẩu" id="pass" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm-pass">Xác nhận mật khẩu</label>
                <input name="confirm-pass" type="password" placeholder="Xác nhận mật khẩu" id="confirm-pass" value="" class="form-control" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="sdt">Số điện thoại</label>
                    <input name="sdt" type="text" placeholder="Số điện thoại" id="sdt" value="" class="form-control" required>
                </div>
                <div class="col">
                    <label>Giới tính</label>
                    <div>
                        <div class="form-check form-check-inline" >
                            <input name="gioitinh" type="radio" id="gt-nam" value="Nam" class="form-check-input" checked>
                            <label for="gt-nam" class="form-check-label mr-3">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="gioitinh" type="radio" id="gt-nu" value="Nữ" class="form-check-input">
                            <label for="gt-nu" class="form-check-label mr-3">Nữ</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="ngaysinh">Ngày sinh</label>
                    <input name="ngaysinh" type="date" placeholder="Ngày sinh" id="ngaysinh" value="" class="form-control" required>
                </div>
                <div class="col">
                    <label for="cmnd">CMND</label>
                    <input name="cmnd" type="text" placeholder="CMND" id="cmnd" value="" class="form-control" required>
                </div>
            </div>

            <label>Chức vụ</label>
            <select class="form-select form-control mb-3" name="chucvu" id="chucvu">
                <option value="" selected>Chọn chức vụ</option>
                <option value="NVBH">Nhân viên bán hàng</option>
                <option value="NVK">Nhân viên kho</option>
                <option value="NVKT">Nhân viên kế toán</option>
            </select>

            <div id="error-message" class="d-none alert alert-danger">Input is invalid</div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-success px-5">Thêm</button>
            </div>
            
        </form>
    </div>
    </div>
</div>

<script>
let add_form = document.getElementById("addnv-form");
add_form.addEventListener('submit', e=> {
    let email = document.querySelector('#email');
    let pass = document.querySelector('#pass');
    let confirm_pass = document.querySelector('#confirm-pass');
    let hoten = document.querySelector('#hoten');
    let sdt = document.querySelector('#sdt');
    let ngaysinh = document.querySelector('#ngaysinh');
    let cmnd = document.querySelector('#cmnd');
    let chucvu = document.querySelector('#chucvu');

    if ( email.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email");
        e.preventDefault();
        email.focus();
    } else if ( !validateEmail(email.value) ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email đúng cú pháp");
        e.preventDefault();
        email.focus();
    } else if ( pass.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập mật khẩu");
        e.preventDefault();
        pass.focus();
    } else if ( confirm_pass.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập xác nhận mật khẩu");
        e.preventDefault();
        confirm_pass.focus();
    } else if ( pass.value!=confirm_pass.value ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Xác nhận mật khẩu không đúng");
        e.preventDefault();
        confirm_pass.focus();
    } else if ( hoten.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập họ tên đầy đủ");
        e.preventDefault();
        hoten.focus();
    } else if ( ngaysinh.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập ngày sinh");
        e.preventDefault();
        ngaysinh.focus();
    } else if ( cmnd.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập chứng minh nhân dân");
        e.preventDefault();
        cmnd.focus();
    } else if ( chucvu.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập chức vụ");
        e.preventDefault();
        chucvu.focus();
    }
})

function validateEmail(email) 
{
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}
</script>