const modal = document.getElementById("updatePictureModal");
const closeBtn = document.querySelector(".modal-close");
const editPictureBtn = document.querySelector(".edit-picture");
const editProfileBtn = document.querySelector(".edit-profile");
const updateProfileBtn = document.getElementById("update-profile-btn");
const cancelProfileBtn = document.getElementById("cancel-profile-btn");

function editProfile() {
  document
    .querySelector(".form-wrapper")
    .querySelectorAll("input")
    .forEach((input) => {
      input.disabled = false;
    });
  updateProfileBtn.classList.remove("hide");
  cancelProfileBtn.classList.remove("hide");
}

function cancelProfile() {
  document
    .querySelector(".form-wrapper")
    .querySelectorAll("input")
    .forEach((input) => {
      input.disabled = true;
    });
  updateProfileBtn.classList.add("hide");
  cancelProfileBtn.classList.add("hide");
}

function openUpdateModal() {
  modal.classList.remove("hidden");
}

// Event Listeners

editProfileBtn.addEventListener("click", editProfile);

cancelProfileBtn.addEventListener("click", (e) => {
  e.preventDefault();
  console.log(e);
  cancelProfile();
});
editPictureBtn.addEventListener("click", openUpdateModal);

closeBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});

// Close when clicking outside
modal.addEventListener("click", (e) => {
  if (e.target === modal) modal.classList.add("hidden");
});
