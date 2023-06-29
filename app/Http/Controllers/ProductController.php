<?php

namespace App\Http\Controllers;

class ProductController extends Controller {

    /** List all products in auth area */
    public function list() {
        return view('cabinet.product.list');
    }
}
