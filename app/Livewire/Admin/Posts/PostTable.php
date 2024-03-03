<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

class PostTable extends PowerGridComponent
{
    public function datasource():Builder
    {
        return Post::query();
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
            ->add('title')
            ->add('created_at_formatted', function ($post) {
                return Carbon::parse($post->created_at)
                    ->timezone('Europe/Kyiv')->format('d/m/Y');
            });
    }


    public function columns(): array
    {
        return [

            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Title', 'title')
                ->bodyAttribute('!text-wrap')
                ->searchable()
                ->sortable(),



            Column::make('Created At', 'created_at_formatted'),
            Column::action('Action'),
        ];
    }


    public function actions(Post $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('inline-flex focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900')
                ->route('admin.posts.edit', ['post' => $row->id]),
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



    #[\Livewire\Attributes\On('del')]
    public function del(int $rowId): void
    {

        Post::destroy($rowId);
    }

    #[\Livewire\Attributes\On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if (count($this->checkboxValues) == 0) {
            return;
        }
        Post::destroy($this->checkboxValues);

    }

    #[\Livewire\Attributes\On('bulkRestore.{tableName}')]
    public function bulkRestore(): void
    {
        if (count($this->checkboxValues) !== 0) {
            Post::onlyTrashed()
            ->whereIn('id', $this->checkboxValues)->restore();
        }

        return;
    }
}
