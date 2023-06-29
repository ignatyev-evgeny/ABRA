<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {

    /** Homepage index */
    public function index() {
        return view('main');
    }

    /** User basket */
    public function basket() {
        return view('basket');
    }

    /** Sign in page */
    public function singin() {
        return view('authorization.singin');
    }

    /** Sign up page */
    public function singup() {
        return view('authorization.signup');
    }

    /** Logout */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
