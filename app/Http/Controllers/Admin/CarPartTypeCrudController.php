<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarPartTypeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

class CarPartTypeCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation { store as traitStore; }
    use UpdateOperation { update as traitUpdate; }
    use DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\CarPartType');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/carparttype');
        $this->crud->setEntityNameStrings( __('cruds.CarPartType'), __('cruds.CarPartTypes'));
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'label' => __('db.name'),
                'name' => 'name',
                'type' => 'text',
            ],
            [
                'label' => __('db.image'),
                'name' => 'picture',
                'type' => 'text',
            ],
            [
                'label' => __('db.description'),
                'name' => 'description',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CarPartTypeRequest::class);
        $this->crud->addFields($this->getFields());
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function getFields()
    {
        return [
            'name' => [
                'label' => __('db.name'),
                'name' => 'name',
                'type' => 'text',
                'attributes' => [
                        'required' => 'required',
                ],
            ],
            'picture' => [
                'label' => __('db.picture'),
                'name' => 'picture',
                'type' => 'upload',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12',
                ],
            ],
            'description' => [
                'label' => __('db.description'),
                'name' => 'description',
                'type' => 'textarea',
            ],
        ];
    }
}
