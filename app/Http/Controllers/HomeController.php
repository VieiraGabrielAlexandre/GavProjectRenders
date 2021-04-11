<?php

namespace App\Http\Controllers;

use App\Models\ClientData;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function index(Request $request){
        $client = ClientData::where('id', 1)->first();
        
        return Inertia::render('Home', [
            'name' => $client->first_name,
        ]);
    }
}
