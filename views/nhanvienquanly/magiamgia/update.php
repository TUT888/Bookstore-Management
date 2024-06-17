<?php
    $error_check = "";
    $error = "";
    if (isset($data["error"]) && !empty($data["error"])) {
        $error_check = $data["error"];
    }
    else {
        $get_mgg = $data['capnhat'];
        $success = "";
        $magiamgia = array();
        if(!isset($get_mgg["code"]) || $get_mgg["code"] == 0) {
            $id = $get_mgg["data"];
            $error = "Bạn không có thay đổi thông tin nào trong dữ liệu.";
        }
        else if ($get_mgg["code"] == 2){
            $magiamgia = $get_mgg["data"];
            $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
            $objDateTime1 = new DateTime ($magiamgia['NgayTaoMa'], $tz);
            $ngaytao = $objDateTime1->format ('Y-m-d\TH:i:s');
            $objDateTime2 = new DateTime ($magiamgia['NgayHetHan'], $tz);
            $ngayhethan = $objDateTime2->format ('Y-m-d\TH:i:s');
            $success = "Cập nhật mã giảm giá thành công.";
        }
        else if  ($get_mgg["code"] == 1) {
            $magiamgia = $get_mgg["data"];
            $tz = new DateTimeZone ('Asia/Ho_Chi_Minh');
            $objDateTime1 = new DateTime ($magiamgia['NgayTaoMa'], $tz);
            $ngaytao = $objDateTime1->format ('Y-m-d\TH:i:s');
            $objDateTime2 = new DateTime ($magiamgia['NgayHetHan'], $tz);
            $ngayhethan = $objDateTime2->format ('Y-m-d\TH:i:s');
        }   
    }
?>
<!-- Nội dung chính -->
<div class="container p-auto m-auto">
    <?php
        if ($error != "") {
            ?>
                <a class="btn btn-outline-dark mt-5 mb-5" href="?controller=magiamgia&action=view&id=<?= $id ?>">Quay lại</a>
                <div class="alert alert-warning text-center mt-5 font-weight-bold"><?= $error ?></div>
            <?php
        }
        else if ($error_check != "") {
            ?>
                <div class="alert alert-danger text-center mt-5 font-weight-bold"><?= $error_check ?></div>
            <?php
        }
        else {
            ?>
                <div>
                    <form action="?controller=magiamgia&action=update" method="post" class="mb-5 mx-auto mgg-form needs-validation" style="max-width: 700px" id="mgg-update-form" novalidate>
                    <a class="btn btn-outline-dark mt-5 mb-5" href="?controller=magiamgia&action=view&id=<?= $magiamgia['MaSoMa'] ?>">Quay lại</a>
                    <h2 class="text-center">CẬP NHẬT MÃ "<?= $magiamgia['TenMa'] ?>"</h2>
                    <?php
                        if ($success != "") {
                            ?>
                                <div class="alert alert-success text-center mx-auto font-weight-bold"><?= $success ?></div>
                            <?php
                        }
                    ?>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ma">Mã số:</label>
                            <input class="form-control" type="text" name="id" id="mgg-ma" readonly value="<?= $magiamgia['MaSoMa']?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ten-update">Tên mã:</label>
                            <input class="form-control" type="text" name="tenma" id="mgg-ten-update" value="<?= $magiamgia['TenMa']?>" required>
                            <div class="invalid-feedback" id="mgg-ten-error">Vui lòng nhập tên mã</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-giatri-update">Giá trị giảm giá:</label>
                            <input class="form-control" type="text" name="giatri" id="mgg-giatri-update" value="<?= $magiamgia['GiaTriMa']?>" required>
                            <div class="invalid-feedback" id="mgg-ten-error">Vui lòng nhập giá trị mã giảm giá</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngaytao-update">Ngày tạo mã:</label>
                            <input class="form-control" type="datetime-local" name="ngaylap" id="mgg-ngaytao-update" value="<?= $ngaytao ?>" required>
                            <div class="invalid-feedback" id="mgg-ten-error">Vui lòng kiểm tra lại ngày tạo mã</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngayhethan-update">Ngày hết hạn:</label>
                            <input class="form-control" type="datetime-local" name="ngayhethan" id="mgg-ngayhethan-update" value="<?= $ngayhethan ?>" required>
                            <div class="invalid-feedback" id="mgg-ten-error">Vui lòng kiểm tra lại ngày hết hạn</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-mota">Mô tả:</label>
                            <textarea style="resize: none; height: 150px" name="mota" class="form-control" type="text" id="mgg-mota"><?= $magiamgia['MoTa']?></textarea>
                        </div>
                        <input type="hidden" name="check" value="False">
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            <?php
        }
    ?>
</div>
<script>
    (function () {
        'use strict'
        var ngayhet = document.getElementById("mgg-ngayhethan-update")
        ngayhet.addEventListener('change', function(event){
            document.getElementById("mgg-ngayhethan-update").min = document.getElementById("mgg-ngaytao-update").value;
        })
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
        
                form.classList.add('was-validated')
                }, false)
            })
        })()
</script>