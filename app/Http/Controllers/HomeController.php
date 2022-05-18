<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $allUsers = User::all();
        $bosses = User::where('boss_id', '=', NULL)->get();
        return view('index', [
            'bosses' => $bosses,
            'allusers' => $allUsers,
            
        ]);
    } 
   
    }