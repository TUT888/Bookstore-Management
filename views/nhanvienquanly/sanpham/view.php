<?php
    $sp = $data['sanpham'][0];
    $loai = $sp['Loai'];
    if ($loai == 'dodunghoctap'){
        $ddht = $data['sanpham'][$loai];
        $loaisp = $ddht['LoaiSP'];
        $nsx = $ddht['NhaSanXuat'];
    } else{
        $sach = $data['sanpham'][$loai];
        $tacgia = $sach['TacGia'];
        $nxb = $sach['NhaXuatBan'];
        $theloai = $sach['TheLoai'];
    }
    $masp = $sp['MaSP'];
    $tensp = $sp['TenSP'];
    $mota = $sp['MoTa'];
    $gianhap = $sp['GiaNhap'];
    $giaban = $sp['GiaBan'];
    $soluong = $sp['SoLuongCon'];
    $img = $sp['HinhMinhHoa'];
    $danhgia = $sp['DanhGia'];
?>
    <div class="mx-auto my-5 col-md-10">
    <div class="mb-3">
        <a href="?controller=sanpham&action=index" class="btn btn-outline-dark">Quay về</a>

    </div>
    
    <div class="row no-gutters align-items-stretch room-animate site-section">
        <div class="col-xl-7 col-xxl-6 img-wrap" data-jarallax-element="-100">
            <div class="bg-image " style="background-color: #ffffff;">
                <img src="./img/<?=$img?>" alt="" class="<?=$img?> h-100" style="width:600px;height:650px;">
            </div>
        </div>
        <div class="col-xl-4 col-xxl-6 h5">
            <div class="row justify-content-center">
                <div class="col-md-8 py-5">
                    <br></br>
                    <h3 class="display-5 heading pb-5"><?=$tensp?></h3>
                    <div class="room-exerpt">
                    <div class="room-price mb-4"><b>Mã sản phẩm: </b> <span ><?=$masp?></span></div>
                    <?php 
                        if ($loai == 'sach'){
                            ?>
                                <div class="room-price mb-4"><b>Tác giả:</b> <span ><?=$tacgia?></span></div>
                                <div class="room-price mb-4"><b>Nhà xuất bản:</b> <span ><?=$nxb?></span></div>
                                <div class="room-price mb-4"><b>Thể loại:</b> <span ><?=$theloai?></span></div>
                            <?php
                        }else{
                            ?>
                                <div class="room-price mb-4"><b>Loại:</b> <span ><?=$loaisp?></span></div>
                                <div class="room-price mb-4"><b>Nhà sản xuất:</b> <span ><?=$nsx?></span></div>
                            <?php
                        }
                        
                    ?>
                    <div class="room-price mb-4"><b>Số lượng: </b> <span ><?=$soluong?> cái</span></div>
                    <div class="room-price mb-4"><b>Giá nhập: </b> <span ><?=$gianhap?> đ</span></div>
                    <div class="room-price mb-4"><b>Giá bán: </b> <span ><?=$giaban?> đ</span></div>
                    <div class="room-price mb-4"><b>Đánh giá: </b> <span ><?=$danhgia?> sao</span></div>
                    <div class="pt-3">
                        <a href="?controller=sanpham&action=update&id=<?=$masp?>" class="btn btn-dark">Sửa thông tin</a>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
      <section class="follow-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h1 class="text-center wow fadeInDown">Mô tả</h1>
                    </div>
                </div>
            </div>
        </div>
        <div><?=$mota?></div>
    </section>
</div>