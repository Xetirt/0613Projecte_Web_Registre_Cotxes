<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Afegir un nou cotxe</h2>
    <form action="/cars/store" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Marca</label>
            <input type="text" name="marca" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Model</label>
            <input type="text" name="model" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">URL de la Foto</label>
            <input type="url" name="photo" required class="w-full border p-2 rounded" placeholder="https://ejemplo.com/foto.jpg">
        </div>
        <div>
            <label class="block text-sm font-medium">Any</label>
            <input type="number" name="year" required min="1900" max="2027" class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded font-semibold">Guardar Cotxe</button>
    </form>
</div>