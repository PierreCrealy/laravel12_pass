<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public string $tableName = 'user-table-qypjwj-table';
    public string $country;

//    public function header():array
//    {
//        return [
//            Button::add('create-user')
//                ->slot('Add user')
//                ->route('users.create', [], '')
//                ->attributes([
//                    'id' => 'my-custom-id',
//                    'class' => 'another-class'
//                ]),
//        ];
//    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::exportable(fileName: 'users_export_file')
                ->type(Exportable::TYPE_CSV, Exportable::TYPE_XLS),
            PowerGrid::header()
                ->showSearchInput()
                ->showToggleColumns()
                ->showSoftDeletes(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query()->with('roles');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('roles_list', function(User $user){
                return $user->getRolesList(true);
            } )
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Roles', 'roles_list'),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable()
                ->visibleInExport(false),

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

    public function actions(User $user): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="fas fa-edit"></i> Edit')
                ->id()
                ->route('users.edit', ['user' => $user->id]),

            Button::add('delete')
                ->slot('<i class="fas fa-trash"></i> Delete')
                ->id()
                ->class('text-red-500')
                ->route('users.delete', ['user' => $user->id]),

        ];
    }


    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
//            Rule::button('edit')
//                ->when(fn($row) => $row->id === 1)
//                ->hide(),
        ];
    }

}
