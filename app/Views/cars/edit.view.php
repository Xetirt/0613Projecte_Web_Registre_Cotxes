<?php include __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php include __DIR__ . '/../pages/partials/nav.view.php'; ?>

<main class="container mx-auto mt-6 p-4 max-w-xl">
    <a href="/cars" class="text-blue-600 hover:underline">&larr; Volver al catálogo</a>

    <div class="mt-4 bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Vehículo</h1>

        <?php if (!empty($car) && is_array($car)): ?>
            <form action="/cars/update" method="POST" class="space-y-4">
                <input type="hidden" name="id" value="<?= htmlspecialchars((string)($car['id'] ?? '')) ?>">

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Marca</label>
                    <input type="text" name="marca" required value="<?= htmlspecialchars($car['marca'] ?? '') ?>" 
                           class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Modelo</label>
                    <input type="text" name="model" required value="<?= htmlspecialchars($car['model'] ?? '') ?>" 
                           class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Año</label>
                    <input type="number" name="year" required value="<?= htmlspecialchars((string)($car['year'] ?? '')) ?>" min="1900" max="2030" 
                           class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">URL de la Imagen</label>
                    <input type="text" name="photo" value="<?= htmlspecialchars($car['photo'] ?? '') ?>" 
                           class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">
                    Actualizar Vehículo
                </button>
            </form>
        <?php else: ?>
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <p>No se han encontrado los datos del vehículo a editar.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

</body>
</html>