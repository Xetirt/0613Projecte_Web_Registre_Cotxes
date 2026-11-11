<?php include __DIR__ . '/pages/partials/header.view.php'; ?>
<?php include __DIR__ . '/pages/partials/nav.view.php'; ?>

<main class="container mx-auto mt-6 p-4">
    <h1 class="text-3xl font-bold text-emerald-600 mb-4"><?= htmlspecialchars($title ?? 'Página Principal') ?></h1>
    <hr class="mb-6">

    <div class="bg-white p-6 rounded-lg shadow">
        <?php if (!empty($user) && is_array($user)): ?>
            <h2 class="text-xl font-semibold">Bienvenido, <?= htmlspecialchars($user['name'] ?? $user['email']) ?></h2>
        <?php else: ?>
            <h2 class="text-xl font-semibold text-gray-700">Bienvenido a AutoRegistry</h2>
            <p class="text-gray-500 mt-2">Explora nuestro catálogo completo de vehículos o inicia sesión para interactuar.</p>
        <?php endif; ?>
    </div>
</main>

</body>
</html>