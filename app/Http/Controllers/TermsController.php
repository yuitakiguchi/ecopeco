<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{

    public function item()
    {
        return view('terms.item');
    }

    public function privacy()
    {
        return view('terms.privacy');
    }
}
