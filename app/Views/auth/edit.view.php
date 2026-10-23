<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Editar cotxe</h2>
    <form action="/cars/update" method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?= $car['id'] ?>">
        <div>
            <label class="block text-sm font-medium">Marca</label>
            <input type="text" name="marca" value="<?= htmlspecialchars($car['marca']) ?>" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Model</label>
            <input type="text" name="model" value="<?= htmlspecialchars($car['model']) ?>" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">URL de la Foto</label>
            <input type="url" name="photo" value="<?= htmlspecialchars($car['photo']) ?>" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Any</label>
            <input type="number" name="year" value="<?= htmlspecialchars($car['year']) ?>" required class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded font-semibold">Actualitzar Cotxe</button>
    </form>
</div>