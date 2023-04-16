<?php namespace Winter\Market\Components;
use App;
use Cms\Classes\ComponentBase;
use Winter\Market\Models\Product;

class Products extends ComponentBase
{
    /**
     * Gets the details for the component
     */
    public function componentDetails()
    {
        return [
            'name'  => 'Products Component',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function findAll() {

        return Product::all();
    }

    public function findOne($slug) {

        $product = Product::where('slug', $slug)->first();

        if (!$product) return \Response::make($this->controller->run('404'), 404);
        return $product;

        
    }
}
