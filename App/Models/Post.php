<?php

namespace App\Models;

use App\Core\Model;


class Post extends Model
{
    protected ?int $id = 0;
    protected ?int $id_user = 0;
    protected ?string $post = "";

      /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    //
      /**
     * @return int|null
     */
    public function getId_user(): ?int
    {
        return $this->id_user;
    }

    /**
     * @param int|null $id_user
     */
    public function setId_user(?int $id_user): void
    {
        $this->id_user = $id_user;
    }
    //

     /**
     * @return string|null
     */
    public function getPost(): ?string
    {
        return $this->post;
    }

    /**
     * @param string|null $post
     */
    public function setPost(?string $post): void
    {
        $this->post = $post;
    }

}