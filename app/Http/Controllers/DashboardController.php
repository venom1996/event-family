<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AffairsFamily;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUsersId = Auth::id();
        $eventData = AffairsFamily::conclusionTable();
        $currentTable = AffairsFamily::currentTable($currentUsersId);

        return view('dashboard', [
            'data' => $eventData,
            'currentTable' => $currentTable
        ]);
    }

}
