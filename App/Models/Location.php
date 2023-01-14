<?php

namespace App\Models;

use App\Core\Model;


class Location extends Model
{
    protected ?int $id = 0;
    protected ?int $id_user = 0;
    protected ?string $mesto = "";
    protected ?string $adresa = "";
    protected ?int $psc = 0;
    protected ?int $tel = 0;

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
    ////
    /**
     * @return string|null
     */
    public function getMesto(): ?string
    {
        return $this->mesto;
    }

    /**
     * @param string|null $mesto
     */
    public function setMesto(?string $mesto): void
    {
        $this->mesto = $mesto;
    }
    ////
    /**
     * @return string|null
     */
    public function getAdresa(): ?string
    {
        return $this->adresa;
    }

    /**
     * @param string|null $adresa
     */
    public function setAdresa(?string $adresa): void
    {
        $this->adresa = $adresa;
    }
    ////
      /**
     * @return int|null
     */
    public function getPsc(): ?int
    {
        return $this->psc;
    }

    /**
     * @param int|null $psc
     */
    public function setPsc(?int $psc): void
    {
        $this->psc = $psc;
    }
     ////
      /**
     * @return int|null
     */
    public function getTel(): ?int
    {
        return $this->tel;
    }

    /**
     * @param int|null $tel
     */
    public function setTel(?int $tel): void
    {
        $this->tel = $tel;
    }

}
