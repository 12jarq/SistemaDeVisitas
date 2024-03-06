<?php

namespace App\View\Components;

use App\Models\Area;
use App\Models\Location;
use Illuminate\View\Component;

class SearchParams extends Component
{
    public $locations;
    public $areas;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->locations            = Location::orderBy('name', 'desc')->get();
        if (session()->has('location')) {
            $this->areas            = Area::where('location_id', session()->get('location'))->orderBy('name', 'desc')->get();
        } else {
            $this->areas            = Area::orderBy('name', 'desc')->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search-params');
    }
}
