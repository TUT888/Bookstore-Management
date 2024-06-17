<?php
?>
<script>
	function xoaSanPham(masp,tensp,loai){
		$('#sp-xoa').html(tensp);
		$("#xoa-id").val(masp);
		$("#xoa-loai").val(loai);
	}
</script>
<div  class = "container pb-5">
	<div class="mx-auto mt-5">
		<div class="mb-3">
			<a href="?controller=home&action=index" class="btn btn-outline-dark">Quay về</a>
			<form class="float-right mr-3 pb-3" action="?controller=sanpham&action=search" method="post">
			<input type="text" name="search" placeholder="Nhập từ khóa">
			<button class="btn btn-dark">Search</button>
			<a class="btn btn-success" href="?controller=sanpham&action=create">Thêm sản phẩm</a>
   		</form>
		</div>
	
		<h3 class="text-center p-2"><strong>DANH SÁCH SẢN PHẨM</strong></h3>
		<?php 
		if(isset($data['response'])){
			if( $data['response']['code']==30) {
				echo "<div class='alert alert-success text-center'>Xóa sản phẩm thành công</div>";
			} else {
				$mess = $data['response']['message'];
				echo "<div class='alert alert-danger text-center'><p>Xóa không thành công</p></div>";
			}
		}
		?>
		<table class="table table-striped text-center">
			<thead class="thead-dark ">
			<tr>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá nhập</th>
				<th>Giá bán</th>
				<th>Số lượng</th>
				<th>Đánh giá</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php
					if(!empty($data)){
						foreach ($data['sanpham'] as $products){
							$maSP = $products['MaSP'];
							$tenSP = $products['TenSP'];
							$giaNhap = $products['GiaNhap'];
							$giaBan = $products['GiaBan'];
							$soLuong = $products['SoLuongCon'];
							$danhgia = $products['DanhGia'];
							?>
								<tr role="button" class="sp_ds">
									<td class="sp_chitiet" id=<?=$maSP?>><?=$maSP?></td>
									<td class="sp_chitiet" id=<?=$maSP?>><?=$tenSP?></td>
									<td class="sp_chitiet" id=<?=$maSP?>><?=$giaNhap?></td>
									<td class="sp_chitiet" id=<?=$maSP?>><?=$giaBan?></td>
									<td class="sp_chitiet" id=<?=$maSP?>><?=$soLuong?></td>
									<td class="sp_chitiet" id=<?=$maSP?>><?=$danhgia?></td>
									<td>
										<a onclick="xoaSanPham('<?=$maSP?>', '<?=$tenSP?>', '<?=$products['Loai']?>')" class="btn btn-danger" data-toggle="modal" data-target="#xacnhan-xoa">Xóa</a>
									</td>
								</tr>
							<?php
						}
					}
					
				?>
							
			</tbody>
		</table>
		
	</div>

</div>
	<div class="modal fade" role="dialog" id="xacnhan-xoa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="?controller=sanpham&action=delete" method="POST" id="deletenv-form">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa sản phẩm <span id="sp-xoa" style="font-weight:bold"></span></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="" id="xoa-id">
					<input type="hidden" name="loai" value="" id="xoa-loai">
                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>