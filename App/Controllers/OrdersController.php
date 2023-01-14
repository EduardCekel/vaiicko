<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class OrdersController extends AControllerBase
{
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html();
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function admin(): Response
    {
        return $this->html([
            'data' => Order::getAll()
        ]);
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function objednat(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $idU = User::getAll('email = ?', [$_SESSION['user']]);
        $order = new Order();
        $order->setId_user($idU[0]->getId());
        $order->setDatum(date("m.d.Y"));
        $order->setSizes($formData['kusy']);
        $order->setProduct($formData['vyberKrabice']);
        $order->save();
        return $this->redirect('?c=orders&a=index');
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function zobraz(): Response
    {
        $_SESSION['zobraz'] = $this->request()->getValue('id');
        return $this->redirect('?c=orders&a=admin');
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function skry(): Response
    {
        unset($_SESSION['zobraz']);
        return $this->redirect('?c=orders&a=admin');
    }

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function delete()
    {
        $post = Order::getOne($this->request()->getValue('id'));
        $post->delete();
        return $this->redirect("?c=orders&a=admin");
    }
    
}