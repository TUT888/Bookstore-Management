<?php
if (isset($data['chitietnv']['data'])) {
    $chitiet = $data['chitietnv']['data'];
    $chucvu = '';
    if ( $chitiet['ChucVu']==='NVBH' ) {
        $chucvu = "Nhân viên bán hàng";
    } else if ( $chitiet['ChucVu']==='NVK' ) {
        $chucvu = "Nhân viên kho";
    } else if ( $chitiet['ChucVu']==='NVKT' ) {
        $chucvu = "Nhân viên kế toán";
    } else if ( $chitiet['ChucVu']==='NVQL' ) {
        $chucvu = "Nhân viên quản lý";
    }
} else {
    $chitiet = array();
}
?>
<div class="container pt-5">
    <div class="d-flex">
    <a href="?controller=nhanvien&action=index" class="btn btn-outline-dark mr-auto">Quay về</a>
    <a href="?controller=nhanvien&action=update&id=<?=$chitiet['MaNV']?>" class="btn btn-success">Sửa</a>
    </div>
    <h2 class="text-center">XEM NHÂN VIÊN</h2>
    <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
    <table class="table table-striped border border-dark">
        <thead class="thead-dark">
        <tr>
            <th></th>
            <th>Thông tin chi tiết</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Mã NV</th>
            <td><?=$chitiet['MaNV']?></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td><?=$chitiet['HoTen']?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?=$chitiet['SDT']?></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td><?=$chitiet['GioiTinh']?></td>
        </tr>
        <tr>
            <th>CMND</th>
            <td><?=$chitiet['CMND']?></td>
        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><?=$chitiet['NgaySinh']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$chitiet['Email']?></td>
        </tr>
        <tr>
            <th>Chức vụ</th>
            <td><?=$chucvu?></td>
        </tr>
        </tbody>
    </table>
    </div>
    </div>
</div>
