<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function petugasIndex(){
        return view('pages.petugas.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
