<?php

namespace App\Http\Controllers;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index()
    {
        $eventData = AffairsFamily::conclusionTable();

        return view('commontask', [
            'data' => $eventData,
        ]);
    }
}
