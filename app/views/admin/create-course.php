<div class="create-heading">
  <h2>Create New Course</h2>
</div>

<section class="create">
  <form
    action="/admin/courses/store"
    method="POST"
    enctype="multipart/form-data"
    class="create-form"
  >
    <div class="form-group">
      <label>Course Title</label>
      <input
        type="text"
        name="course_title"
        required
      />
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea
        name="course_description"
        rows="15"
        required
      ></textarea>
    </div>

    <div class="form-group">
      <label>Thumbnail</label>
      <input
        type="file"
        name="thumbnail"
        accept="image/*"
        required
      />
    </div>

    <div class="form-group">
      <label>Category</label>
      <select
        name="category"
        required
      >
        <option value="">Select category</option>
        <option value="Programming">Programming</option>
        <option value="Design">Design</option>
        <option value="Marketing">Marketing</option>
        <option value="Business">Business</option>
      </select>
    </div>

    <div class="form-group">
      <label>Difficulty Level</label>
      <select
        name="difficulty_level"
        required
      >
        <option value="beginner">Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
      </select>
    </div>

    <div class="form-group">
      <label>Duration (in minutes)</label>
      <input
        type="text"
        name="duration"
        required
      />
    </div>

    <div class="form-group">
      <label>Price (USD)</label>
      <input
        type="text"
        name="price"
        required
      />
    </div>

    <div class="form-group">
      <label>Status</label>
      <select
        name="status"
        required
      >
        <option value="draft">Draft</option>
        <option value="published">Publish</option>
      </select>
    </div>

    <input
      type="submit"
      value="Create Course"
      class="button button-primary"
    />
  </form>
</section>
