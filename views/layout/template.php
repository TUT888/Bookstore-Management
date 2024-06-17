<?php
if (isset($_SESSION['hoten'])) {
	$hoten = $_SESSION['hoten'];
} else {
	$hoten = '';
}
if (isset($_SESSION['manv'])) {
	$manv = $_SESSION['manv'];
} else {
	$manv = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="/style.css">
	<title>Quản lý nhà sách</title>
</head>

<body class="tp-background">
	<!--Nav bar-->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container font-weight-bold">
			<a class="navbar-brand" href="/index.php">Quản lý nhà sách</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<?php if ($hoten!='') {
						echo "<li class='nav-item'>";
						if ( $manv!='' ) {
							echo "<a class='nav-link' href='?controller=nhanvien&action=view&id=$manv'>Xin chào $hoten</a>";
						} else {
							echo "<a class='nav-link' href='/index.php'>Xin chào $hoten</a>";
						}
						echo "</li>";
					}?>
					
					<li class="nav-item">
						<a class="nav-link active" href="/index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/index.php?controller=home&action=logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?= $content ?>
    <!-- Footer -->
	<div class="text-white bg-dark font-weight-bold text-center pt-4 pb-3">
		<h5>Phần mềm quản lý nhà sách</h5>
		<h6>Giao diện cho nhân viên</h6>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="/main.js"></script>
</body>

</html>