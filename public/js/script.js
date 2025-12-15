const modal = document.getElementById("updatePictureModal");
const closeBtn = document.querySelector(".modal-close");
const editPictureBtn = document.querySelector(".edit-picture");
const editProfileBtn = document.querySelector(".edit-profile");
const updateProfileBtn = document.getElementById("update-profile-btn");
const cancelProfileBtn = document.getElementById("cancel-profile-btn");
const categoriesForm = document.querySelector(".form-categories");
const addCategoryBtn = document.querySelector("#add-category");
const cancelCategoryBtn = document.querySelector("#cancel-category");
const mobileMenuBtn = document.querySelector(".mobile-menu");
const mobileMenu = document.querySelector(".mobile-links");
///////////////////////////////////////////////////////////////
const slides = document.getElementById("slides");
const dots = document.getElementById("dots");

const total = slides && slides.children.length;
let index = 0;

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
  modal?.classList.remove("hidden");
}

function showCategoriesForm() {
  categoriesForm?.classList.remove("not-visible");
}

function hideCategoriesForm() {
  categoriesForm?.classList.add("not-visible");
  categoriesForm?.reset();
}

mobileMenuBtn?.addEventListener("click", () => {
  if (mobileMenu?.classList.contains("hide")) {
    mobileMenu?.classList.remove("hide");
    document.querySelector("body").style.overflow = "hidden";
  } else if (!mobileMenu?.classList.contains("hide")) {
    mobileMenu?.classList.add("hide");
    document.querySelector("body").style.overflow = "auto";
  }
});

// Event Listeners

editProfileBtn?.addEventListener("click", editProfile);

cancelProfileBtn?.addEventListener("click", (e) => {
  e.preventDefault();
  console.log(e);
  cancelProfile();
});
editPictureBtn?.addEventListener("click", openUpdateModal);

closeBtn?.addEventListener("click", () => {
  modal.classList.add("hidden");
});

// Close when clicking outside
modal?.addEventListener("click", (e) => {
  if (e.target === modal) modal.classList.add("hidden");
});

addCategoryBtn?.addEventListener("click", showCategoriesForm);
cancelCategoryBtn?.addEventListener("click", (e) => {
  e.preventDefault();
  hideCategoriesForm();
});

////////////////////////////////////////////////
function createDots() {
  for (let i = 0; i < total; i++) {
    const d = document.createElement("div");
    d.className = "dot" + (i === 0 ? " active" : "");
    d.onclick = () => goTo(i);
    dots.appendChild(d);
  }
}

function update() {
  slides.style.transform = `translateX(-${index * 100}%)`;
  [...dots.children].forEach((d, i) =>
    d.classList.toggle("active", i === index)
  );
}

function goTo(i) {
  index = i;
  update();
}

function autoPlay() {
  index = (index + 1) % total;
  update();
}

createDots();
setInterval(autoPlay, 5000);

////////////////////////////////////////////////////////////////////////
