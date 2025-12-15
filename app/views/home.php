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
      <div class="slides" id="slides">
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
      </div>

      <div class="dots" id="dots"></div>
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
              <img
                src="img/user-3.jpg"
                alt="Mehedi Hasan Shohag"
              />
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

    <?php require_once __DIR__ . '/partials/footer.php'; ?>

    <script src="../../js/script.js"></script>
  </body>
</html>
