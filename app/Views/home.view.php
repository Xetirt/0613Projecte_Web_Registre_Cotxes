<?php include __DIR__ . '/partials/header.view.php'; ?>
<?php include __DIR__ . '/partials/nav.view.php'; ?>

<h1 class="h-8 text-3xl text-emerald-600"><?= $title ?? 'Página Principal' ?></h1>
<hr>

<main class="container">
    <?php if (!empty($user) && is_array($user)): ?>
        <h2>Bienvenido, <?= htmlspecialchars($user['name'] ?? $user['email']) ?></h2>
    <?php else: ?>
        <h2>Bienvenido, Invitado</h2>
    <?php endif; ?>
</main>

</body>
</html>