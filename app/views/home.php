<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Course Platform</title>
  </head>
  <body>
    <!-- header  -->
    <?php require_once __DIR__ . '/partials/header.php'; ?>
    <!-- Hero section  -->

    <section class="hero">
      <!-- <div class="slides" id="slides">
        <div
          class="slide"
          style="background-image: url('/img/hero-1.jpg')"
        ></div>
        <div
          class="slide"
          style="background-image: url('/img/hero-2.jpg')"
        ></div>
        <div
          class="slide"
          style="background-image: url('/img/hero-3.jpg')"
        ></div>
      </div> -->

      <!-- <div class="dots" id="dots"></div> -->

      <div class="hero-content"></div>
    </section>

    <!-- Testimonial section -->
    <section class="testimonial">
      <div class="container-main">
        <div class="testimonial-header">
          <h2>What Our Students Say</h2>
          <p>
            আমাদের শিক্ষা কার্যক্রমে অংশ নিয়ে শত শত শিক্ষার্থী তাদের লক্ষ্য
            অর্জনে এগিয়ে যাচ্ছে। আসুন শুনি, তাদের বাস্তব অভিজ্ঞতা ও সাফল্যের
            গল্প।
          </p>
        </div>

        <div class="testimonial-grid">
          <!-- Card 1 -->
          <div class="testimonial-card">
            <div class="testimonial-avatar">
              <img src="img/user-1.jpg" alt="Kamrul Islam" />
            </div>
            <div class="testimonial-name">Kamrul Islam</div>
            <div class="testimonial-role">Freelancer</div>
            <div class="divider"></div>
            <div class="testimonial-text">
              IMPRESSIVE! প্রথম দিকে কোর্সটি একটু এভারেজ লাগলেও শেষ করার পর
              নিজের ভেতর একটি ডিজিটাল ও অপারেশনাল দক্ষতা কাজ করছে।
            </div>
            <div class="stars">★★★★★</div>
          </div>

          <!-- Card 2 -->
          <div class="testimonial-card">
            <div class="testimonial-avatar">
              <img src="img/user-2.jpg" alt="Najia Ahmed" />
            </div>
            <div class="testimonial-name">Najia Ahmed</div>
            <div class="testimonial-role">Entrepreneur, Premium Buy</div>
            <div class="divider"></div>
            <div class="testimonial-text">
              Helpful Instructor। ফেসবুক থেকে শুরু করে ই-কমার্স সেটআপ, পেমেন্ট
              গেটওয়ে সবকিছু হাতে-কলমে শেখানো হয়েছে।
            </div>
            <div class="stars">★★★★★</div>
          </div>

          <!-- Card 3 -->
          <div class="testimonial-card">
            <div class="testimonial-avatar">
              <img src="img/user-3.jpg" alt="Mehedi Hasan Shohag" />
            </div>
            <div class="testimonial-name">Mehedi Hasan Shohag</div>
            <div class="testimonial-role">Student</div>
            <div class="divider"></div>
            <div class="testimonial-text">
              Excellent Course। ডিজিটাল মার্কেটিং এত সহজভাবে শেখানো হয়েছে যে
              নতুনদের জন্যও বুঝতে সমস্যা হয় না।
            </div>
            <div class="stars">★★★★★</div>
          </div>
        </div>
      </div>
    </section>

    <section class="video-gallery">
      <div class="container">
        <div class="gallery-wrapper">
          <div class="video video-1" data-video="videos/video1.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-2" data-video="videos/video2.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-3" data-video="videos/video3.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-4" data-video="videos/video4.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-5" data-video="videos/video5.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-6" data-video="videos/video6.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>

          <div class="video video-7" data-video="videos/video7.mp4">
            <div class="thumb">
              <span class="play-btn"
                ><svg
                  width="48px"
                  height="48px"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g
                    id="SVGRepo_tracerCarrier"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M16.6582 9.28638C18.098 10.1862 18.8178 10.6361 19.0647 11.2122C19.2803 11.7152 19.2803 12.2847 19.0647 12.7878C18.8178 13.3638 18.098 13.8137 16.6582 14.7136L9.896 18.94C8.29805 19.9387 7.49907 20.4381 6.83973 20.385C6.26501 20.3388 5.73818 20.0469 5.3944 19.584C5 19.053 5 18.1108 5 16.2264V7.77357C5 5.88919 5 4.94701 5.3944 4.41598C5.73818 3.9531 6.26501 3.66111 6.83973 3.6149C7.49907 3.5619 8.29805 4.06126 9.896 5.05998L16.6582 9.28638Z"
                      stroke="#ffffff"
                      stroke-width="2"
                      stroke-linejoin="round"
                    ></path>
                  </g></svg
              ></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MODAL -->
    <div class="video-modal" id="videoModal">
      <div class="modal-content">
        <button class="close-btn">&times;</button>
        <video controls id="modalVideo"></video>
      </div>
    </div>

    <!-- Course section  -->
    <section class="courses">
      <div class="container-main">
        <h2>Popular Courses</h2>
        <p>Explore our top courses and start learning today</p>
        <div class="courses-container">
          <div class="course-card">
            <img src="img/course-1.jpg" alt="Course 1" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$149.00</div>
              <div class="course-rating">★★★★★ (123)</div>
              <div class="course-title">
                Web Design & Development Course for Beginners
              </div>
              <div class="course-info">
                <span>23 Hrs</span>
                <span>30 Students</span>
              </div>
            </div>
          </div>

          <div class="course-card">
            <img src="img/course-2.jpg" alt="Course 2" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$149.00</div>
              <div class="course-rating">★★★★★ (93)</div>
              <div class="course-title">
                Data Science and Machine Learning Career Path
              </div>
              <div class="course-info">
                <span>12 Hrs</span>
                <span>37 Students</span>
              </div>
            </div>
          </div>

          <div class="course-card">
            <img src="img/course-3.jpg" alt="Course 3" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$149.00</div>
              <div class="course-rating">★★★★★ (97)</div>
              <div class="course-title">
                AI Agent Development for Non-Coders
              </div>
              <div class="course-info">
                <span>5 Hrs</span>
                <span>145 Students</span>
              </div>
            </div>
          </div>
        </div>
        <a href="/courses" class="button">See More</a>
      </div>
    </section>

    <!-- About section  -->
    <section class="about">
      <div class="container-main">
        <div class="about-content">
          <div class="about-image">
            <img src="img/about-us.svg" alt="About Image" />
          </div>
          <div class="about-text">
            <span class="subtitle">ABOUT US</span>
            <h2>First Choice For Online Education Anywhere</h2>
            <p>
              Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam
              dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam
              diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem
              et sit, sed stet no labore lorem sit. Sanctus clita duo justo et
              tempor consetetur takimata eirmod, dolores takimata consetetur
              invidunt magna dolores aliquyam dolores dolore. Amet erat amet et
              magna.
            </p>
          </div>
        </div>
      </div>
    </section>

    <?php require_once __DIR__ . '/partials/footer.php'; ?>

    <script src="../../js/script.js"></script>
  </body>
</html>
