<?php
if (isset($data['chitietnv']['data']) ) {
    $manv = $_GET['id'];
    $chitiet = $data['chitietnv']['data'];

    $hoten = $chitiet['HoTen'];
    $sdt = $chitiet['SDT'];
    $gioitinh = $chitiet['GioiTinh'];
    if ($gioitinh==='Nam') {
        $checkGT_nam = 'checked';
        $checkGT_nu = '';
    } else {
        $checkGT_nam = '';
        $checkGT_nu = 'checked';
    }
    $cmnd = $chitiet['CMND'];
    $ngaysinh = $chitiet['NgaySinh'];
    $email = $chitiet['Email'];
    $chucvu = $chitiet['ChucVu'];
    if ($chucvu==='NVBH') {
        $selectNVBH = 'selected';
        $selectNVK = '';
        $selectNVKT = '';
    } else if ($chucvu==='NVK') {
        $selectNVBH = '';
        $selectNVK = 'selected';
        $selectNVKT = '';
    } else {
        $selectNVBH = '';
        $selectNVK = '';
        $selectNVKT = 'selected';
    }
} else {
    $manv = '';
    $hoten = '';
    $sdt ='';
    $checkGT_nam = 'checked';
    $checkGT_nu = '';
    $cmnd = '';
    $ngaysinh = '';
    $email = '';
}
?>
<div class="container justify-content-center mt-5 mb-5">
    <div class="mb-3">
    <a href="?controller=nhanvien&action=view&id=<?=$manv?>" class="btn btn-outline-dark">Quay về</a>
    </div>
    
    <h2 class="text-center">SỬA NHÂN VIÊN</h2>
    <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <?php if ( isset($data['result']) ) { 
        if( $data['result']['code']==0 ) {
            echo "<div class='alert alert-success text-center mx-5'>Cập nhật nhân viên thành công</div>";
        } else if ( $data['result']['code']>0 ) {
            $mess = $data['result']['message'];
            echo "<div class='alert alert-danger text-center mx-5'><p>Xảy ra lỗi khi cập nhật: $mess</p></div>";
        }}?>
        <form id="updatenv-form" method="post" action="?controller=nhanvien&action=update&id=<?=$manv?>" class="mx-5 p-3" novalidate>
            <div class="form-group">
                <label for="hoten">Họ tên</label>
                <input name="hoten" type="text" placeholder="Họ tên" id="hoten" value="<?=$hoten?>" class="form-control" required>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sdt">Số điện thoại</label>
                    <input name="sdt" type="text" placeholder="Số điện thoại" id="sdt" value="<?=$sdt?>" class="form-control" required>
                </div>
                <div class="col">
                    <label>Giới tính</label>
                    <div>
                        <div class="form-check form-check-inline" >
                            <input name="gioitinh" type="radio" id="gt-nam" value="Nam" class="form-check-input" <?=$checkGT_nam?>>
                            <label for="gt-nam" class="form-check-label mr-3">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="gioitinh" type="radio" id="gt-nu" value="Nữ" class="form-check-input" <?=$checkGT_nu?>>
                            <label for="gt-nu" class="form-check-label mr-3">Nữ</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cmnd">CMND</label>
                    <input name="cmnd" type="text" placeholder="CMND" id="cmnd" value="<?=$cmnd?>" class="form-control" required>
                </div>
                <div class="col">
                    <label for="ngaysinh">Ngày sinh</label>
                    <input name="ngaysinh" type="date" placeholder="Ngày sinh" id="ngaysinh" value="<?=$ngaysinh?>" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Email" value="<?=$email?>" id="email" class="form-control" required>
            </div>
            
            <?php if ($chucvu!='NVQL') {?>
                <label>Chức vụ</label>
                <select class="form-select form-control mb-3" name="chucvu" id="chucvu">
                    <option value="NVBH" <?=$selectNVBH?>>Nhân viên bán hàng</option>
                    <option value="NVK" <?=$selectNVK?>>Nhân viên kho</option>
                    <option value="NVKT" <?=$selectNVKT?>>Nhân viên kế toán</option>
                </select>
            <?php } ?>

            <div id="error-message" class="d-none alert alert-danger">Input is invalid</div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-success px-5">Cập nhật</button>
            </div>
        </form>
    </div>
    </div>
</div>

<script>    
let update_form = document.getElementById("updatenv-form");
update_form.addEventListener('submit', e=> {
    let hoten = document.querySelector('#hoten');
    let sdt = document.querySelector('#sdt');
    let cmnd = document.querySelector('#cmnd');
    let ngaysinh = document.querySelector('#ngaysinh');
    let email = document.querySelector('#email');
    //let chucvu = document.querySelector('#chucvu');

    if ( hoten.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập họ tên đầy đủ");
        e.preventDefault();
        hoten.focus();
    } else if ( sdt.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập số điện thoại");
        e.preventDefault();
        sdt.focus();
    } else if ( cmnd.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập chứng minh nhân dân");
        e.preventDefault();
        cmnd.focus();
    } else if ( ngaysinh.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập ngày sinh");
        e.preventDefault();
        ngaysinh.focus();
    } else if ( email.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email");
        e.preventDefault();
        email.focus();
    } else if ( !validateEmail(email.value) ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email đúng cú pháp");
        e.preventDefault();
        email.focus();
    } /*else if ( chucvu.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập chức vụ");
        e.preventDefault();
        chucvu.focus();
    } */
})

function validateEmail(email) 
{
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}
</script>