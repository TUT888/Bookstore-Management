<?php 

    $sp = $data['sanpham'];
    $chung = $sp[0];
    $loai = $chung['Loai'];
    $detail = $sp[$loai];
    $masp = $chung['MaSP'];
    $tensp = $chung['TenSP'];
    $mota = $chung['MoTa'];
    $gianhap = $chung['GiaNhap'];
    $giaban = $chung['GiaBan'];
    $soluong = $chung['SoLuongCon'];
    $img = $chung['HinhMinhHoa'];
    if ($loai == 'dodunghoctap'){
        $loaisp = $detail['LoaiSP'];
        $nsx = $detail['NhaSanXuat'];
    } else{
        $tacgia = $detail['TacGia'];
        $nxb = $detail['NhaXuatBan'];
        $theloai = $detail['TheLoai'];
    }
?>

<div class="container p-5">
    <div class="mb-3">
    <a href="?controller=sanpham&action=view&id=<?=$masp?>" class="btn btn-outline-dark">Quay về</a>

    </div>
    <h3 class="p-3 text-center">Chỉnh sửa thông tin sản phẩm</h3>
    
    <?php 
    if(isset($data['response'])){
        if( $data['response']['code']==30) {
            echo "<div class='alert alert-success text-center'>Cập nhập thông tin sản phẩm thành công</div>";
        } else {
            $mess = $data['response']['message'];
            echo "<div class='alert alert-danger text-center'><p>Cập nhập thông tin sản phẩm không thành công</p></div>";
        }
    }
    ?>
    <form class="col-lg-7 mx-auto needs-validation" action="?controller=sanpham&action=update&id=<?=$masp?>" method="post" enctype="multipart/form-data" id="sp_edit_form" novalidate>
        <h6 class="mx-auto">Mã sản phẩm: <?=$masp?></h6>
        <div class="form-group">
            <label for="tensp">Tên sản phẩm</label>
            <input type="text" name="tensp" class="form-control" id="tensp" placeholder="Tên sản phẩm" value="<?=$tensp?>" required>
            <div class="invalid-feedback">
                Vui lòng nhập tên sản phẩm!
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col">
                <label for="gianhap">Giá nhập</label>
                <input type="number" name="gianhap" class="form-control" id="gianhap" min=1 placeholder="Giá nhập" value="<?=$gianhap?>" required> 
                <div class="invalid-feedback">
                    Vui lòng nhập giá nhập!
                </div>
            </div>
            <div class="col">
                <label for="giaban">Giá bán</label>
                <input type="number" name="giaban" class="form-control" id="giaban" min =<?=$gianhap?> placeholder="Giá bán" value="<?=$giaban?>" required>
                <div class="invalid-feedback" id="giaban">
                    Vui lòng nhập giá bán lớn hơn giá nhập!
                </div>
            </div>
            <div class="col">
                <label for="soluong">Số lượng</label>
                <input type="number" name="soluong" class="form-control" id="soluong" min=0 placeholder="Số lượng" value="<?=$soluong?>" required>
                <div class="invalid-feedback">
                    Vui lòng nhập số lượng!
                </div>
            </div>
        </div>
        <?php
            if($loai == 'dodunghoctap'){
                ?>
                    <div class="form-group">
                        <label for="loaisp">Loại sản phẩm</label>
                        <input type="text" name="loaisp" class="form-control" id="loaisp" placeholder="Loại sản phẩm" value="<?=$loaisp?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập loại sản phẩm!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nsx">Nhà sản xuất</label>
                        <input type="text" name="nsx" class="form-control" id="nsx" placeholder="Nhà sản xuất" value="<?=$nsx?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập nhà sản xuất!
                        </div>
                    </div>
                <?php
            }
            else{
                ?>
                    <div class="form-group">
                        <label for="tacgia">Tác giả</label>
                        <input type="text" name="tacgia" class="form-control" id="tacgia" placeholder="Tác giả" value="<?=$tacgia?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tác giả!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nxb">Nhà xuất bản</label>
                        <input type="text" name="nxb" class="form-control" id="nxb" placeholder="Nhà xuất bản" value="<?=$nxb?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập nhà xuất bản!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="theloai">Thể loại</label>
                        <input type="text" name="theloai" class="form-control" id="theloai" placeholder="Thể loại" value="<?=$theloai?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập thể loại!
                        </div>
                    </div>
                <?php
                 }
                ?>
                    <div class="form-group">
                        <label for="customFile">Hình minh họa</label>
                        <div>
                            <div>
                                <img style="width:500px" id="sp_img" src="/img/<?=$img?>" /> 
                            </div>
                            <div class="custom-file mt-2">
                                <input onchange="sp_getIMG(this)" name="img" type="file" class="custom-file-input" id="fileimg">
                                <label class="custom-file-label" for="fileimg"><?=$img?></label>            
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mota">Mô tả</label>
                        <textarea name="mota" cols='50' rows="10" class="form-control" id="mota" placeholder="Mô tả" required><?=$mota?></textarea>
                        <div class="invalid-feedback">
                            Vui lòng nhập mô tả cho sản phẩm!
                        </div>
                    </div>
                <?php            
        ?>
        <div id="sp_error" class="alert alert-danger text-center d-none" role="alert">
			Lỗi
		</div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
</div>
<script>
    (function () {
	'use strict'
	var gianhap = document.getElementById("gianhap").value
	document.getElementById("giaban").min = gianhap;
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