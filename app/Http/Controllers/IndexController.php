<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Function to return the main application home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }
}
