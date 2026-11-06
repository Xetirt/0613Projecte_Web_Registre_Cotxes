<nav class="bg-slate-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-2 font-bold text-xl text-indigo-400 hover:text-indigo-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
                <span>AutoRegistry</span>
            </a>

            <!-- Navigation Links -->
            <div class="flex items-center gap-4">
                <a href="/" class="text-slate-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">Catálogo</a>
                
                <?php if (\App\Core\Session::get('user_id')): ?>
                    <a href="/cars/create" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                        + Nuevo Coche
                    </a>
                    <div class="h-4 w-px bg-slate-700"></div>
                    <span class="text-xs text-slate-400 font-medium"><?= htmlspecialchars(\App\Core\Session::get('user_email')) ?></span>
                    <a href="/logout" class="bg-rose-600/80 hover:bg-rose-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                        Cerrar Sesión
                    </a>
                <?php else: ?>
                    <a href="/login" class="text-slate-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition">Iniciar Sesión</a>
                    <a href="/register" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                        Registrarse
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>