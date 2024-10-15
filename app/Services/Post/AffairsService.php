<?php

namespace App\Services\Post;

use App\Models\AffairsFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffairsService
{
    public function add(Request $request)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $dateAppointment = new \DateTime($request->dateAppointment);
        $dateFinish = $dateAppointment->format('Y-m-d H:i:s');

        $currentUsersId = Auth::id();

        $arAdd = [
            'name' => $request->name,
            'description' => $request->description,
            'date_create' => $currentDateTime,
            'date_finish' => $dateFinish,
            'user_id_created' => $currentUsersId,
            'user_id_working' => 0,
            'status' => 'wait'
        ];

        $save = AffairsFamily::create($arAdd);

        if ($save->id > 0) {
            return $save->id;
        }
    }

    public function getModal(Request $request)
    {
        return AffairsFamily::getAffairs($request->id);
    }

    public function editModal(Request $request) :void
    {
        $currentUsersId = Auth::id();
        if ($request->assign) {
            $arUpdate = [
                'user_id_working' => $currentUsersId,
                'status' => 'assign'
            ];
        } else if ($request->finish) {
            $arUpdate = [
                'status' => 'finish'
            ];
        } else {
            $arUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
        }

        AffairsFamily::where('id', $request->id)->update(
            $arUpdate
        );
    }
}
