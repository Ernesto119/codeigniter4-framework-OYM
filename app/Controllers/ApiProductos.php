<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiProductos extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\ProductoModel';
    protected $format    = 'json';

    // GET /api/productos (Listar todos)
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/productos/1 (Ver uno específico)
    public function show($id = null)
    {
        $data = $this->model->find($id);
        return $data ? $this->respond($data) : $this->failNotFound('Producto no encontrado');
    }

    // POST /api/productos (Crear uno nuevo)
  public function create()
{
    $input = $this->request->getJSON(); // Recibe el JSON

    // Si es un array (varios productos)
    if (is_array($input)) {
        $productosArray = (array) $input;
        if ($this->model->insertBatch($productosArray)) {
            return $this->respondCreated(['mensaje' => count($productosArray) . ' productos creados exitosamente']);
        }
    } 
    // Si es un solo objeto
    else {
        if ($this->model->save($input)) {
            return $this->respondCreated(['mensaje' => 'Producto creado exitosamente']);
        }
    }

    return $this->failValidationErrors($this->model->errors());
}

    // PUT /api/productos/1 (Actualizar)
    public function update($id = null)
    {
        $input = $this->request->getJSON();
        if ($this->model->update($id, $input)) {
            return $this->respond(['mensaje' => 'Producto actualizado']);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // DELETE /api/productos/1 (Eliminar)
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['mensaje' => 'Producto eliminado']);
        }
        return $this->failNotFound('Producto no encontrado');
    }
}