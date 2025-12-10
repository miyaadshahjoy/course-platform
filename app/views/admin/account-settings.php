<section class="account-settings">

    <h2 >Account Settings</h2>

    <div class="profile">
        <h3>Profile Information</h3>

        <form action="/admin/account/update" method="POST" enctype="multipart/form-data" class="form-profile">

            <!-- Name -->
            <div class="form-group">
                <label >Full Name</label>
                <input 
                    type="text" 
                    name="fullname" 
                    value="<?= htmlspecialchars($admin->name ?? '') ?>" 
                    required
                >
            </div>
            <!-- User name -->
            <div class="form-group">
                <label >User Name</label>
                <input 
                    type="text" 
                    name="username" 
                    value="<?= htmlspecialchars($admin->name ?? '') ?>" 
                    required
                >
            </div>

            <!-- Email -->
            <div class="form-group">
                <label >Email Address</label>
                <input 
                    type="email" 
                    name="email" 
                    value="<?= htmlspecialchars($admin->email ?? '') ?>" 
                    required
                >
            </div>

            <!-- Avatar -->
            <div class="form-group">
                <label >Profile Picture</label>
                <input 
                    type="file" 
                    name="avatar" 
                >

                <?php if (!empty($admin->avatar)) : ?>
                    <div >
                        <img src="<?= $admin->avatar ?>" alt="AdminAvatar">
                    </div>
                <?php endif; ?>
            </div>

            <input 
                type="submit"
                value="Update Profile" 
                class="button button-primary"
            >
        </form>
    </div>


    <!-- Password Update Section -->
    <div class="password">
        <h3 >Update Password</h3>

        <form action="/admin/account/update-password" method="POST" class="form-password">

            <div class="form-group">
                <label >Current Password</label>
                <input 
                    type="password" 
                    name="current_password" 
                    required
                >
            </div>

            <div class="form-group" >
                <label >New Password</label>
                <input 
                    type="password" 
                    name="new_password" 
                    required
                >
            </div>

            <div  class="form-group">
                <label >Confirm New Password</label>
                <input 
                    type="password" 
                    name="confirm_password" 
                    required
                >
            </div>

            <input
                type="submit"   
                value="Update Password" 
                class="button button-primary"
            >
        </form>
    </div>

</section>
