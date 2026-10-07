<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
   public function login()
{
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/tasks');
    }

    $data = [
        'title'      => 'Login',
        'validation' => session('validation'),
    ];

    return view('auth/login', $data);
}
public function attemptLogin()
{
    $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $userModel = new UserModel();

    $user = $userModel
        ->where('username', $this->request->getPost('username'))
        ->first();

    if (
        $user === null ||
        ! password_verify(
            $this->request->getPost('password'),
            $user['password']
        )
    ) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    session()->regenerate(true);

    session()->set([
        'user_id'    => $user['id'],
        'username'   => $user['username'],
        'full_name'  => $user['full_name'],
        'isLoggedIn' => true,
    ]);

    return redirect()->to('/tasks');
}

public function logout()
{
    session()->destroy();

    return redirect()->to('/login');
}
}
