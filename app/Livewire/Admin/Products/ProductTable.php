<?php

namespace App\Livewire\Admin\Products;


use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Button;
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
        $this->showCheckBox();
        return [
            Header::make()
                ->showSearchInput()
                ->showSoftDeletes(),

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
            ->add('category', fn(Product $product) => $product->category->name)
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

            Column::make('Category', 'category', 'category_id')

                ->searchable()
                ->sortable(),

            Column::make('Price', 'price')
                ->searchable()
                ->sortable(),


            Column::make('Created At', 'created_at_formatted'),
            Column::action('Action'),
        ];
    }


    public function actions(Product $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('inline-flex focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900')
                ->route('admin.products.edit', ['product' => $row->id]),
            Button::add('del')
                ->slot('Delete')
                ->class('inline-flex focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900')
                ->dispatch('del', ['rowId' => $row->id]),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot(__('Bulk delete (<span x-text="window.pgBulkActions.count(\''.$this->tableName.'\')"></span>)'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('bulkDelete.'.$this->tableName, []),
                Button::add('bulk-restore')
                ->slot(__('Bulk restore (<span x-text="window.pgBulkActions.count(\''.$this->tableName.'\')"></span>)'))
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('bulkRestore.'.$this->tableName, []),
        ];
    }

    // #[\Livewire\Attributes\On('delete.{tableName}')]
    // public function delete(): void
    // {
    //     if (count($this->checkboxValues) == 0) {
    //         return;
    //     }
    //     Product::destroy($this->checkboxValues);
    //     // $this->reset();
    // }

    #[\Livewire\Attributes\On('del')]
    public function del(int $rowId): void
    {
        // $this->js('window.alert('.$rowId.')');
        Product::destroy($rowId);
    }

    #[\Livewire\Attributes\On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if (count($this->checkboxValues) == 0) {
            return;
        }
        Product::destroy($this->checkboxValues);
        // $this->reset();
    }

    #[\Livewire\Attributes\On('bulkRestore.{tableName}')]
    public function bulkRestore(): void
    {
        if (count($this->checkboxValues) !== 0) {
            Product::onlyTrashed()
            ->whereIn('id', $this->checkboxValues)->restore();
        }
        // $this->reset();
        return;
    }

}
