<?php include 'partials/header.view.php'; ?>
<?php include 'partials/nav.view.php'; ?>
<h1 class="h-8 text-3xl text-emerald-600"><?= $tittle ?></h1>
<hr>
<main class="container">
    <!-- Ojo: dd() detiene la ejecución. Si quieres mostrar el nombre del usuario, 
         sería mejor acceder a su propiedad/clave, por ejemplo: -->
    <h2><?= $user->name ?? $user['name'] ?? '' ?></h2>
</main>
</body>
</html>