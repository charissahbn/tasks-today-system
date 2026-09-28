<?php

namespace App\Controllers;
use App\Models\UserModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
      $userModel = new UserModel();

     $data['title'] = 'User Profile';
     $data['user'] = $userModel->first();

     return view('profile/index', $data);
    }
}
