<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('tendencias_actuales/tendencias_actuales_page');
    }
}
