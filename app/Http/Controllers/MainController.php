<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
      public function main()
      {
        return redirect(to: 'dashboard');
      }

     public function dashboard(){

        return view(view:'dashboard')->with([
            'applications'=> Application::paginate(4)
        ]);
     }
}
