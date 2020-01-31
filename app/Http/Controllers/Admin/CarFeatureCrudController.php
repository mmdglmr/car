<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarFeatureRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use App\Http\Requests\RuleRequest as StoreRequest;
use App\Http\Requests\RuleRequest as UpdateRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Car;

/**
 * Class CarFeatureCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarFeatureCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation { store as traitStore; }
    use UpdateOperation { update as traitUpdate; }
    use DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\CarFeature');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/carfeature');
        $this->crud->setEntityNameStrings(__('cruds.CarFeature'), __('cruds.CarFeature'));
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'label' => __('cruds.Car'),
                'type' => "select",
                'name' => 'car_id',
                'orderable' => false,
                'entity' => 'Car',
                'attribute' => "fullName",
                'model' => "App\Models\Car",
            ],
            [
                'label' => __('db.engine_volume'),
                'name' => 'engine_volume',
                'type' => 'text',
            ],
            [
                'label' =>  __('db.engine_power'),
                'name' => 'engine_power',
                'type' => 'text',
            ],
            [
                'label' => __('db.acceleration'),
                'name' => 'acceleration',
                'type' => 'text',
            ],
            [
                'label' => __('db.max_speed'),
                'name' => 'max_speed',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->addFields($this->getFields());
        $this->crud->setValidation(CarFeatureRequest::class);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


        protected function getFields()
        {
            return [
                'car_id' => [
                    'label' => __('cruds.Car'),
                    'name' => 'car_id',
                    'type' => 'select2_from_array',
                    'options' => Car::all()->pluck('fullName', 'id'),
                    'allows_null' => false,
                    'attributes' => [
                        'required' => 'required',
                    ],
                ],
                'engine_volume' => [
                    'label' => __('db.engine_volume'),
                    'name' => 'engine_volume',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'engine_power' => [
                    'label' =>  __('db.engine_power'),
                    'name' => 'engine_power',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'number_of_cylinders' => [
                    'label' => __('db.number_of_cylinders'),
                    'name' => 'number_of_cylinders',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'number_of_valves' => [
                    'label' => __('db.number_of_valves'),
                    'name' => 'number_of_valves',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'torque' => [
                    'label' => __('db.torque'),
                    'name' => 'torque',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'acceleration' => [
                    'label' => __('db.acceleration'),
                    'name' => 'acceleration',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'max_speed' => [
                    'label' => __('db.max_speed'),
                    'name' => 'max_speed',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'gearbox' => [
                    'label' => __('db.gearbox'),
                    'name' => 'gearbox',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'differential' => [
                    'label' => __('db.differential'),
                    'name' => 'differential',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'car_dimensions' => [
                    'label' => __('db.car_dimensions'),
                    'name' => 'car_dimensions',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'axis_spacing' => [
                    'label' => __('db.axis_spacing'),
                    'name' => 'axis_spacing',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'fuel_tank_capacity' => [
                    'label' => __('db.fuel_tank_capacity'),
                    'name' => 'fuel_tank_capacity',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'fuel_consumption' => [
                    'label' => __('db.fuel_consumption'),
                    'name' => 'fuel_consumption',
                    'type' => 'text',
                ],
                'safety' => [
                    'label' => __('db.safety'),
                    'name' => 'safety',
                    'type' => 'textarea',
                ],
                'options' => [
                    'label' => __('db.options'),
                    'name' => 'options',
                    'type' => 'textarea',
                ],
            ];
    }
}
