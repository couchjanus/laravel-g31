<?php

namespace App\Livewire\Admin\Products;

// use Livewire\Component;
use App\Models\Product;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductTable extends DataTableComponent
{

    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Name', 'name')
                ->sortable(),
        ];
    }

    // public function render()
    // {
    //     return view('livewire.admin.products.product-table');
    // }
}
