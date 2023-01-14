<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;
use App\Models\Post;


class UsersController extends AControllerBase
{

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => User::getAll()
        ]);
    }

    public function login()
    {
        $post = User::getOne($this->request()->getValue('id'));
        return $this->redirect("?c=auth&a=logout");
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function delete()
    {

        $post = User::getOne($this->request()->getValue('id'));
        $post->delete();

        return $this->redirect("?c=users");
    }


}