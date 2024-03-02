<?php

namespace App\Livewire\Admin\Products;


use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

class ProductTable extends PowerGridComponent
{

    // public string $tableName = 'products';

    // protected $model = Product::class;

    public function datasource():Builder
    {
        return Product::query();
    }

    public function setUp(): array
    {
        return [
            Header::make()
                ->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }
    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('price')
            ->add('created_at_formatted', function ($product) {
                return Carbon::parse($product->created_at)
                    ->timezone('Europe/Kyiv')->format('d/m/Y');
            });
    }


    public function columns(): array
    {
        return [

            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->bodyAttribute('!text-wrap')
                ->searchable()
                ->sortable(),

            Column::make('Price', 'price')
                ->searchable()
                ->sortable(),


            Column::make('Created At', 'created_at_formatted'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit(int $dishId): void
    {
        $this->js('alert('.$dishId.')');
    }

}
