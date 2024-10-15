<?php

namespace App\Http\Controllers;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;

class FinishTaskController extends Controller
{
    public function index()
    {
        $arFinish = AffairsFamily::getFinishTask();

        return view('finishtask', [
            'data' => $arFinish,
        ]);
    }
}
