<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Courses</title>
  </head>
  <body>
    <!-- header  -->
    <?php require_once __DIR__ . '/partials/header.php'; ?>

    <!-- Course section  -->
    <section class="courses" style="padding-top: 64px;">
      <div class="container-main">
        <h2>Our Courses</h2>
        <p style="margin-bottom: 48px;">Explore our top courses and start learning today</p>
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

          <!-- Trading Courses -->
          <div class="course-card">
            <img src="img/course-4.jpg" alt="Trading Course 1" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$129.00</div>
              <div class="course-rating">★★★★☆ (112)</div>
              <div class="course-title">Stock Trading for Beginners</div>
              <div class="course-info">
                <span>8 Hrs</span>
                <span>88 Students</span>
              </div>
            </div>
          </div>

          <div class="course-card">
            <img src="img/course-5.jpg" alt="Trading Course 2" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$139.00</div>
              <div class="course-rating">★★★★★ (76)</div>
              <div class="course-title">Crypto Trading Masterclass</div>
              <div class="course-info">
                <span>10 Hrs</span>
                <span>54 Students</span>
              </div>
            </div>
          </div>

          <div class="course-card">
            <img src="img/course-6.jpg" alt="Trading Course 3" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$159.00</div>
              <div class="course-rating">★★★★★ (64)</div>
              <div class="course-title">Advanced Forex Trading Strategies</div>
              <div class="course-info">
                <span>15 Hrs</span>
                <span>33 Students</span>
              </div>
            </div>
          </div>

          <!-- New Trading Course -->
          <div class="course-card">
            <img src="img/course-7.jpg" alt="Trading Course 4" />
            <div class="course-content">
              <div class="course-buttons">
                <button>Read More</button>
                <button>Enroll Now</button>
              </div>
              <div class="course-price">$119.00</div>
              <div class="course-rating">★★★★☆ (58)</div>
              <div class="course-title">Options Trading for Beginners</div>
              <div class="course-info">
                <span>7 Hrs</span>
                <span>41 Students</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php require_once __DIR__ . '/partials/footer.php'; ?>

    <script src="../../js/script.js"></script>
  </body>
</html>
