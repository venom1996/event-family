<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AffairsFamily;
class OverdueController extends Controller
{
    /**
     * Контроллер для вкладки "Общие просроченные"
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $arOverdue = AffairsFamily::getOverdueAffairs();

        return view('overdue', [
            'data' => $arOverdue,
        ]);
    }
}
