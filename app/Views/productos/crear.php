<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4 text-center text-success">➕ Crear Nuevo Producto</h2>
            
            <form action="/productos/guardar" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Mouse Logitech" required>
                </div>
                
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio ($):</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="0.00" required>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">💾 Guardar Producto</button>
                    <a href="/productos" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>