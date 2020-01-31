<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarPartRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

class CarPartCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation { store as traitStore; }
    use UpdateOperation { update as traitUpdate; }
    use DeleteOperation;

    public function setup()
    {

        $this->crud->setModel('App\Models\CarPart');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/carpart');
        $this->crud->setEntityNameStrings( __('cruds.CarPart'), __('cruds.CarParts'));

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
                'label' => __('cruds.CarPartType'),
                'type' => "select",
                'name' => 'car_part_type_id',
                'orderable' => true,
                'entity' => 'CarPartType',
                'attribute' => "name",
                'model' => "App\Models\CarPartType",
            ],
            [
                'label' => __('db.image'),
                'name' => 'picture',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CarPartRequest::class);
        $this->crud->addFields($this->getFields());
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function getFields()
    {
        return [
            'car_part_type_id' => [
                'label' => __('cruds.CarPartType'),
                'type' => 'select2',
                'name' => 'car_part_type_id',
                'entity' => 'CarPartType',
                'attribute' => 'name',
                'model' => "App\Models\CarPartType",
                'attributes' => [
                    'required' => 'required',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12',
                ],
            ],
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
