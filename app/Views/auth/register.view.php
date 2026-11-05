<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>
<?php require __DIR__ . '/../pages/partials/nav.view.php'; ?>

<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Crear Compte</h2>
    <form action="/register" method="POST">
    <input type="text" name="name" placeholder="Tu nombre" required>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>
</div>