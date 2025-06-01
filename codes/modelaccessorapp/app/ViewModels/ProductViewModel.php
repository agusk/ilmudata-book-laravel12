<?php
namespace App\ViewModels;

class ProductViewModel
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->setName($name);
        $this->price = $price;
    }

    // Mutator: Convert name to uppercase
    public function setName(string $value): void
    {
        $this->name = strtoupper($value);
    }

    // Accessor: Get name
    public function getName(): string
    {
        return $this->name;
    }

    // Accessor: Format price as currency
    public function getFormattedPrice(): string
    {
        return '$' . number_format($this->price, 2);
    }
}
