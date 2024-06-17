<?php
    $error = "";
    $success = "";
    $id = "";
    if (isset($data["id"]) && (!empty($data['id']) || $data['id'] != 0)) {
        $id = $data["id"];
    }
    else {
        if (isset($data["error"]) && !empty($data["error"])) {
            $error = $data["error"];
        }
        else {
            if (isset($data['taomgg']) && (empty($data['taomgg']) || $data['taomgg'] == 0)) {
                $error = "Thêm mã giảm giá mới thất bại, vui lòng kiểm tra và thử lại sau.";
            }
            else if (isset($data['taomgg']) && (!empty($data['taomgg']) || $data['taomgg'] != 0))
            {
                $success = "Thêm mã giảm giá mới thành công.";
            }
        }
    }
?>
<!-- Nội dung chính -->
<div class="container p-auto">
    <?php
        if ($error != "") {
            ?>
                <div class="alert alert-danger text-center font-weight-bold mt-5"><?= $error ?></div>
            <?php
        }
        else {
            ?>
                <div>
                    <form action="?controller=magiamgia&action=create" method="post" class="mb-5 mx-auto mgg-form needs-validation" style="max-width: 700px" id="mgg-form" novalidate>
                    <a class="btn btn-outline-dark mt-5" href="?controller=magiamgia&action=index">Quay lại</a>
                    <h2 class="text-center">NHẬP THÔNG TIN MÃ MỚI</h2>
                    <?php
                        if ($success != "") {
                            ?>
                                <div class="alert alert-success text-center mx-auto">
                                    <div class="font-weight-bold">
                                        <?= $success ?>
                                    </div>
                                <?php
                                    $_POST = array();
                                ?>
                                    <a href="?controller=magiamgia&action=create" class="text-success">
                                        Click vào đây nếu muốn tiếp tục tạo mã giảm giá mới!
                                    </a>
                                </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ma">Mã số:</label>
                            <input class="form-control" type="text" name="id" id="mgg-ma" readonly value="<?= $id ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ten-add">Tên mã:</label>
                            <input class="form-control" type="text" name="tenma" id="mgg-ten-add" required>
                            <div class="invalid-feedback" id="mgg-ten-error">Vui lòng nhập tên mã</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-giatri-add">Giá trị giảm giá:</label>
                            <input class="form-control" type="text" name="giatri" id="mgg-giatri-add" required>
                            <div class="invalid-feedback" id="mgg-giatri-error">Vui lòng nhập giá trị giảm giá</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngaytao-add">Ngày tạo mã:</label>
                            <input class="form-control" type="datetime-local" name="ngaylap" id="mgg-ngaytao-add" required>
                            <div class="invalid-feedback" id="mgg-ngaytao-error">Vui lòng kiểm tra lại ngày tạo mã</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-ngayhethan-add">Ngày hết hạn:</label>
                            <input class="form-control" type="datetime-local" name="ngayhethan" id="mgg-ngayhethan-add" required>
                            <div class="invalid-feedback" id="mgg-ngayhet-error">Vui lòng kiểm tra lại ngày hết hạn</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="mgg-mota">Mô tả:</label>
                            <textarea style="resize: none; height: 150px" name="mota" class="form-control" type="text" id="mgg-mota"></textarea>
                        </div>
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
        var ngayhet = document.getElementById("mgg-ngayhethan-add");
        ngayhet.addEventListener('change', function(event){
            document.getElementById("mgg-ngayhethan-add").min = document.getElementById("mgg-ngaytao-add").value;
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