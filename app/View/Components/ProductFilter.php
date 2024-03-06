<?php

namespace App\View\Components;

use App\Models\CategoryProduct;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\View\Component;

class ProductFilter extends Component
{
    private $products;
    public $categories;
    public $shop;

    /**
     * Create a new component instance.
     *
     * @param $shop
     * @param $products
     */
    public function __construct($shop, $products)
    {
        $shop = Shop::where('slug', $shop)->first();
        $this->shop     = $shop;
        $this->products = $products;
        $all_products               = $shop->products()->distinct('product_id')->get();
        $products_categories        = CategoryProduct::whereIn('product_id', $all_products->pluck('id'))->get()->pluck('category_id')->unique();
        $this->categories           = Category::whereIn('id', $products_categories)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-filter');
    }
}
