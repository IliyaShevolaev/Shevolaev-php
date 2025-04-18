<?php

abstract class Animal
{
    private $age;

    protected $name;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    abstract public function makeSound(): void;

    public function eat(): void
    {
        echo $this->name . ' is eating';
    }

    public function sleep(): void
    {
        echo $this->name . ' is sleeping';
    }
}

class Cat extends Animal
{
    public function makeSound(): void
    {
        echo 'Cat ' . $this->name . ' says:' . 'meow';
    }
}

class Dog extends Animal
{
    public function makeSound(): void
    {
        echo 'Dog ' . $this->name . ' says:' . 'whoof';
    }
}

class Bird extends Animal
{
    public function makeSound(): void
    {
        echo 'Bird ' . $this->name . ' says:' . 'chick-chirik';
    }
}

$animals = [
    new Cat('Myrzik', 3),
    new Dog('Sharik', 8),
    new Bird('Kesha', 1),
    new Cat('Barsik', 3),
    new Dog('Bobik', 8),
    new Bird('Gosha', 1),
];

foreach ($animals as $animal) {
    $animal->makeSound();
    echo '<br>';
    $animal->eat();
    echo '<br>';
    $animal->sleep();
    echo '<br><br>';
}
