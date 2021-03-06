<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'car_parts';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function carPartType()
    {
        return $this->belongsTo('App\Models\CarPartType');
    }

    public function cars()
    {
        return $this->belongsToMany('App\Models\Car', 'car_auto_part',  'car_part_id', 'car_id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPictureAttribute($image)
    {
        if ($image) {
            $path = '/uploads/products/'.$this->id.'/';
            if (!file_exists(public_path().$path)) {
                mkdir(public_path().$path, 0775, true);
            }
            $img = \Image::make($image->getRealPath());
            $img->resize(750, 450, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path().$path.$image->getClientOriginalName());
            $this->attributes['picture'] = $path.$image->getClientOriginalName();
        }
    }   
}
