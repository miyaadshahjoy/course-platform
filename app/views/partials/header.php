<?php require_once __DIR__ . '/toasts.php'; ?>
<header class="header">
  <div class="container">
    <nav class="header-nav flex flex-jc-sb flex-ai-c">
      <div class="header-logo">
        <a href="/">   
          <img src="/img/logo.png" alt="logo">
        </a>
      </div>


      <div class="links-container hide-mobile">
        <ul class="header-links ">
          <li><a href="/courses">Courses</a></li>
          <li><a href="/about">About us</a></li>

          <!-- profile: Show only when signed in -->
          <?php if (isset($_SESSION['user_id'])): ?>
            <?php if($_SESSION['user_role'] == 'user'): ?>
              <li>
                <a href="/users">Profile</a>
              </li>
              
              <!-- Courses: Show only when signed in -->
              <li>
                <a href="/users/dashboard">Courses</a>
              </li>
            <?php endif; ?>
            <?php if($_SESSION['user_role'] != 'user'): ?>
              <li>
                <a href="/admin">Dashboard</a>
              </li>
            <?php endif; ?>

            <!-- logout: Show only when signed in -->
            <li>
              <a href="/logout">Logout</a>
            </li>

            <!-- account settings: Show only when signed in -->
            <li>
              <a class="user-profile" href="<?= $_SESSION['user_role'] == 'user' ? '/users' : 'admin/account-settings' ?>">
                <!-- Avatar -->
                <?php if($_SESSION['user_image']): ?> 
                  <img
                    class="avatar"
                    src="/uploads/users/<?= $_SESSION['user_image'] ?>"
                    alt="avatar"
                  />
                <?php else: ?>
                  <img
                    class="avatar"
                    src="/uploads/users/user.svg"
                    alt="avatar"
                  />
                <?php endif; ?>
                <span><?= $_SESSION['user_fullname'] ?></span>
              </a>
            </li>
          <?php endif; ?>
          <?php if (!isset($_SESSION['user_id'])): ?>
          <!-- signin: Show only when NOT signed in -->
            <li>
              <a href="/signin">Sign in</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="mobile-menu hide-desktop">
        <span></span><span></span><span></span>
      </div>
    </nav>
    <ul class="mobile-links hide-desktop hide">
      
      <li><a href="/courses">Courses</a></li>
      <li><a href="/about">About us</a></li>
      <!-- profile: Show only when signed in -->
      <?php if (isset($_SESSION['user_id'])): ?>
        <?php if($_SESSION['user_role'] == 'user'): ?>
          <li>
            <a href="/users">Profile</a>
          </li>
          
          <!-- Courses: Show only when signed in -->
          <li>
            <a href="/users/dashboard">Courses</a>
          </li>
        <?php endif; ?>
        <?php if($_SESSION['user_role'] != 'user'): ?>
          <li>
            <a href="/admin">Dashboard</a>
          </li>
        <?php endif; ?>

        <!-- logout: Show only when signed in -->
        <li>
          <a href="/logout">Logout</a>
        </li>

        <!-- account settings: Show only when signed in -->
        
      <?php endif; ?>
      <?php if (!isset($_SESSION['user_id'])): ?>
      <!-- signin: Show only when NOT signed in -->
        <li>
          <a href="/signin">Sign in</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</header>
