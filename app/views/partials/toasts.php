<?php use App\Core\Flash; ?>
<?php foreach (Flash::get() as $toast): ?>
    <div class="toast toast-<?= $toast['type'] ?>">
        <?= htmlspecialchars($toast['message']) ?>
    </div>
<?php endforeach; ?>
