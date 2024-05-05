<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use BladeUI\Icons\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index(): View|Factory
    {
        $drugs = Drug::get();

        return view('pages.user.home', compact('drugs'));
    }
}
