<?php
    $magiamgia = $data['chitiet']["data"];
    $error = "";
    if(!isset($magiamgia) || empty($magiamgia)) {
        $error = "Đọc dữ liệu thất bại, vui lòng thử lại sau.";
    }
    $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
    $objDateTime1 = new DateTime ($magiamgia['NgayTaoMa'], $tz);
    $ngaytao = $objDateTime1->format ('Y-m-d\TH:i:s');
    $objDateTime2 = new DateTime ($magiamgia['NgayHetHan'], $tz);
    $ngayhethan = $objDateTime2->format ('Y-m-d\TH:i:s');
?>
<!-- Nội dung chính -->
<div class="container p-auto m-auto">
    <?php
        if ($error != "") {
            ?>
                <div class="alert alert-danger text-center"><?= $error ?></div>
            <?php
        }
        else {
            ?>
                <div>
                    <form action="?controller=magiamgia&action=update" method="post" class="mb-5 mx-auto mgg-form" style="max-width: 700px" id="mgg-form">
                        <a class="btn btn-outline-dark mt-5" href="?controller=magiamgia&action=index">Quay lại</a>
                        <h2 class="text-center mt-5">CHI TIẾT CỦA MÃ "<?= $magiamgia['TenMa'] ?>"</h2>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ma">Mã số:</label>
                            <input class="form-control" type="text" name="id" id="mgg-ma" readonly value="<?= $magiamgia['MaSoMa']?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ten">Tên mã:</label>
                            <input class="form-control" type="text" name="tenma" id="mgg-ten" readonly value="<?= $magiamgia['TenMa']?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-giatri">Giá trị giảm giá:</label>
                            <input class="form-control" type="text" name="giatri" id="mgg-giatri" readonly value="<?= $magiamgia['GiaTriMa']?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngaytao">Ngày tạo mã:</label>
                            <input class="form-control" type="datetime-local" name="ngaylap" id="mgg-ngaytao" readonly value="<?= $ngaytao ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngayhethan">Ngày hết hạn:</label>
                            <input class="form-control" type="datetime-local" name="ngayhethan" id="mgg-ngayhethan" readonly value="<?= $ngayhethan ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-mota">Mô tả:</label>
                            <textarea style="resize: none; height: 150px" name="mota" class="form-control" type="text" id="mgg-mota" readonly><?= $magiamgia['MoTa']?></textarea>
                        </div>
                        <input type="hidden" name="check" value="True">
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            <?php
        }
    ?>
</div>