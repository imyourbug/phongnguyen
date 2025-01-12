<!DOCTYPE html>
<html>

<head>
	<title>Đăng Ký</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/members/register.css?v=' . time()); ?>">
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>
	<div class="main-w3layouts wrapper">
		<h1>Đăng Ký Thành Viên</h1>

		<div class="main-agileinfo">
			<?php
			$this->load->helper('form');
			$error = $this->session->flashdata('error');
			if ($error) {
			?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php } ?>
			<?php
			$success = $this->session->flashdata('success');
			if ($success) {
			?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php } ?>
			<?php echo validation_errors('<div style="color: red;">', '</div>'); ?>
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="name" placeholder="Họ tên" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Mật khẩu" required="">
					<div style="margin-top: 10px;">
						<span style="color: white;">Giới tính</span>
						<input checked class="" type="radio" name="gender" id="male" required=""> <label style="color: white;" for="male">Nam</label>
						<input class="" type="radio" name="gender" id="female" required=""> <label style="color: white;" for="female">Nữ</label>
					</div>
					<input type="submit" value="Đăng Ký">
				</form>
			</div>
		</div>
		<div class="colorlibcopy-agile">
			<p>Phong Nguyễn</p>
		</div>
	</div>
</body>

</html>
