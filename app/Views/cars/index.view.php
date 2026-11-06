<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Encabezado & Buscador -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Catálogo de Vehículos</h1>
            <p class="text-sm text-slate-500 mt-1">Explora, añade y gestiona los coches registrados en la plataforma.</p>
        </div>

        <div class="flex items-center gap-3">
            <form action="/cars" method="GET" class="flex gap-2 w-full md:w-auto">
                <input type="text" name="search" placeholder="Buscar por marca o modelo..." 
                       value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                       class="px-4 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm w-64">
                <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white font-medium text-sm rounded-lg shadow-sm transition">
                    Buscar
                </button>
            </form>

            <?php if (\App\Core\Session::get('user_id')): ?>
                <a href="/cars/create" class="hidden sm:flex px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium text-sm rounded-lg shadow-sm transition items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Añadir
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Grid de Vehículos -->
    <?php if (!empty($cars)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($cars as $car): ?>
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">
                    <!-- Imagen del coche -->
                    <div class="relative h-48 bg-slate-100 overflow-hidden">
                        <?php if (!empty($car['photo'])): ?>
                            <img src="<?= htmlspecialchars($car['photo']) ?>" alt="<?= htmlspecialchars($car['marca']) ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-slate-400 font-medium">Sin Imagen</div>
                        <?php endif; ?>
                        <span class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-md text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <?= htmlspecialchars($car['year']) ?>
                        </span>
                    </div>

                    <!-- Datos del coche -->
                    <div class="p-5 flex flex-col flex-grow">
                        <h2 class="text-xl font-bold text-slate-900">
                            <?= htmlspecialchars($car['marca']) ?> 
                            <span class="font-normal text-slate-600"><?= htmlspecialchars($car['model']) ?></span>
                        </h2>

                        <!-- Botones de Acción -->
                        <div class="mt-auto pt-5 flex items-center justify-between border-t border-slate-100 gap-2">
                            <a href="/cars/show?id=<?= $car['id'] ?>" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold transition flex items-center gap-1">
                                Ver detalle &rarr;
                            </a>

                            <?php if (\App\Core\Session::get('user_id')): ?>
                                <div class="flex items-center gap-1.5">
                                    <a href="/cars/edit?id=<?= $car['id'] ?>" class="px-3 py-1.5 bg-amber-500/10 hover:bg-amber-500/20 text-amber-700 rounded-md text-xs font-semibold transition">
                                        Editar
                                    </a>
                                    <form action="/cars/delete" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este coche?');">
                                        <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                        <button type="submit" class="px-3 py-1.5 bg-rose-500/10 hover:bg-rose-500/20 text-rose-700 rounded-md text-xs font-semibold transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <h3 class="text-lg font-semibold text-slate-800">No hay coches registrados</h3>
            <p class="text-sm text-slate-500 mt-1">Intenta realizar otra búsqueda o registra un nuevo coche.</p>
        </div>
    <?php endif; ?>
</main>