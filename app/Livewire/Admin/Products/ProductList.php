<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};


#[Title('Product List')]
#[Layout('layouts.admin')]
class ProductList extends Component
{
    public function render()
    {
        return view('livewire.admin.products.product-list');
    }
}
