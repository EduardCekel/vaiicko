<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;
use App\Models\Post;
use App\Models\Order;
use App\Models\Location;


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
        if ($_SESSION['user'] == "cekel1@stud.uniza.sk")
        {
            $user = User::getOne($this->request()->getValue('id'));
            $posts = Post::getAll("id_user = ?", [$user->getId()]);
            foreach($posts as $post)
            {
                $post->delete();
            }
            $orders = Order::getAll("id_user = ?", [$user->getId()]);
            foreach($orders as $order)
            {
                $order->delete();
            }
            $loc = Location::getAll("id_user = ?", [$user->getId()]);
            $loc[0]->delete();
            $user->delete();
        }
        return $this->redirect("?c=users");
    }


}