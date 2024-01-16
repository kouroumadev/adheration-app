<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdhesionController extends Controller
{
    public function Adhesion(){

        return view('pages.adhesion');
    }
    public function AdhConfirmation(){

        return view('pages.confirmation-adhesion');
    }
}
