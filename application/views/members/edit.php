<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chỉnh sửa thông tin thành viên</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<div class="container mt-5">
		<h2 class="mb-4">Chỉnh sửa thông tin thành viên</h2>
		<form action="" method="POST">
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
			<input type="hidden" name="id" value="<?php echo $member->id; ?>">
			<div class="mb-3">
				<label for="name" class="form-label">Họ tên</label>
				<input type="text" class="form-control" id="name" name="name" value="<?php echo $member->name; ?>" required>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $member->email; ?>" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Mật khẩu</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<div class="mb-3">
				<label for="gender" class="form-label">Giới tính</label>
				<select class="form-control" id="gender" name="gender" required>
					<option value="0" <?php echo $member->gender == 0 ? 'selected' : ''; ?>>Nam</option>
					<option value="1" <?php echo $member->gender == 1 ? 'selected' : ''; ?>>Nữ</option>
				</select>
			</div>
			<button type="submit" class="btn btn-success">Lưu thay đổi</button>
			<a href="<?php echo base_url('members'); ?>" class="btn btn-secondary">Hủy</a>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
