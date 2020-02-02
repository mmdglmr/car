<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class CarPicture extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'car_pictures';
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

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
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
