<nav class="bg-gray-800 text-white p-4">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
        <a href="/cars" class="font-bold text-xl">Registre Cotxes</a>
        <div class="space-x-4">
            <a href="/cars" class="hover:underline">Inici</a>
            <?php if (\App\Core\Session::get('user_id')): ?>
                <a href="/cars/create" class="hover:underline">Afegir Cotxe</a>
                <span class="text-gray-400">| <?= htmlspecialchars(\App\Core\Session::get('user_email')) ?></span>
                <a href="/logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Sortir</a>
            <?php else: ?>
                <a href="/login" class="hover:underline">Login</a>
                <a href="/register" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-sm">Registre</a>
            <?php endif; ?>
        </div>
    </div>
</nav>