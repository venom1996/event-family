<?php

namespace App\FamilyOperation\Service;

use App\FamilyOperation\Modal\AffairsOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Affairs extends AffairsOperation
{
    public function add(Request $request)
    {
        return parent::save($request);
    }

    public function edit(Request $request) :void
    {
        parent::edit($request);
    }

}
