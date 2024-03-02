<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use App\Models\Product;

class ProductForm extends Form
{
    use WithFileUploads;

    public ?Product $product;

    #[Validate('required|min:5')]
    public $name;
    #[Validate('required')]
    public $price;
    #[Validate('required|min:5')]
    public $description;
    #[Validate('required|integer')]
    public $status = 1;
    #[Validate('required|integer')]
    public $category_id;
    #[Validate('required|integer')]
    public $brand_id;
    // #[Validate('nullable|image|max:2048')]
    public $cover;
    public $oldCover;

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->status = $product->status;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->oldCover = $product->cover;
    }

    public function store()
    {
        $validated = $this->validate();
        // dd($validated);

        $this->cover = $this->cover->store('products', 'public');
        Product::create($this->all());
        session()->flash('success', 'Product Created Successfully!');
    }

    public function update()
    {
        $validated = $this->validate();

        if ($this->cover) {
            if($this->oldCover !== null && Storage::disk('public')->exists($this->oldCover)) {
                Storage::disk('public')->delete($this->oldCover);
            }
            $this->cover = $this->cover->store('products', 'public');
        } else {
            $this->cover = $this->oldCover;
        }
        $this->product->update($this->all());
        session()->flash('success', "Product updated successfully!");
        $this->reset();
    }

}
