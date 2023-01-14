<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Post;
use App\Models\User;

class PostsController extends AControllerBase
{
    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Post::getAll()
        ]);
    }

    public function delete()
    {
        $post = Post::getOne($this->request()->getValue('id'));
        $post->delete();

        return $this->redirect("?c=posts");
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function zobrazOkno()
    {
        $post = Post::getOne($this->request()->getValue('id'));
        $_SESSION['uprav'] = $post->getId();
        return $this->redirect("?c=posts");
    }

     /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function uprav()
    {
        $formData = $this->app->getRequest()->getPost();
        $post = Post::getOne($_SESSION['uprav']);
        $post->setPost($formData['namePost']);
        $post->save();
        unset($_SESSION['uprav']);
        return $this->redirect("?c=posts");
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function vloz()
    {
        $userHelp = User::getOne($this->request()->getValue('id'));
        $formData = $this->app->getRequest()->getPost();
        $post = new Post();
        $post->setPost($formData['postNew']);
        $post->setId_user($userHelp->getId());
        $post->save();
        return $this->redirect("?c=posts");
    }


}