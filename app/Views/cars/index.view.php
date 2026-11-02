<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>

<div class="max-w-5xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Llistat de Cotxes</h1>
        <?php if (\App\Core\Session::get('user_id')): ?>
            <a href="/cars/create" class="bg-green-600 text-white px-4 py-2 rounded">Afegir Cotxe</a>
        <?php endif; ?>
    </div>

    <!-- Barra de Búsqueda y Filtros -->
<div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
    <form action="/cars" method="GET" class="w-full md:w-1/2 flex gap-2">
        <input type="text" name="search" placeholder="Buscar por marca, modelo o matrícula..." 
               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        <button type="submit" class="px-5 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
            Buscar
        </button>
    </form>
    
    <a href="/cars/create" class="px-5 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-2z" clip-rule="evenodd" />
        </svg>
        Registrar Coche
    </a>
</div>

    
</div>