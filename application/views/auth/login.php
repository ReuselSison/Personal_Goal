<!DOCTYPE html>
<html>
<head>
	<title><?= "Login page" ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/style.css') ?>">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="<?php echo base_url('/login'); ?>">
		<?php if (isset($msg) || validation_errors() != ''): ?>
            <div class="alert alert-warning alert-dismissible" style="text-align:center;">
                <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                <?= validation_errors(); ?>
                <label style="text-align:center;color:red;"><?= isset($msg) ? $msg : ''; ?></label>
                <br>
            </div>
        <?php endif; ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit" id="submit" value="submit">Login</button>
		</div>
		<p>
			Not yet a member? <a href="<?= base_url('/register') ?>">Sign up</a>
		</p>
	</form>
</body>
</html>