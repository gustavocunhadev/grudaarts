<?php

namespace Grudaarts\Mvc\Entity;

class Product
{
    public readonly int $id;
    public readonly string $name;

    public readonly string $description;

    private string $price;

    private string $category;

    private int $qntStock;

    public function __construct(
        string $name,
        string $description,
        string $price,
        string $category,
        int $qntStock
    ){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->qntStock = $qntStock;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getQntStock(): int
    {
        return $this->qntStock;
    }

    public function setQntStock(int $qntStock): void
    {
        $this->qntStock = $qntStock;
    }

    public function increaseStock(int $quantity): void
    {
        $this->qntStock += $quantity;       
    }

    public function decreaseStock(int $quantity): void
    {
        if( $this->qntStock > $quantity ) {
            $this->qntStock -= $quantity;
        }else{
            echo "Quantidade a subtrair ultrapassa quantidade atual";
        }
    }


}