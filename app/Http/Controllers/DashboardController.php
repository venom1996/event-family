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
        $currentTable = AffairsFamily::currentTable($currentUsersId);

        return view('dashboard', [
            'currentTable' => $currentTable
        ]);
    }

}
