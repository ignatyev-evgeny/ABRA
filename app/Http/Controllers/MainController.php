<?php

namespace App\Http\Controllers;

class MainController extends Controller {

    public function index() {
        return view('main');
    }

    public function singin() {
        return view('authorization.singin');
    }

    public function singup() {
        return view('authorization.signup');
    }
}
