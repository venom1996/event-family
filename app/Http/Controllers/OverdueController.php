<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AffairsFamily;
class OverdueController extends Controller
{
    public function index()
    {

        $arOverdue = AffairsFamily::getOverdueAffairs();

        return view('overdue', [
            'data' => $arOverdue,
        ]);
    }
}
