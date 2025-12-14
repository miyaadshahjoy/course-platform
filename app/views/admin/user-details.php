<div class="profile">
  <h3>Profile Information</h3>
  <div class="profile-wrapper">
    <div class="profile-image">
      <?php if($user['IMAGE']): ?>
      <img src="/uploads/users/<?= $user['IMAGE'] ?>" />
      <?php else: ?>
      <img src="/uploads/users/user.svg" />
      <?php endif; ?>
      
    </div>
    <div class="profile-info">
      
      <form action="/user/update-profile" method="POST" class="form-profile">
        <div class="form-wrapper">
          <div class="form-group">
            <label>Full Name</label>
            <input
              type="text"
              name="fullname"
              value="<?= $user['FULLNAME'] ?>"
              required
              disabled
            />
          </div>
          <div class="form-group">
            <label>User Name</label>
            <input
              type="text"
              name="username"
              value="<?= $user['USERNAME'] ?>"
              required
              disabled
            />
          </div>

          <div class="form-group">
            <label>Email Address</label>
            <input
              type="email"
              name="email"
              value="<?= $user['EMAIL'] ?>"
              required
              disabled
            />
          </div>

          <div class="form-group">
            <label>Role</label>
            <input
              type="text"
              name="role"
              value="<?= $user['ROLE'] ?>"
              required
              disabled
            />
          </div>
          <div class="form-group">
            <label>Status</label>
            <input
              type="text"
              name="status"
              value="<?= $user['STATUS'] ?>"
              required
              disabled
            />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input
              type="text"
              name="address"
              value="Not provided"
              required
              disabled
            />
          </div>
          <div class="form-group">
            <label>Gender</label>
            <input
              type="text"
              name="gender"
              value="Not provided"
              required
              disabled
            />
          </div>
          <div class="form-group">
            <label>Date of Birth</label>
            <input
              type="text"
              name="dob"
              value="Not provided"
              required
              disabled
            />
          </div>

        </div>
      </form>
    </div>
  </div>

</div>


