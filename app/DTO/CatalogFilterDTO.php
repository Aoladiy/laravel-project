<?php

namespace App\DTO;

class CatalogFilterDTO
{
    private ?string $name = null;
    private ?int $lowest = null;
    private ?int $highest = null;
    private ?string $order_price = null;
    private ?string $order_model = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): CatalogFilterDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHighest(): ?int
    {
        return $this->highest;
    }

    /**
     * @param int|null $highest
     */
    public function setHighest(?int $highest): CatalogFilterDTO
    {
        $this->highest = $highest;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLowest(): ?int
    {
        return $this->lowest;
    }

    /**
     * @param int|null $lowest
     */
    public function setLowest(?int $lowest): CatalogFilterDTO
    {
        $this->lowest = $lowest;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderModel(): ?string
    {
        return $this->order_model;
    }

    /**
     * @param string|null $order_model
     */
    public function setOrderModel(?string $order_model): CatalogFilterDTO
    {
        if ($order_model !== null) {
            $order_model = $order_model === 'desc' ? 'desc' : 'asc';
        }
        $this->order_model = $order_model;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderPrice(): ?string
    {
        return $this->order_price;
    }

    /**
     * @param string|null $order_price
     */
    public function setOrderPrice(?string $order_price): CatalogFilterDTO
    {
        if ($order_price !== null) {
            $order_price = $order_price === 'desc' ? 'desc' : 'asc';
        }
        $this->order_price = $order_price;
        return $this;
    }
}
