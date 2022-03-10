<!DOCTYPE html>
<html>
<head>
	<title><?= "Update page" ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/style.css') ?>">
</head>
<body>
	<div class="header">
		<h2>Update User</h2>
	</div>
    <form method="post" action="<?php echo base_url('/users/edit/'.$id); ?>">
    <?php if (isset($success_msg)): ?>
        <div class="alert alert-warning alert-dismissible" style="text-align:center;">
            <h4><i class="icon fa fa-warning"></i>Success!</h4>
            <label style="text-align:center;color:green;"><?= isset($success_msg) ? $success_msg : ''; ?></label>
            <br>
            <br>
            <p style="text-align:center;">
                Go back to User <a href="<?= base_url('/users') ?>">List</a>
            </p>
        </div>
    <?php else: ?>
		<?php if (isset($error_msg) || validation_errors() != ''): ?>
            <div class="alert alert-warning alert-dismissible" style="text-align:center;">
                <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                <?= validation_errors(); ?>
                <label style="text-align:center;color:red;"><?= isset($error_msg) ? $error_msg : ''; ?></label>
                <br>
            </div>
        <?php endif; ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" <?php echo ($user_data != null ? '' : 'disabled'); ?> value="<?= $user_data != null && $user_data->username != null ? $user_data->username : '' ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" <?php echo ($user_data != null ? '' : 'disabled'); ?> value="<?= $user_data != null && $user_data->password != null ? $user_data->password : '' ?>">
		</div>
		<div class="input-group" style="text-align:center;">
			<button style="width:300px;" type="submit" class="btn" name="submit" <?php echo ($user_data != null ? '' : 'disabled'); ?> id="submit" value="submit">Update</button>
		</div>
        <p style="text-align:center;">
                Go back to User <a href="<?= base_url('/users') ?>">List</a>
            </p>                                                                                                                                                                                                                                                      
    <?php endif; ?>
    </form>
</body>
</html>