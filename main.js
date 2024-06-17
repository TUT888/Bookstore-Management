/*------ Javascript nhân viên quản lý ------*/
function nvhome_mouseover_color (event) {
	var id = event.target.id;
	var element = document.getElementById (id);
	var card = element.children[0];
	card.style.backgroundColor = "black";
	var icon = card.children[0];
	icon.style.color = "white";
	var footer = card.children[1];
	footer.style.color = "black";
	footer.style.backgroundColor = "white";
}

function nvhome_mouseout_color (event) {
	var id = event.target.id;
	var element = document.getElementById (id);
	var card = element.children[0];
	card.style.backgroundColor = "white";
	var icon = card.children[0];
	icon.style.color = "black";
	var footer = card.children[1];
	footer.style.color = "white";
	footer.style.backgroundColor = "black";
}

/*------ Javascript quản lý mã giảm giá ------*/
$(".mgg-chitiet").on('click', function(){
	$(location).attr('href','?controller=magiamgia&action=view&id='+$(this).attr('id'))
});

function delete_mgg(event) {
	$get_ele = $(".mgg-id");
	$get_ele.attr('href','#');
	var id = event.target.id;
	var element = document.getElementById ("mgg-delete-button");
	element.href = "?controller=magiamgia&action=delete&id=" + id;
	$('#mgg-delete-modal').modal({
		show: true
	}); 
}

/*------ Javascript quản lý sản phẩm ------*/
$(document).ready(() => {
	$(".sp_ds").on("mouseover", function(){
		$(this).addClass("bg-secondary");
	});
	$(".sp_ds").on("mouseout", function(){
		$(this).removeClass("bg-secondary");
	});
	$(".sp_chitiet").on('click', function(){
		$(location).attr('href','?controller=sanpham&action=view&id='+$(this).attr('id'))
	});
	var loai = $('#loai').find(":selected").val();
	$('#loai').on("change", function(){
		var loai = $('#loai').find(":selected").val();
		var sach = `<div class="form-group">
						<label for="tacgia">Tác giả</label>
						<input type="text" name="tacgia" class="form-control" id="tacgia" placeholder="Tác giả" required>
						<div class="invalid-feedback">
							Vui lòng nhập tên tác giả!
						</div>
					</div>
					<div class="form-group">
						<label for="nxb">Nhà xuất bản</label>
						<input type="text" name="nxb" class="form-control" id="nxb" placeholder="Nhà xuất bản" required>
						<div class="invalid-feedback">
							Vui lòng nhập nhà xuất bản!
						</div>
					</div>
					<div class="form-group">
						<label for="theloai">Thể loại</label>
						<input type="text" name="theloai" class="form-control" id="theloai" placeholder="Thể loại" required>
						<div class="invalid-feedback">
							Vui lòng nhập thể loại!
						</div>
					</div>`
		var ddht = ` <div class="form-group">
						<label for="loaisp">Loại sản phẩm</label>
						<input type="text" name="loaisp" class="form-control" id="loaisp" placeholder="Loại sản phẩm"  required>
						<div class="invalid-feedback">
							Vui lòng nhập loại sản phẩm!
						</div>
					</div>
					<div class="form-group">
						<label for="nsx">Nhà sản xuất</label>
						<input type="text" name="nsx" class="form-control" id="nsx" placeholder="Nhà sản xuất"  required>
						<div class="invalid-feedback">
							Vui lòng nhập nhà sản xuất!
						</div>
					</div>`
		if(loai == "sach"){
			$('.sach').append(sach)
			$('.ddht div').remove();
		}
		else if(loai =="dodunghoctap"){
			$('.ddht').append(ddht)
			$('.sach div').remove();
		}
	})
	
	
});

function sp_getIMG(input){
	if (input.files && input.files[0]){
		var file = input.files[0]
		console.log(file)
		var filetype = file['type']
		var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
		if ($.inArray(filetype, validImageTypes) < 0) {
			$("#sp_error").html("Vui lòng chọn file ảnh!")
			$("#sp_error").removeClass("d-none")
			$('#fileimg').focus();
	   	}else{
			$("#sp_error").addClass("d-none")
			$(".custom-file-label").html(file['name'])
			var reader = new FileReader();
			reader.onload = function(e){
				$('#sp_img').attr('src',e.target.result).width(500)
			}
			reader.readAsDataURL(input.files[0]);
	  	}
		
	}
}