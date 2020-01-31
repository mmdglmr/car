<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use App\Http\Requests\RuleRequest as StoreRequest;
use App\Http\Requests\RuleRequest as UpdateRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Enums\CarBuilderCompany;
use App\Enums\CarBodyClass;
use App\Models\CarPicture;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation { store as traitStore; }
    use UpdateOperation { update as traitUpdate; }
    use DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Car');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/car');
        $this->crud->setEntityNameStrings( __('cruds.Car'), __('cruds.Cars'));
    }

    protected function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'label' => __('db.builder_company'),
                'name' => 'carBuilderCompany',
                'type' => 'text',
            ],
            [
                'label' => __('db.brand'),
                'name' => 'brand',
                'type' => 'text',
            ],
            [
                'label' => __('db.model'),
                'name' => 'model',
                'type' => 'text',
            ],
            [
                'label' => __('db.series'),
                'name' => 'series',
                'type' => 'text',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->addFields($this->getFields());
        $this->crud->setValidation(CarRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function store()
    {
        $this->crud->request = $this->crud->validateRequest();
        $carPicture = $this->crud->request->picture;
        $this->crud->removeField('picture');
        $this->crud->unsetValidation();
        $redirect_location = $this->traitStore();
        CarPicture::firstOrCreate([
            'car_id' => $this->crud->entry->id,
            'primary' => 1,
            'picture' => $carPicture,
        ]);
        return $redirect_location;
    }

    protected function getFields()
    {
        return [
            'builder_company' => [
                'label' => __('db.builder_company'),
                'name' => 'builder_company',
                'type' => 'select2_from_array',
                'options' => CarBuilderCompany::getkeys(),
                'allows_null' => false,
                'attributes' => [
                    'required' => 'required',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'body_class' => [
                'label' => __('db.body_class'),
                'name' => 'body_class',
                'type' => 'select2_from_array',
                'options' => CarBodyClass::getkeys(),
                'allows_null' => false,
                'attributes' => [
                    'required' => 'required',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'brand' => [
                'label' => __('db.brand'),
                'name' => 'brand',
                'type' => 'text',
                'attributes' => [
                    'placeholder' => 'پژو-رنو ...',
                    'required' => 'required'
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'model' => [
                'label' => __('db.model'),
                'name' => 'model',
                'type' => 'text',
                'attributes' => [
                    'placeholder' =>'پارس - ۲۰۶ و ...',
                    'required' => 'required'
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'series' => [
                'label' => __('db.series'),
                'name' => 'series',
                'type' => 'text',
                'attributes' => [
                    'placeholder' =>'برای ۲۰۶: تیپ۲- صندوقدار و ...',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'picture' => [
                'label' => __('db.picture'),
                'name' => 'picture',
                'type' => 'upload',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
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
