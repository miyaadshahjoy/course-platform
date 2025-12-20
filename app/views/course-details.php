<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>[Course Title]</title>
  </head>
  <body class="course-details">
    <?php require_once __DIR__ . '/partials/header.php'; ?>
    <!-- HERO SECTION -->
    <section class="course-hero">
      <div class="container">
        <div class="hero-wrapper">
          <div class="video-preview">▶ Preview Course</div>

          <div class="hero-info">
            <h1>A Complete Trading Course</h1>
            <!-- Course Title --->
            <p class="value-prop">
              Binnance থেকে ১০০% রিস্ক ফ্রি ওয়েতে ইনকাম করতে পারবেন শুধুমাত্র
              একটি কোর্স করে
            </p>

            <div class="stats">
              <div class="stat">👨‍🎓 1,245 students joined</div>
              <!-- Enrollment count --->
              <div class="stat">⭐ 4.8 / 5</div>
              <!----- Rating --->
              <div class="stat">⏱ 18.5 hours of lessons</div>
              <!-- Course duration --->
            </div>

            <div class="course-price">
              Registration fee: <span id="price">৳ 3,500</span>
            </div>
            <!-- Course price --->
            <button class="button button-submit">Enroll Now</button>
          </div>
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="content-details">
      <div class="container">
        <div class="content-wrapper">
          <!-- LEFT CONTENT -->
          <div>
            <section class="content course-curriculum">
              <h2>Course Curriculum</h2>

              <div class="curriculum-item">
                <h3 class="curriculum-header">
                  01. Understanding Blockchain Technology
                </h3>
                <ul class="curriculum-list">
                  <li>Basic of Bitcoin, Ethereum, and altcoins</li>
                  <li>How bitcoin works and its role in crypto network</li>
                  <li>Types of cryptocurrencies and their uses</li>
                </ul>
              </div>

              <div class="curriculum-item">
                <h3 class="curriculum-header">02. Setup and Foundation</h3>
                <ul class="curriculum-list">
                  <li>Creating and securing crypto wallet</li>
                  <li>Choosing and registering on crypto exchanges</li>
                  <li>How to conduct safe and secure transaction</li>
                </ul>
              </div>
              <div class="curriculum-item">
                <h3 class="curriculum-header">03. Crypto Trading Essential</h3>
                <ul class="curriculum-list">
                  <li>Trading Vs Investing</li>
                  <li>How to read market trends and charts</li>
                </ul>
              </div>
            </section>

            <div class="content course-outcomes">
              <h2>What You Will Learn</h2>
              <ul>
                <li>🔥 (Live Class এর মাধ্যমে) প্রতিদিন ইনকামের ১০০% সিক্রেট পদ্ধতি শিখানো হবে!!!</li>
                <li>🔥 প্রতিদিন $10 – $100 ডলার ইনকামের সিক্রেট পদ্ধতি (Spot Trading) এর মাধ্যমে</li>
                <li>🔥 প্রতিদিন $50 – $500 ডলার ইনকামের সিক্রেট পদ্ধতি (Future Trading) এর মাধ্যমে</li>
                <li>🔥 প্রতিমাসে (৫০ হাজার থেকে ১ লক্ষ টাকা) ইনকামের সিক্রেট পদ্ধতি</li>
                <li>🔥 বিদেশি ফান্ডের মাধ্যমে (Prop Trading) কিভাবে ট্রেডিং করবেন?</li>
                <li>🔥 ক্রিপ্টোকারেন্সির মাধ্যমে কোটিপতি হওয়ার গোপন ফর্মুলা (9 বছরের অভিজ্ঞতা থেকে)</li>
                <li>🔴 ইত্যাদি, আরো অনেকগুলো গুরুত্বপূর্ণ কাজ শিখে, নিজেকে দক্ষ প্রফেশনাল ট্রেডার হিসাবে গড়ে তুলতে পারবেন, ইনশাল্লাহ!</li>
              </ul>
            </div>

            <div class="content course-description">
              <h2>Course Description</h2>
              <!-- Course description -->
              <p>
                This course is a complete, practical guide to becoming a confident and
                disciplined crypto trader. Instead of theory-heavy lessons, you will learn
                real trading strategies that work in live market conditions — from spotting
                high-probability trade setups to managing risk like a professional.
              </p>

              <p>
                You will understand how the crypto market actually moves, how to read charts,
                identify trends, and execute both spot and futures trades with proper risk
                management. The course also covers mindset, capital protection, and common
                mistakes that cause beginners to lose money.
              </p>

              <p>
                By the end of this course, you won’t just “know about trading” — you will have
                a repeatable trading system, clear entry and exit strategies, and the
                confidence to trade independently and consistently.
              </p>

            </div>
          </div>

          <!-- RIGHT STICKY CARD -->
          <aside class="enroll-card">
            <div class="price">৳ 3,500</div>
            <!-- Course price --->
            <button class="button button-submit">Enroll Now</button>
            <button class="button button-cancel" id="shareBtn">
              Share Course
            </button>
          </aside>
        </div>
      </div>
    </section>
    <?php require_once __DIR__ . '/partials/footer.php'; ?>
  </body>
  <script src="/js/script.js"></script>
</html>
