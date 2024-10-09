<?php

namespace App\Http\Controllers;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Post\AffairsService;
use App\Http\Resources\AffairsGetResources;
use App\Http\Resources\AffairsAddResource;
class AffairsFamilyController extends Controller
{

    private AffairsService $affairsService;

    /**
     * @param AffairsService $affairsService
     */
    public function __construct(AffairsService $affairsService)
    {
        $this->affairsService = $affairsService;
    }

    /**
     * @param Request $request
     * @param AffairsService $affairsService
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request, AffairsService $affairsService) :AffairsGetResources
    {
        $response = $affairsService->getModal($request);

        return new AffairsGetResources($response);
    }

    /**
     * @param Request $request
     * @param AffairsService $affairsService
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request, AffairsService $affairsService) :AffairsAddResource
    {
        $id = $affairsService->add($request);

        return new AffairsAddResource(['id' => $id]);
    }


    /**
     * @param Request $request
     * @return void
     */
    public function edit(Request $request, AffairsService $affairsService): void
    {
        $affairsService->editModal($request);
    }

}


