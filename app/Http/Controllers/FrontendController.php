<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

class FrontendController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data['site-title'] = 'Frontend';
    }
}
