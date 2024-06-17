<?php
    $success = "";
    $error = "";
    $mess = "";
    if (isset($data['code']) && $data["code"] == 1) {
        $magiamgia = $data['magiamgia']["data"];
        if(!isset($magiamgia) || empty($magiamgia)) {
            $error = "Đọc dữ liệu thất bại, vui lòng thử lại sau.";
        }
        else {
            $success = "Xóa dữ liệu thành công";
        }
    }
    else if (isset($data['code']) && $data["code"] == 0) {
        $mess = "Không có dữ liệu nào trùng với từ khóa này";
    }
    else {
        $magiamgia = $data['magiamgia']["data"];
        if(!isset($magiamgia) || empty($magiamgia)) {
            $error = "Đọc dữ liệu thất bại, vui lòng thử lại sau.";
        }
    }
?>
<!-- Nội dung chính -->
<div class="container p-auto">
    <?php
        if ($error != "") {
            ?>
                <div class="alert alert-danger text-center mt-5 font-weight-bold"><?= $error ?></div>
            <?php
        }
        else {
            if ($success != "") {
                ?>
                    <div class="alert alert-success text-center mt-5 font-weight-bold"><?= $success ?></div>
                <?php
            }
            ?>
                <div class="mt-5">
                    <a class="btn btn-outline-dark m-3" href="?controller=home&action=index">Quay lại</a>
                    <form class="float-right mr-3 pb-3" action="?controller=magiamgia&action=search" method="post">
                        <input type="text" name="search" placeholder="Nhập từ khóa">
                        <button class="btn btn-dark">Search</button>
                        <a class="btn btn-success my-3 font-weight-bold" href="?controller=magiamgia&action=create">Thêm</a>
                    </form>
                </div>
                <h2 class="text-center m-3">DANH SÁCH MÃ GIẢM GIÁ</h2>
                <?php
                    if ($mess != "") {
                    ?>
                        <div class="alert alert-warning text-center font-weight-bold"><?= $mess ?></div>
                    <?php
                    }
                    else {
                        ?>
                            <table class="table table-hover table-striped text-center table-bordered" style="border: 2px solid black">
                                <thead class="thead-dark" style="font-size: 125%">
                                    <th>Tên mã giảm giá</th>
                                    <th>Giá trị mã giảm giá</th>
                                    <th>Ngày tạo mã</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Thao tác</th>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($magiamgia as $mgg) {
                                        $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
                                        $objDateTime1 = new DateTime ($mgg['NgayTaoMa'], $tz);
                                        $ngaytao = $objDateTime1->format ('d-m-Y H:i:s');
                                        $objDateTime2 = new DateTime ($mgg['NgayHetHan'], $tz);
                                        $ngayhethan = $objDateTime2->format ('d-m-Y H:i:s');
                                        $maso = $mgg['MaSoMa'];
                                        $ten = $mgg['TenMa'];
                                        $giatri = $mgg['GiaTriMa'];
                                        $tz = new DateTimeZone ("Asia/Ho_Chi_Minh");
                                        $now = new DateTime ("NOW", $tz);
                                        $han = new DateTime ($ngayhethan, $tz);
                                        $mau = "";
                                        if ($han < $now) {
                                            $mau = "text-danger";
                                        }
                                        ?>
                                            <tr role="button" class="<?= $mau ?> font-weight-bold" >
                                                <td class="mgg-chitiet" id=<?= $maso ?>><?= $ten ?></td>
                                                <td class="mgg-chitiet" id=<?= $maso ?>><?= $giatri ?></td>
                                                <td class="mgg-chitiet" id=<?= $maso ?>><?= $ngaytao ?></td>
                                                <td class="mgg-chitiet" id=<?= $maso ?>><?= $ngayhethan ?></td>
                                                <td><button onclick="delete_mgg(event)" id="<?= $maso ?>" class="btn btn-danger">Xóa</button></td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        <?php
                    }
                ?>
            <?php
        }
    ?>
</div>
<!-- Delete Confirm Modal -->
<div id="mgg-delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="deleteMGGForm">
                <div class="modal-header">
                    <hp class="modal-title" style="font-weight: bold; font-size: 30px">Xóa mã giảm giá</hp>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa mã giảm giá này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="mgg-delete-button" class="btn btn-danger">Xóa</a>
                </div>
            </form>
        </div>
    </div>
</div>