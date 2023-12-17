<?php
// Продукт, який будується
class Product {
private $parts = [];

public function addPart($part) {
$this->parts[] = $part;
}

public function show() {
echo "Product parts: " . implode(', ', $this->parts) . "\n";
}
}

// Абстрактний будівельник
interface Builder {
public function buildPart1();
public function buildPart2();
public function getResult(): Product;
}

// Конкретний будівельник
class ConcreteBuilder implements Builder {
private $product;

public function __construct() {
$this->product = new Product();
}

public function buildPart1() {
$this->product->addPart("Part 1");
}

public function buildPart2() {
$this->product->addPart("Part 2");
}

public function getResult(): Product {
return $this->product;
}
}

// Директор, який відповідає за порядок конструювання
class Director {
public function construct(Builder $builder) {
$builder->buildPart1();
$builder->buildPart2();
}
}

// Використання паттерна Будівельник
$builder = new ConcreteBuilder();
$director = new Director();

$director->construct($builder);
$product = $builder->getResult();
$product->show();
