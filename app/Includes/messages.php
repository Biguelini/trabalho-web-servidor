<?php if (isset($message)): ?>
    <div class="alert alert-<?php echo htmlspecialchars($message['type']); ?>" role="alert">
        <?php echo htmlspecialchars($message['content']); ?>
    </div>
<?php endif; ?>
