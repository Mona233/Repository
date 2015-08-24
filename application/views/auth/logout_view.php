
    <?php if($logged_in): ?>
      <p><?= $username ?> has been logged out.</p>
      <p>Thanks for visiting <?= $name ?></p>
    <?php else: ?>
      <p>You need to <?php echo anchor('/auth/login', 'login', ''); ?> before you log out...</p>
    <?php endif;?>

