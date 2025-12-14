<div class="courses">
  <div class="courses-header flex flex-jc-sb flex-ai-c">
    <h2 >Courses</h2>
    <a
      href="/admin/courses/create"
      class="btn btn-primary bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors"
      >➕ Add New Course</a
    >
  </div>

  <div class="courses-details">
    <table class="courses-table">
      <thead >
        <tr>
          <th>Thumbnail</th>
          <th>Title</th>
          <th>Category</th>
          <th>Price</th>
          <th>Level</th>
          <th>Status</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php if(!empty($courses)): ?>
        <?php foreach($courses as $course): ?>
        <tr >
          <td >
            <img
              src="/uploads/thumbnails/<?= htmlspecialchars($course['THUMBNAIL']) ?>"
              class="course-thumbnail"
              alt="Thumbnail"
            />
          </td>

          <td ><?= htmlspecialchars($course['COURSE_TITLE']) ?></td>
          <td ><?= htmlspecialchars($course['CATEGORY']) ?></td>
          <td >$<?= number_format($course['PRICE'], 2) ?></td>

          <td >
            <span >
              <?= ucfirst($course['DIFFICULTY_LEVEL']) ?>
            </span>
          </td>

          <td >
            <span>
              <?= ucfirst($course['STATUS']) ?>
            </span>
          </td>

          <td ><?= DateTime::createFromFormat('d-M-y h.i.s.u A', $course['CREATED_AT'])->format('F d, Y') ?></td>

          <td class="actions">
            <a href="/admin/courses/<?= $course['SLUG'] ?>" class="button button-blue">View</a>

            <a
              href="/admin/courses/edit/<?= $course['ID'] ?>" class="button button-yellow" >Edit</a
            >

            <?php if($course['STATUS'] === 'draft'): ?>
              <a
              href="/admin/courses/publish/<?= $course['ID'] ?>" class="button button-green"
              >Publish</a
              >
            <?php endif; ?>
            <?php if($course['STATUS'] === 'published'): ?>
            <a
              href="/admin/courses/draft/<?= $course['ID'] ?>" class="button button-orange"
              >Draft</a
            >
            <?php endif; ?>

            <a
              href="/admin/courses/archive/<?= $course['ID'] ?>" class="button button-orangered"
              >Archive</a
            >

            <!-- <a
              href="/admin/courses/delete/<?= $course['ID'] ?>" class="button button-red"
              onclick="return confirm('Delete this course?')"
              >Delete</a
            > -->
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
          <td>No courses found.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
