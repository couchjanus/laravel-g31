<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use Livewire\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\{Brand, Category};
use App\Livewire\Forms\ProductForm;

#[Title('Create Product')]
#[Layout('layouts.admin')]
class CreateProduct extends Component
{

    public $categories;
    public $brands;
    public $productStatus;

    public ProductForm $form;

    public function mount()
    {
        $this->productStatus = ProductStatus::options();
        $this->categories = Category::pluck('name', 'id');
        $this->brands = Brand::pluck('name', 'id');
    }
    public function save()
    {
        $this->form->store();
        return $this->redirect('/admin/products');
    }


    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
