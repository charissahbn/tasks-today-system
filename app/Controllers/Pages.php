<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pages extends BaseController
{
    public function index()
    {
        //
    }

     public function about()
    {
        $data['title'] = 'About';

        return view('pages/about', $data);
    }
}
