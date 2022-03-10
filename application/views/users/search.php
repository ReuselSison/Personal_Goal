<!DOCTYPE html>
<html>
<head>
	<title><?= "Search page" ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/style.css') ?>">
</head>
<body>
	<div class="header">
		<h2>Search</h2>
	</div>
    <form method="post" action="<?php echo base_url('/search'); ?>">
    <?php if (isset($success_msg)): ?>
        <div class="alert alert-warning alert-dismissible" style="text-align:center;">
            <h4><i class="icon fa fa-warning"></i>Success!</h4>
            <label style="text-align:center;color:green;"><?= isset($success_msg) ? $success_msg : ''; ?></label>
            <br>
            <br>
            <a href="<?=  base_url('/login'); ?>">Proceed to login.</a>
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
			<input type="text" name="username" >
		</div>
		<div class="input-group" style="text-align:center;">
			<button style="width:300px;" type="submit" class="btn" name="submit" id="submit" value="submit">Search</button>
		</div>
    <?php endif; ?>
    </form>
</body>
</html>