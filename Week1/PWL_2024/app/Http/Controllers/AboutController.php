<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   
    public function __invoke(Request $request)
    {
        return "Nama    : Putera Bhagaswara R,
                NIM     : 2341760136";
    }
}
