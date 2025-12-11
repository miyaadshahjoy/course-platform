<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css" />
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="profile">
        <h3>Profile Information</h3>
        <div class="profile-wrapper">
          <div class="profile-image">
            <img src="/uploads/users/user.svg" />
            <button class="button button-edit edit-picture">
              <svg
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                height="24"
                width="24"
              >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g
                  id="SVGRepo_tracerCarrier"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                    stroke="#000000"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></path>
                  <path
                    d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                    stroke="#000000"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></path>
                </g>
              </svg>
              <span>Edit Picture</span>
            </button>
          </div>
          <div class="profile-info">
            <button class="button button-edit edit-profile">
              <svg
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                height="24"
                width="24"
              >
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g
                  id="SVGRepo_tracerCarrier"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                ></g>
                <g id="SVGRepo_iconCarrier">
                  <path
                    d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                    stroke="#000000"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></path>
                  <path
                    d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                    stroke="#000000"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></path>
                </g>
              </svg>
            </button>
            <form action="" class="form-profile">
              <div class="form-wrapper">
                <div class="form-group">
                  <label>Full Name</label>
                  <input
                    type="text"
                    name="fullname"
                    value="Zayd Hasnain"
                    required
                    disabled
                  />
                </div>
                <div class="form-group">
                  <label>User Name</label>
                  <input
                    type="text"
                    name="username"
                    value="zaydhasnain"
                    required
                    disabled
                  />
                </div>

                <div class="form-group">
                  <label>Email Address</label>
                  <input
                    type="email"
                    name="email"
                    value="zayd.hasnain@example.com"
                    required
                    disabled
                  />
                </div>
              </div>

              <input
                type="submit"
                value="Update Profile"
                class="button button-submit hide"
                id="update-profile-btn"
              />

              <button class="button button-cancel hide" id="cancel-profile-btn">Cancel</button>
            </form>
          </div>
        </div>
      </div>

      <div class="password">
        <h3>Update Password</h3>

        <form
          action="/admin/account/update-password"
          method="POST"
          class="form-password"
        >
          <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="current_password" required />
          </div>

          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" required />
          </div>

          <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" required />
          </div>

          <input
            type="submit"
            value="Update Password"
            class="button button-submit"
          />
        </form>
      </div>

      <!-- MODAL -->
      <div id="updatePictureModal" class="modal-overlay hidden">
        <div class="modal-box">
          <div class="modal-header">
              <h2>Update Picture</h2>
              <button class="modal-close">&times;</button>
          </div>

          <form id="" enctype="multipart/form-data">
            <div class="form-group">
              <label class="modal-label">Picture</label>
              <input type="file" name="picture" class="modal-input" />

              <input type="submit" class="button button-submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="/js/script.js"></script>
  </body>
</html>
