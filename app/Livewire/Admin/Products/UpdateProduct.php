<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Enums\ProductStatus;

use Livewire\Attributes\{Layout, Title};
use App\Models\{Product, Brand, Category};
use App\Livewire\Forms\ProductForm;

use Livewire\WithFileUploads;

#[Title('Edit Product')]
#[Layout('layouts.admin')]
class UpdateProduct extends Component
{

    use WithFileUploads;

    public $categories;
    public $brands;
    public $productStatus;

    public ProductForm $form;

    public function mount(Product $product)
    {
        $this->form->setProduct($product);
        $this->productStatus = ProductStatus::options();
        $this->categories = Category::pluck('name', 'id');
        $this->brands = Brand::pluck('name', 'id');
    }

    public function save()
    {
        $this->form->update();
        return $this->redirect('/admin/products');
    }

    public function render()
    {
        return view('livewire.admin.products.update-product');
    }
}
