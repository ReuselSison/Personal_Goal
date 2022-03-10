<!DOCTYPE html>
<html>
<head>
	<title><?= "Users page" ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('/style.css') ?>">

    <style>
        .col {
            column-width: 200px;
        }
        .col-1 {
            column-width: 50px;
        }
        .h-2 {
            font-weight:bold;
            font-size:20px;
        }
    </style>
</head>
<body>
	<div class="header">
		<h2>User List</h2>
	</div>
	<form>
    <div style="margin-bottom:25px;">
        <a href="<?= base_url('/search') ?>">Search User</a>
        <!-- <input class="btn" type="submit" name="add" value="Add new User" id="add"></button> -->
        <a class="btn" style="margin-left:20px;float:right" name="logout" href="<?= base_url('/auth/logout') ?>" id="logout">Logout</a>
    </div>

        <table>
            <thead>
                <tr>
                    <td class="col-1 h-2">No.</td>
                    <td class="col h-2">Username</td>
                    <td class="col h-2">Option</td>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($msg)): ?>
                    <tr>
                        <?= $msg; ?>
                    </tr>
                <?php else: ?>
                    <?php $count = 1; ?>
                    <?php foreach($user_list as $row): ?>
                        <tr>
                            <td><?= $count.'.'; ?></td>
                            <td><?= $row->username; ?></td>
                            <td>
                                <a href="users/edit/<?= $row->id ?>">Edit</a>
                                <a href="users/delete/<?= $row->id ?>"> Delete</a>
                            </td>
                        </tr>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <div>
            <a href="<?= base_url('/register') ?>">Add New User</a>
        </div>
	</form>
</body>
</html>