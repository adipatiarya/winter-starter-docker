<?php namespace Winter\Market\Models;

use Model;

/**
 * Product Model
 */
class Product extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    public $table = 'winter_market_products';

    protected $fillable = ['name','slug','price', 'description'];
    public $rules = [
        'name'   => 'required',
        'slug'    => ['required', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i', 'unique'],
        'price' => ['required', 'numeric:'],
    ];
}
