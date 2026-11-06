<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<main class="flex-grow max-w-lg w-full mx-auto px-4 py-10">
    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">Registrar Nuevo Cotxe</h2>

        <form action="/cars/store" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Marca</label>
                <input type="text" name="marca" placeholder="Ej. Nissan, Seat..." required class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Modelo</label>
                <input type="text" name="model" placeholder="Ej. Silvia, Ibiza..." required class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">URL de la Foto</label>
                <input type="url" name="photo" placeholder="https://ejemplo.com/foto.jpg" required class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Año</label>
                <input type="number" name="year" min="1900" max="2027" value="2024" required class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="pt-2 flex gap-3">
                <button type="submit" class="flex-grow bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 rounded-lg text-sm transition">
                    Guardar Vehículo
                </button>
                <a href="/cars" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-lg transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</main>