<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\AdminAuthConfig\Controllers;

use App\Controllers\Admin\BaseController;

class LoginController extends BaseController
{
    protected $helpers = ['auth'];

    protected $rules = [
        'login' => [
            'label' => 'Admin.Login',
            'rules' => 'required|max_length[255]|admin_auth_config_login[1]'
        ],
        'password' => [
            'label' => 'Admin.Password',
            'rules' => 'required|max_length[255]|admin_auth_config_password[admin_login]'
        ],
        'remember_me' => [
            'label' => 'Admin.Remember Me',
            'rules' => 'permit_empty|in_list[1]'
        ]
    ];

    public function index()
    {
        if ($this->request->is('post'))
        {
            if ($this->validateData($this->request->getPost(), $this->rules)) 
            {
                $validData = $this->validator->getValidated();

                auth_login(
                    $validData['login'], 
                    (bool) ($validData['remember_me'] ?? 0),
                    'admin'
                );

                return redirect()->to(site_url('admin'))->withCookies();
            }
            else
            {
                $errors = $this->validator->getErrors();
            }
        }

        return view('BasicApp\AdminAuthConfig\login', [
            'errors' => $errors ?? [],
            'labels' => array_map(function($value) {
                return lang($value['label']);
            }, $this->rules)
        ]);
    }
}
