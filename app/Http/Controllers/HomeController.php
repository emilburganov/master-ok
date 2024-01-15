<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $completedApplicationsCount = Application::query()->where('status_id', '3')->count();

        return view("home", compact(['completedApplicationsCount']));
    }
}
