<?php

namespace App\Controllers;
use App\Models\ArticulosModel;

class Home extends BaseController
{

    protected $articulosModel;

    public function __construct()
    {
        $this->articulosModel = new ArticulosModel();
    }

    public function index(): string
    {
        $data['articulos'] = $this->articulosModel->findAll();
        return view('tendencias_actuales/tendencias_actuales_page', $data);
    }

    public function tendenciaActual($id)
    {
        $articulo = $this->articulosModel->find($id);

        if (!empty($articulo['schedule_date'])) {
            $articulo['schedule_date'] = date('Y-m-d', strtotime($articulo['schedule_date']));
        }

        $data['articulo'] = $articulo;
        return view('tendencias_actuales/tendencias_actuales_content', $data);
    }
}
