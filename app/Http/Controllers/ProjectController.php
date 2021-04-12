<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        session()->flash('flash.banner', 'Yay for free components!');
        session()->flash('flash.bannerStyle', 'danger');

        return view('projects.index');
    }
}
