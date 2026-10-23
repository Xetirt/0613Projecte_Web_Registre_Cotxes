<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>

<div class="max-w-3xl mx-auto p-6 bg-white mt-6 rounded shadow">
    <img src="<?= htmlspecialchars($car['photo']) ?>" class="w-full h-64 object-cover rounded">
    <h1 class="text-3xl font-bold mt-4"><?= htmlspecialchars($car['marca']) ?> <?= htmlspecialchars($car['model']) ?></h1>
    <p class="text-gray-600">Any: <?= htmlspecialchars($car['year']) ?></p>

    <hr class="my-6">

    <h2 class="text-2xl font-bold mb-4">Comentaris</h2>

    <?php if (\App\Core\Session::get('user_id')): ?>
        <form action="/comments/store" method="POST" class="mb-6">
            <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
            <textarea name="description" class="w-full border p-2 rounded mb-2" placeholder="Escriu un comentari..." required></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Publicar comentari</button>
        </form>
    <?php else: ?>
        <p class="text-sm text-gray-500 mb-4"><a href="/login" class="text-blue-600 underline">Inicia sessió</a> per deixar un comentari.</p>
    <?php endif; ?>

    <div class="space-y-4">
        <?php foreach ($comments as $comment): ?>
            <div class="bg-gray-50 p-3 rounded border">
                <p class="text-xs text-gray-500 font-bold"><?= htmlspecialchars($comment['email']) ?></p>
                <p class="mt-1"><?= htmlspecialchars($comment['description']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>