<nav class="admin-nav">
  <ul>
    <li>
      <!-- logout -->
      <a href="/logout">Logout</a>
    </li>
    <li >
      <a class="user-profile" href="/admin/account-settings">
        <!-- Avatar -->
        <?php if($_SESSION['user_image']): ?> 
          <img class="avatar" src="/uploads/users/<?= $_SESSION['user_image'] ?>" alt="avatar" />
        <?php else: ?>
          <img class="avatar" src="/uploads/users/user.svg" alt="avatar" />
        <?php endif; ?>
        <span><?= $_SESSION['user_fullname'] ?></span>
      </a>
    </li>
  </ul>
</nav>
