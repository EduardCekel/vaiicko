<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected ?int $id = 0;
    protected ?string $meno = "";
    protected ?string $priezvisko = "";
    protected ?string $email = "";
    protected ?string $heslo = "";

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

     /**
     * @return string|null
     */
    public function getMeno(): ?string
    {
        return $this->meno;
    }

    /**
     * @param string|null $meno
     */
    public function setMeno(?string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string|null
     */
    public function getPriezvisko(): ?string
    {
        return $this->priezvisko;
    }

    /**
     * @param string|null $priezvisko
     */
    public function setPriezvisko(?string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getHeslo(): ?string
    {
        return $this->heslo;
    }

    /**
     * @param string|null $heslo
     */
    public function setHeslo(?string $heslo): void
    {
        $this->heslo = $heslo;
    }
}