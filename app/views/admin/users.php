<div class="users-list">
  <h2>Users</h2>

  <div class="users-details">
    <table class="users-table">
      <thead >
        <tr>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Joined</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user['FULLNAME']) ?></td>
          <td><?= htmlspecialchars($user['USERNAME']) ?></td>
          <td><?= htmlspecialchars($user['EMAIL']) ?></td>

          <td>
            <span>
              <?= ucfirst($user['ROLE']) ?>
            </span>
          </td>

          <td>
            <?= DateTime::createFromFormat('d-M-y h.i.s.u A', $user['CREATED_AT'])->format('F d, Y') ?>
          </td>

          <td class="">
            <a
              href="/admin/users/view/<?= $user['ID'] ?>"
              class="button button-blue"
              >View</a
            >

            <a
              href="/admin/users/delete/<?= $user['ID'] ?>"
              onclick="return confirm('Permanently delete this user?')"
              class="button button-red"
              >Delete</a
            >
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
          <td colspan="6" >No users found.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
