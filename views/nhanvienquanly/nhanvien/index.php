<?php
if (isset($data['nhanvien']['data'])) {
    $danhsach = $data['nhanvien']['data'];
} else {
    $danhsach = array();
}
?>
<style>
    .nv_ds:hover {
        cursor: pointer;
    }
</style>

<div class="container pt-5">
    <div class="d-flex mb-3">
        <a href="index.php" class="btn btn-outline-dark mr-auto">Quay về</a>
        <form class="float-right mr-3" action="?controller=nhanvien&action=search" method="post">
            <input type="text" name="search" placeholder="Nhập từ khóa">
            <button class="btn btn-dark">Search</button>
        </form>
        <a href="?controller=nhanvien&action=create" class="btn btn-success">Thêm</a>
    </div>
    <?php if ( isset($data['result']['code']) ) { 
    if( $data['result']['code']==0 ) {
        echo "<div class='alert alert-success text-center'>Xóa nhân viên thành công</div>";
    } else if ( $data['result']['code']>0 ) {
        $mess = $data['result']['message'];
        echo "<div class='alert alert-danger text-center'><p>Xảy ra lỗi khi xóa nhân viên: $mess</p></div>";
    }}?>
    <h2 class="text-center">DANH SÁCH NHÂN VIÊN</h2>
    <table class="table table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Mã NV</th>
                <th>Họ Tên</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = count($danhsach);
            for ($i = 0; $i < $n; $i++) {
                $manv = $danhsach[$i]['MaNV'];
                $hoten = $danhsach[$i]['HoTen'];
                $gioitinh = $danhsach[$i]['GioiTinh'];
                $email = $danhsach[$i]['Email'];

                $chucvu = '';
                if ( $danhsach[$i]['ChucVu']==='NVQL' ) {
                    continue;
                }
                if ( $danhsach[$i]['ChucVu']==='NVBH' ) {
                    $chucvu = "Nhân viên bán hàng";
                } else if ( $danhsach[$i]['ChucVu']==='NVK' ) {
                    $chucvu = "Nhân viên kho";
                } else if ( $danhsach[$i]['ChucVu']==='NVKT' ) {
                    $chucvu = "Nhân viên kế toán";
                }
            ?>
                <tr class="nv_ds">
                    <td class="nv_chitiet" id=<?= $manv ?>><?= $manv ?></td>
                    <td class="nv_chitiet" id=<?= $manv ?>><?= $hoten ?></td>
                    <td class="nv_chitiet" id=<?= $manv ?>><?= $gioitinh ?></td>
                    <td class="nv_chitiet" id=<?= $manv ?>><?= $email ?></td>
                    <td class="nv_chitiet" id=<?= $manv ?>><?= $chucvu ?></td>
                    <td>
                        <a onclick="xoaNhanVien('<?=$manv?>', '<?=$hoten?>')" class="btn btn-danger" data-toggle="modal" data-target="#xacnhan-xoa">Xóa</a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>
</div>

<div class="modal fade" role="dialog" id="xacnhan-xoa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" id="deletenv-form">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa nhân viên <span id="nv-xoa" style="font-weight:bold"></span></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="" id="xoa-id">
                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function xoaNhanVien(manv, tennv) {
    $("#deletenv-form").attr('action', "?controller=nhanvien&action=delete");
    $("#nv-xoa").html(tennv);
    $("#xoa-id").val(manv);
}

window.addEventListener('load', (event) => {
    $(".nv_ds").on("mouseover", function(){
        $(this).css("background-color", "#a1a1a1");
    });
    $(".nv_ds").on("mouseout", function(){
        $(this).css("background-color", "");
    })
    $(".nv_chitiet").on('click', function(){
        $(location).attr('href','?controller=nhanvien&action=view&id='+$(this).attr('id'))
    });
});
</script>