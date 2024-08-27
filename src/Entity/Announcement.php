<?php

namespace Grudaarts\Mvc\Entity;

class Announcement
{

    private $idAnuncio;
    private $product;
    private $title;
    private $description;
    private $promocionalPrice;
    private $status;

    public function __construct(
        Product $product,
        string $title,
        string $description,
        string $promocionalPrice,
        bool $status
    ){
        $this->product = $product;
        $this->title = $title;
        $this->description = $description;
        $this->promocionalPrice = $promocionalPrice;
        $this->status = $status;  
    }

    public function getIdAnuncio(): int
    {
        return $this->idAnuncio;
    }    

    public function setIdAnuncio(int $id): void
    {
        $this->idAnuncio = (int) $id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPromocionalPrice(): string
    {
        return $this->promocionalPrice;
    }
    
    public function setPromocionalPrice(): void
    {
        $this->promocionaPrice = (string) $this->promocionalPrice;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}