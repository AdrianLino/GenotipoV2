<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ArticulosModel;

class ArticulosController extends BaseController
{
    protected $articulosModel;

    public function __construct()
    {
        $this->articulosModel = new ArticulosModel();
    }

    public function index()
    {
        $data['articulos'] = $this->articulosModel->findAll();
        return view('articulos/index', $data);
    }

    public function nuevo()
    {
        return view('articulos/nuevo');
    }

    public function guardar()
    {
        $validationRule = [
            'image' => [
                'rules' => 'uploaded[image]',
                'errors' => [
                    'uploaded' => 'Debe seleccionar una image.',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {

            $extension = $file->getClientExtension();

            $newName = date('dmY') . '_' . $file->getName();
            $file->move(FCPATH . 'storage', $newName);

            $data = [
                'meta_title' => $this->request->getVar('meta_title'),
                'meta_description' => $this->request->getVar('meta_description'),
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'image' => $newName,
                'content' => $this->request->getVar('content'),
                'schedule_date' => $this->request->getVar('schedule_date'),
            ];
        } else {
            $data = [
                'meta_title' => $this->request->getVar('meta_title'),
                'meta_description' => $this->request->getVar('meta_description'),
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'content' => $this->request->getVar('content'),
                'schedule_date' => $this->request->getVar('schedule_date'),
            ];
        }

        $this->articulosModel->save($data);
        return redirect()->to('/articulos');
    }

    public function editar($id)
    {
        $articulo = $this->articulosModel->find($id);

        if (!empty($articulo['schedule_date'])) {
            $articulo['schedule_date'] = date('Y-m-d', strtotime($articulo['schedule_date']));
        }

        $data['articulo'] = $articulo;
        return view('articulos/editar', $data);
    }

    public function actualizar()
    {
        $id = $this->request->getVar('id');
        $articuloExistente = $this->articulosModel->find($id);

        $data = [
            'meta_title' => $this->request->getVar('meta_title'),
            'meta_description' => $this->request->getVar('meta_description'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'content' => $this->request->getVar('content'),
            'schedule_date' => $this->request->getVar('schedule_date'),
        ];

        $file = $this->request->getFile('image');
        if ($file !== null && $file->isValid() && !$file->hasMoved()) {

            if (!empty($articuloExistente['image'])) {
                $rutaimageAnterior = FCPATH . 'storage/' . $articuloExistente['image'];
                if (file_exists($rutaimageAnterior)) {
                    unlink($rutaimageAnterior);
                }
            }

            // Procesa la nueva image
            $newName = date('dmY') . '_' . $file->getName();
            $file->move(FCPATH . 'storage', $newName);
            $data['image'] = $newName;
        }

        $this->articulosModel->update($id, $data);
        return redirect()->to('/articulos');
    }

    public function eliminar($id)
    {
        $articulo = $this->articulosModel->find($id);

        if ($articulo) {
            $imagePath = FCPATH . 'storage/' . $articulo['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $this->articulosModel->delete($id);

            return redirect()->to('/articulos')->with('message', 'Articulo eliminado correctamente');
        } else {
            return redirect()->to('/articulos')->with('error', 'El articulo no se encuentra');
        }
    }
}
