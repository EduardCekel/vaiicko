<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            //$this->app->getAuth()->login();
            //return $this->redirect('?c=users&a=login');
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            //echo $formData['login'];
            //echo $formData['password'];
            if ($logged) {
                return $this->redirect('?c=home&a=index');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        //$data = ['message' => 'Zlý login alebo heslo!'];
        return $this->html($data);
    }

    public function registr(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $reg = null;
        $pass = true;
        $data = null;
        if (isset($formData['submit'])) {
            $reg = $this->app->getAuth()->registr($formData['email']);
            if ($formData['password'] != $formData['password2'])
            {
                $pass = false;
            }
            //echo $formData['login'];
            //echo $formData['password'];
            if (!$reg)
            {
                $data = ['message' => 'Používateľ s daným emailom už existuje!'];
            } elseif (!$pass) {
                $data = ['message' => 'Hesla sa nezhoduju!'];
            } else {
                $user = new User();
                $user->setMeno($formData['login']);
                $user->setPriezvisko($formData['lastName']);
                $user->setEmail($formData['email']);
                $user->setHeslo(password_hash($formData['password'], PASSWORD_DEFAULT));
                $user->save();
                return $this->redirect('?c=home&a=index');
                //echo $formData['login']," ",$formData['lastName']," ",$formData['email']," ",$formData['password']," ";
                //echo password_hash($formData['password'], PASSWORD_DEFAULT);
            }
        }
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect('?c=home');
    }
}