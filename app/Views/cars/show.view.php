<?php 
use App\Core\Session;

include __DIR__ . '/../pages/partials/header.view.php'; 
include __DIR__ . '/../pages/partials/nav.view.php'; 
?>

<main class="container mx-auto mt-6 p-4">
    <a href="/" class="text-blue-600 hover:underline">&larr; Volver al inicio</a>

    <?php if (!empty($car) && is_array($car)): ?>
        <div class="mt-4 bg-white shadow rounded-lg p-6 flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2">
                <img src="<?= htmlspecialchars($car['photo'] ?? '/uploads/default.jpg') ?>" 
                     alt="<?= htmlspecialchars($car['marca'] ?? 'Vehículo') ?>" 
                     class="w-full h-64 object-cover rounded-lg">
            </div>
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold">
                    <?= htmlspecialchars($car['marca'] ?? '') ?> <?= htmlspecialchars($car['model'] ?? '') ?>
                </h1>
                <p class="text-gray-600 text-lg mt-2">
                    Año: <strong><?= htmlspecialchars((string)($car['year'] ?? '')) ?></strong>
                </p>

                <div class="mt-4 border-t pt-4">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Descripción</h3>
                    <p class="text-gray-700 mt-1 leading-relaxed">
                        <?= !empty($car['description']) ? nl2br(htmlspecialchars($car['description'])) : '<span class="italic text-gray-400">Sin descripción disponible.</span>' ?>
                    </p>
                </div>

                <?php if (Session::isAdmin()): ?>
                    <div class="mt-6 flex gap-3">
                        <a href="/cars/edit?id=<?= $car['id'] ?>" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
                        <form action="/cars/delete" method="POST" onsubmit="return confirm('¿Eliminar este coche?');">
                            <input type="hidden" name="id" value="<?= $car['id'] ?>">
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sección de Comentarios -->
        <section class="mt-8 bg-gray-50 rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Comentarios</h2>

            <?php if (Session::isLoggedIn()): ?>
                <form action="/comments/store" method="POST" class="mb-6">
                    <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                    <textarea name="content" rows="3" required placeholder="Escribe tu comentario sobre este vehículo..." 
                              class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    <button type="submit" class="mt-2 bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                        Publicar Comentario
                    </button>
                </form>
            <?php else: ?>
                <p class="text-gray-600 mb-4"><a href="/login" class="text-blue-600 underline">Inicia sesión</a> para dejar un comentario.</p>
            <?php endif; ?>

            <div class="space-y-4">
                <?php if (!empty($comments) && is_array($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="bg-white p-4 rounded shadow-sm border">
                            <div class="flex justify-between items-center mb-1">
                                <strong class="text-gray-800"><?= htmlspecialchars($comment['author_name'] ?? 'Usuario') ?></strong>
                                <span class="text-xs text-gray-500"><?= htmlspecialchars($comment['created_at'] ?? '') ?></span>
                            </div>
                            <p class="text-gray-700"><?= nl2br(htmlspecialchars($comment['content'] ?? '')) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500 italic">No hay comentarios todavía. ¡Sé el primero en opinar!</p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
</main>

</body>
</html>