<h3>Login</h3>

<?php if ($message): ?>
  <p><?php echo $message; ?></p>
<?php endif; ?>

<?php echo form_open('login'); ?>
<p>Username<br>
  <?php echo form_input('username'); ?>
</p>
<p>Password<br>
  <?php echo form_password('password'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Login'); ?>
</p>
<?php echo form_close(); ?>