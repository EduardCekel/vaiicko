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
        if ($_SESSION['user'] == "cekel1@stud.uniza.sk")
        {
            return $this->html(['data' => User::getAll()]);
        }
        return $this->redirect("?c=home&a=index");
    }

     /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function profil(): Response
    {
        return $this->html();
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

    /**
    * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
    * @throws \Exception
    */
    public function zmenaHesla()
    {
        $_SESSION['heslo'] = "1";
        return $this->redirect("?c=users&a=profil");
    }

    /**
    * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
    * @throws \Exception
    */
    public function potvrdZmenuHesla(): Response
    {
        $data = null;
        $formData = $this->app->getRequest()->getPost();
        if ($formData['heslo'] != $formData['heslo2'])
        {
            $data = ['message' => 'Hesla sa nezdhoduju!'];
            return $this->html($data, "profil");
        }    
        $user = User::getAll('email = ?', [$_SESSION['user']]);
        $user[0]->setHeslo(password_hash( $formData['heslo'], PASSWORD_DEFAULT));
        $user[0]->save();
        return $this->html($data,"profil");
    }
    

    /**
    * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
    * @throws \Exception
    */
    public function zmenaAdresy()
    {
        $_SESSION['adresa'] = "1";
        return $this->redirect("?c=users&a=profil");
    }

    /**
    * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
    * @throws \Exception
    */
    public function potvrdZmenuAdresy()
    {
        unset($_SESSION['adresa']);
        $formData = $this->app->getRequest()->getPost();
        $user = User::getAll('email = ?', [$_SESSION['user']]);
        $loc = new Location();
        $loc->setId_user($user[0]->getId());
        $loc->setAdresa($formData['adresa']);
        $loc->setMesto($formData['mesto']);
        $loc->setPsc($formData['psc']);
        $loc->setTel($formData['tel']);
        $loc->save();
        return $this->redirect("?c=users&a=profil");
    } 

}