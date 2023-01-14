<?php

namespace App\Models;

use App\Core\Model;


class Order extends Model
{
    protected ?int $id = 0;
    protected ?int $id_user = 0;
    protected ?string $datum;
    protected ?string $product = "";
    protected ?string $sizes = "";

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
     * @return string|null
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * @param string|null $product
     */
    public function setProduct(?string $product): void
    {
        $this->product = $product;
    }
    //
    /**
     * @return string|null
     */
    public function getSizes(): ?string
    {
        return $this->sizes;
    }

    /**
     * @param string|null $sizes
     */
    public function setSizes(?string $sizes): void
    {
        $this->sizes = $sizes;
    }


}