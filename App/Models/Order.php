<?php

namespace App\Models;

use App\Core\Model;


class Order extends Model
{
    protected ?int $id = 0;
    protected ?int $id_user = 0;
    protected ?string $datum = "";
    protected ?int $product = 0;
    protected ?int $sizes = 0;

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
    /////
    /**
     * @return string|null
     */
    public function getDatum(): ?string
    {
        return $this->datum;
    }

    /**
     * @param string|null $datum
     */
    public function setDatum(?string $datum): void
    {
        $this->datum = $datum;
    }
    /////
    /**
     * @return int|null
     */
    public function getProduct(): ?int
    {
        return $this->product;
    }

    /**
     * @param int|null $product
     */
    public function setProduct(?int $product): void
    {
        $this->product = $product;
    }
    //
    /**
     * @return int|null
     */
    public function getSizes(): ?int
    {
        return $this->sizes;
    }

    /**
     * @param int|null $sizes
     */
    public function setSizes(?int $sizes): void
    {
        $this->sizes = $sizes;
    }


}