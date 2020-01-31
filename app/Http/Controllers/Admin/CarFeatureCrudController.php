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
        $this->crud->setEntityNameStrings('carfeature', 'car_features');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
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
                'engine_volume' => [
                    'label' => 'حجم موتور',
                    'name' => 'engine_volume',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'engine_power' => [
                    'label' => 'قدرت موتور',
                    'name' => 'engine_power',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'number_of_cylinders' => [
                    'label' => 'تعداد سیلندر',
                    'name' => 'number_of_cylinders',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'number_of_valves' => [
                    'label' => 'تعداد سوپاپ',
                    'name' => 'number_of_valves',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'torque' => [
                    'label' => 'گشتاور',
                    'name' => 'torque',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'acceleration' => [
                    'label' => 'شتاب',
                    'name' => 'acceleration',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'max_speed' => [
                    'label' => 'حداکثر سرعت',
                    'name' => 'max_speed',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'gearbox' => [
                    'label' => 'گیربکس',
                    'name' => 'gearbox',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'differential' => [
                    'label' => 'دیفرانسیل',
                    'name' => 'differential',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'car_dimensions' => [
                    'label' => 'ابعاد خودرو',
                    'name' => 'car_dimensions',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'axis_spacing' => [
                    'label' => 'فاصله محور',
                    'name' => 'axis_spacing',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'fuel_consumption' => [
                    'label' => 'مصرف سوخت',
                    'name' => 'fuel_consumption',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'fuel_tank_capacity' => [
                    'label' => 'حجم باک',
                    'name' => 'fuel_tank_capacity',
                    'type' => 'text',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'safety' => [
                    'name' => 'safety',
                    'type' => 'textarea',
                    'label' => 'امنیبت',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                'options' => [
                    'name' => 'options',
                    'type' => 'textarea',
                    'label' => 'امکانات',
                    'wrapperAttributes' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
            ];
    }
}
