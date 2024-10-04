<?php

namespace App\Http\Controllers;

use App\FamilyOperation\Modal\AffairsOperation;
use Illuminate\Http\Request;
use App\Models\AffairsFamily as AffairsFamilyModels;

use App\FamilyOperation\Service\Affairs;
use Illuminate\Support\Facades\Auth;

class AffairsFamily extends Controller
{

    private Affairs $objAffairs;
    private AffairsOperation $objAffairsOperation;

    public function __construct()
    {
        $this->objAffairs = new Affairs();
    }

    public function add(Request $request)
    {
        $id = $this->objAffairs->add($request);

        if ($id > 0 ) {
            $data = [
                'status' => 'ok',
                'id' => $id
            ];
            return response()->json($data);
        } else {
            return response()->json(['status' => 'bad response']);
        }
    }

    public function get(Request $request)
    {
        $response = AffairsFamilyModels::getAffairs($request->id);

        return response()->json($response);
    }

    public function edit(Request $request)
    {
        $this->objAffairs->edit($request);
    }

}


