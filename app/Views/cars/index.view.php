<?php 
use App\Core\Session;

include __DIR__ . '/../pages/partials/header.view.php'; 
include __DIR__ . '/../pages/partials/nav.view.php'; 
?>

<main class="container mx-auto mt-6 p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Catálogo de Vehículos</h1>
        <?php if (Session::isAdmin()): ?>
            <a href="/cars/create" class="bg-emerald-600 text-white font-bold px-4 py-2 rounded hover:bg-emerald-700">
                + Nuevo Coche
            </a>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php if (!empty($cars) && is_array($cars)): ?>
            <?php foreach ($cars as $car): ?>
                <div class="bg-white rounded-lg shadow border p-4 flex flex-col justify-between">
                    <div>
                        <img src="<?= htmlspecialchars($car['photo'] ?? '/uploads/default.jpg') ?>" 
                             alt="<?= htmlspecialchars($car['marca'] ?? 'Coche') ?>" 
                             class="w-full h-48 object-cover rounded mb-4">
                        <h2 class="text-xl font-bold">
                            <?= htmlspecialchars($car['marca'] ?? '') ?> <?= htmlspecialchars($car['model'] ?? '') ?>
                        </h2>
                        <p class="text-gray-600">Año: <?= htmlspecialchars((string)($car['year'] ?? '')) ?></p>
                    </div>

                    <div class="mt-4 flex gap-2 justify-between items-center">
                        <a href="/cars/show?id=<?= htmlspecialchars((string)$car['id']) ?>" class="text-blue-600 font-semibold hover:underline">
                            Ver detalles &rarr;
                        </a>
                        <?php if (Session::isAdmin()): ?>
                            <div class="flex gap-2">
                                <a href="/cars/edit?id=<?= $car['id'] ?>" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                    Editar
                                </a>
                                <form action="/cars/delete" method="POST" onsubmit="return confirm('¿Eliminar este coche?');">
                                    <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-500 italic col-span-3">No hay coches registrados en la base de datos.</p>
        <?php endif; ?>
    </div>
</main>

</body>
</html>