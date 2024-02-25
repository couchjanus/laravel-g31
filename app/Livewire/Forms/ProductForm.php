<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

use App\Models\Product;

class ProductForm extends Form
{
    public ?Product $product;

    public $name;
    public $price;
    public $description;
    public $status = 1;
    public $category_id;
    public $brand_id;
    public $cover = 'test.jpg';

    public function store()
    {
        Product::create($this->all());
    }

}
