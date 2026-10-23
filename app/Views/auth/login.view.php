<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Iniciar Sessió</h2>
    <form action="/login/process" method="POST" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" required class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Contrasenya</label>
            <input type="password" name="password" required class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold">Entrar</button>
    </form>
</div>