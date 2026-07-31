# API de productos

Esta API permite listar, crear, actualizar y eliminar productos desde una aplicación CodeIgniter 4.

## URL base

Si estás ejecutando el proyecto con Docker Compose, la API queda disponible en:

- http://localhost:8080/api/productos

## Endpoints

### 1. Listar productos

- Método: GET
- Ruta: /api/productos

Ejemplo:

```bash
curl http://localhost:8080/api/productos
```

### 2. Ver un producto por ID

- Método: GET
- Ruta: /api/productos/{id}

Ejemplo:

```bash
curl http://localhost:8080/api/productos/1
```

### 3. Crear un producto

- Método: POST
- Ruta: /api/productos
- Header: Content-Type: application/json

Ejemplo:

```bash
curl -X POST http://localhost:8080/api/productos \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Mesa","precio":150000}'
```

También puedes enviar un arreglo de productos:

```bash
curl -X POST http://localhost:8080/api/productos \
  -H "Content-Type: application/json" \
  -d '[{"nombre":"Silla","precio":50000},{"nombre":"Lámpara","precio":80000}]'
```

### 4. Actualizar un producto

- Método: PUT
- Ruta: /api/productos/{id}
- Header: Content-Type: application/json

Ejemplo:

```bash
curl -X PUT http://localhost:8080/api/productos/1 \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Mesa actualizada","precio":180000}'
```

### 5. Eliminar un producto

- Método: DELETE
- Ruta: /api/productos/{id}

Ejemplo:

```bash
curl -X DELETE http://localhost:8080/api/productos/1
```

## Formato de datos

Los productos esperan estos campos:

- nombre: string
- precio: number

Ejemplo de cuerpo JSON:

```json
{
  "nombre": "Producto de ejemplo",
  "precio": 25000
}
```

## Respuestas esperadas

- Listar y consultar: devuelve un JSON con los datos del producto o productos.
- Crear y actualizar: devuelve un mensaje de éxito.
- Eliminar: devuelve un mensaje de confirmación.

## Uso en Postman

1. Abre Postman.
2. Crea una nueva solicitud.
3. Selecciona el método HTTP correspondiente.
4. Ingresa la URL, por ejemplo: http://localhost:8080/api/productos.
5. Si es POST o PUT, agrega el header `Content-Type: application/json` y el cuerpo JSON.
