<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/members/list.css?v=' . time()); ?>">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4"><?php echo $title ?> <a href="<?php echo base_url('members/register'); ?>" class="btn btn-primary">Thêm Mới</a></h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Giới tính</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($members as $member) { ?>
				<tr>
					<td><?php echo $member->id; ?></td>
					<td><?php echo $member->name; ?></td>
					<td><?php echo $member->email; ?></td>
					<td><?php echo $member->password; ?></td>
					<td><?php echo $member->gender == 0 ? 'Nam' : 'Nữ'; ?></td>
					<td>
						<form action="<?php echo base_url('members/delete'); ?>" method="post">
							<a href="<?php echo base_url('members/edit/' . $member->id); ?>" class="btn btn-primary btn-sm">Sửa</a>
							<input type="hidden" name="id" value="<?php echo $member->id; ?>">
							<button onclick="return confirm('Xóa thành viên này?')" type="submit" class="btn btn-danger btn-sm">Xóa</button>
						</form>
					</td>
				</tr>
			<?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
