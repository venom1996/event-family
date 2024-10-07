<?php

namespace App\Http\Controllers;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffairsFamilyController extends BaseController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $id = $this->service->add($request);

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $response = $this->service->getModal($request);

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function edit(Request $request): void
    {
        $this->service->editModal($request);
    }

}


