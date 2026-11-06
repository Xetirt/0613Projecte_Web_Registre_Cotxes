<?php 
/** @var array $car */
/** @var array $comments */
?>

<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<main class="flex-grow max-w-4xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <a href="/cars" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-slate-800 mb-6 transition">
        &larr; Volver al catálogo
    </a>

    <?php if ($car): ?>
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
            <!-- Gran Banner de Foto -->
            <div class="h-80 bg-slate-900 relative">
                <?php if (!empty($car['photo'])): ?>
                    <img src="<?= htmlspecialchars($car['photo']) ?>" alt="<?= htmlspecialchars($car['marca']) ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-slate-500 font-medium">Sin Imagen disponible</div>
                <?php endif; ?>
            </div>

            <!-- Ficha Técnica -->
            <div class="p-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-6 mb-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-indigo-600">Vehículo #<?= $car['id'] ?></span>
                        <h1 class="text-3xl font-extrabold text-slate-900 mt-1">
                            <?= htmlspecialchars($car['marca']) ?> <?= htmlspecialchars($car['model']) ?>
                        </h1>
                    </div>

                    <?php if (\App\Core\Session::get('user_id')): ?>
                        <div class="flex items-center gap-2">
                            <a href="/cars/edit?id=<?= $car['id'] ?>" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                                Editar Datos
                            </a>
                            <form action="/cars/delete" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este coche?');">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 bg-slate-50 p-6 rounded-xl border border-slate-100 mb-8">
                    <div>
                        <span class="text-xs text-slate-400 font-medium uppercase">Marca</span>
                        <p class="text-base font-semibold text-slate-800"><?= htmlspecialchars($car['marca']) ?></p>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 font-medium uppercase">Modelo</span>
                        <p class="text-base font-semibold text-slate-800"><?= htmlspecialchars($car['model']) ?></p>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 font-medium uppercase">Año de Fabricación</span>
                        <p class="text-base font-semibold text-slate-800"><?= htmlspecialchars($car['year']) ?></p>
                    </div>
                </div>

                <!-- Sección de Comentarios -->
                <h3 class="text-xl font-bold text-slate-900 mb-4">Comentarios de la Comunidad</h3>

                <?php if (\App\Core\Session::get('user_id')): ?>
                    <form action="/comments/store" method="POST" class="mb-6">
                        <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
                        <textarea name="description" rows="3" class="w-full p-3 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm mb-3" placeholder="Escribe tu opinión sobre este vehículo..." required></textarea>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                            Publicar Comentario
                        </button>
                    </form>
                <?php else: ?>
                    <p class="text-sm text-slate-500 bg-slate-100 p-3 rounded-lg mb-6">
                        <a href="/login" class="text-indigo-600 font-semibold underline">Inicia sesión</a> para dejar un comentario.
                    </p>
                <?php endif; ?>

                <!-- Lista de comentarios -->
                <div class="space-y-3">
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="p-4 bg-white border border-slate-200 rounded-xl">
                                <span class="text-xs font-bold text-indigo-600"><?= htmlspecialchars($comment['email']) ?></span>
                                <p class="text-sm text-slate-700 mt-1"><?= htmlspecialchars($comment['description']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-sm text-slate-400 italic">No hay comentarios sobre este coche todavía.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="p-12 text-center bg-white rounded-2xl border border-slate-200">
            <h2 class="text-xl font-bold text-slate-800">Vehículo no encontrado</h2>
        </div>
    <?php endif; ?>
</main>