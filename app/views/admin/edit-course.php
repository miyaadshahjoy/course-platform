<div class="edit-heading">
  <h2>Edit Course</h2>
</div>

<section class="edit">
  <form
    action="/admin/courses/update"
    method="POST"
    enctype="multipart/form-data"
    class="form form-edit"
  >

    <input type="hidden" name="id" value="<?= $course['ID'] ?>" />
    <div class="form-group">
      <label>Course Title</label>
      <input
        type="text"
        name="course_title"
        value="<?= $course['COURSE_TITLE'] ?>"
        required
      />
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea name="course_description" rows="15" required>
        <?= $course['COURSE_DESCRIPTION']->load() ?></textarea
      >
    </div>

    <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="thumbnail" accept="image/*" />
    </div>

    <div class="form-group">
      <label>Category</label>
      <select name="category" required>
        <option value="">Select category</option>
        <option value="Programming" <?= $course['CATEGORY'] === 'Programming' ? 'selected' : '' ?>>Programming</option>
        <option value="Design" <?= $course['CATEGORY'] === 'Design' ? 'selected' : '' ?>>Design</option>
        <option value="Marketing" <?= $course['CATEGORY'] === 'Marketing' ? 'selected' : '' ?>>Marketing</option>
        <option value="Business" <?= $course['CATEGORY'] === 'Business' ? 'selected' : '' ?>>Business</option>
      </select>
    </div>

    <div class="form-group">
      <label>Difficulty Level</label>
      <select name="difficulty_level" required>
        <?php
          $level = ['beginner', 'intermediate', 'advanced'];
          foreach ($level as $l) {
            $selected = ($course['DIFFICULTY_LEVEL'] === $l) ? 'selected' : '';
            echo "<option value=\"$l\" $selected>$l</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label>Duration (in minutes)</label>
      <input
        type="text"
        name="duration"
        value="<?= $course['DURATION'] ?>"
        required
      />
    </div>

    <div class="form-group">
      <label>Price (USD)</label>
      <input
        type="text"
        name="price"
        value="<?= $course['PRICE'] ?>"
        required
      />
    </div>

    <!-- <div class="form-group">
      <label>Status</label>
      <select
        name="status"
        required
      >
        <option value="draft">Draft</option>
        <option value="published">Publish</option>
      </select>
    </div> --->

    <input type="submit" value="Update Course" class="button-submit" />
  </form>
</section>
