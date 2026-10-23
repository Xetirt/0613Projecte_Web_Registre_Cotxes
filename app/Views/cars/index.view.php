<?php require __DIR__ . '/../pages/partials/header.view.php'; ?>

<div class="max-w-5xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Llistat de Cotxes</h1>
        <?php if (\App\Core\Session::get('user_id')): ?>
            <a href="/cars/create" class="bg-green-600 text-white px-4 py-2 rounded">Afegir Cotxe</a>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($cars as $car): ?>
            <div class="bg-white p-4 rounded shadow">
                <img src="<?= htmlspecialchars($car['photo']) ?>" alt="Foto" class="w-full h-40 object-cover rounded">
                <h2 class="text-xl font-semibold mt-2"><?= htmlspecialchars($car['marca']) ?> <?= htmlspecialchars($car['model']) ?></h2>
                <p class="text-gray-600">Any: <?= htmlspecialchars($car['year']) ?></p>
                
                <div class="mt-4 flex justify-between items-center">
                    <a href="/cars/show?id=<?= $car['id'] ?>" class="text-blue-600 font-semibold">Veure Detalls</a>

                    <?php if (\App\Core\Session::get('user_id')): ?>
                        <div class="flex gap-2">
                            <a href="/cars/edit?id=<?= $car['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 text-sm rounded">Editar</a>
                            <form action="/cars/delete" method="POST" onsubmit="return confirm('Segur?')">
                                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                                <button type="submit" class="bg-red-600 text-white px-2 py-1 text-sm rounded">Eliminar</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>