<?php include __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php include __DIR__ . '/../pages/partials/nav.view.php'; ?>

<main class="container mx-auto mt-6 p-4 max-w-xl">
    <a href="/" class="text-blue-600 hover:underline">&larr; Volver al inicio</a>

    <div class="mt-4 bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Añadir Nuevo Vehículo</h1>

        <form action="/cars/store" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Marca</label>
                <input type="text" name="marca" required placeholder="Ej: Škoda" 
                       class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Modelo</label>
                <input type="text" name="model" required placeholder="Ej: Fabia" 
                       class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Año</label>
                <input type="number" name="year" required value="<?= date('Y') ?>" min="1900" max="2030" 
                       class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">URL de la Imagen</label>
                <input type="text" name="photo" placeholder="https://ejemplo.com/imagen.jpg" 
                       class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Descripción</label>
                <textarea name="description" rows="4" placeholder="Escribe las características, motorización o detalles del vehículo..." 
                          class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-2 rounded hover:bg-emerald-700">
                Guardar Vehículo
            </button>
        </form>
    </div>
</main>

</body>
</html>