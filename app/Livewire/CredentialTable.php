<?php

namespace App\Livewire;

use App\Models\Credential;
use App\Models\Repertory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Themes\BigFonts;

final class CredentialTable extends PowerGridComponent
{
    public string $tableName = 'credential-table';
    public int $repertoryId;

//    public function customThemeClass(): ?string
//    {
//        return BigFonts::class;
//    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Credential::query()
                ->when($this->repertoryId, function (Builder $query) {
                    return $query->where('repertory_id', $this->repertoryId);
                });
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('img', function(){
                return '<img src="https://www.svgrepo.com/show/353985/laravel.svg" alt="image" width="25px" height="25px">';
            })
            ->add('name')
            ->add('value', function (Credential $credential) {
                return Str::limit($credential->value, 50);
            })
            ->add('tags_list', function (Credential $credential) {
                return $credential->getTagsList(true);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Image', 'img'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Value', 'value')
                ->sortable()
                ->searchable(),

            Column::make('Tags', 'tags_list')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Credential $credential): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="fas fa-edit"></i> Edit')
                ->id()
                ->route('credentials.edit', ['credential' => $credential->id]),

            Button::add('delete')
                ->slot('<i class="fas fa-trash"></i> Delete')
                ->id()
                ->class('text-red-500')
                ->route('credentials.delete', ['credential' => $credential->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
