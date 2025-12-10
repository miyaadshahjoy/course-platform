<section class="analytics">
  <!-- Card -->
  <div class="analytic-card">
    <h3 >Total Courses</h3>
    <p><?= $analyticsData['totalCourses'] ?></p>
  </div>

  <div class="analytic-card">
    <h3 >Published</h3>
    <p><?= $analyticsData['publishedCourses'] ?></p>
  </div>

  <div class="analytic-card">
    <h3 >Draft Courses</h3>
    <p><?= $analyticsData['draftCourses'] ?></p>
  </div>
</section>

<!-- Recent courses -->

<section class="recent-courses">
  <h2>Recent Courses</h2>
  <table class="recent-table">
    <thead>
      <tr>
        <th >Title</th>
        <th >Category</th>
        <th >Status</th>
        <th >Created At</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($courses as $course): ?>
      <tr>
        <td ><?= $course['COURSE_TITLE'] ?></td>
        <td><?= $course['CATEGORY'] ?></td>
        <td><?= $course['STATUS'] ?></td>
        <td><?= DateTime::createFromFormat('d-M-y h.i.s.u A', $course['CREATED_AT'])->format('F d, Y h:i') ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
