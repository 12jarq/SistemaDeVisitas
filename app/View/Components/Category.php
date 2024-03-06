<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Category extends Component
{
    public $categories;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.category');
    }
}
