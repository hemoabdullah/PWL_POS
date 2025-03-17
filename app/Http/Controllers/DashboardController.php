<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $metadata = [
            'pageTitle' => 'Hammam Dashboard',
            'breadcrumbs' => [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard'
                ]
            ]
        ];

        return view('dashboard', compact('metadata'));
    }
}
