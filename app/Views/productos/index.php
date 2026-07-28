<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud  CodeIgniter</title>
    <!-- Esto es Bootstrap. Una sola línea trae todo el diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📦 Lista de Productos</h1>
            <a href="/productos/crear" class="btn btn-success">➕ Crear Nuevo Producto</a>
        </div>

        <table class="table table-hover table-striped bg-white shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><strong><?= $producto['nombre'] ?></strong></td>
                    <td>$<?= $producto['precio'] ?></td>
                    <td>
                        <a href="/productos/editar/<?= $producto['id'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <a href="/productos/eliminar/<?= $producto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">🗑️ Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>