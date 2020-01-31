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
use App\Enums\CarBuilderCompanyType;
use App\Enums\CarBodyClassType;

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
        $this->crud->setEntityNameStrings('car', 'cars');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
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
        $this->crud->addField('car_features_id');
        $this->crud->request->request->set('car_features_id', 1);
        $this->crud->unsetValidation();
        $redirect_location = $this->traitStore();
        return $redirect_location;
    }

    protected function getFields()
    {
        return [
            'builder_company' => [
                'name' => 'builder_company',
                'label' => "کمپانی سازنده",
                'type' => 'select2_from_array',
                'options' => CarBuilderCompanyType::getkeys(),
                'allows_null' => false,
                'attributes' => [
                    'required' => 'required',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'body_class' => [
                'name' => 'body_class',
                'label' => "کلاس بدنه",
                'type' => 'select2_from_array',
                'options' => CarBodyClassType::getkeys(),
                'allows_null' => false,
                'attributes' => [
                    'required' => 'required',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'brand' => [
                'label' => 'کمپانی اصلی خودرو',
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
                'label' => 'مدل خودرو',
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
                'label' => 'تیپ خودرو',
                'name' => 'series',
                'type' => 'text',
                'attributes' => [
                    'placeholder' =>'برای ۲۰۶: تیپ۲- صندوقدار و ...',
                ],
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
            'description' => [
                'name' => 'description',
                'type' => 'textarea',
                'label' => 'توضیحات',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6',
                ],
            ],
        ];
    }
}
