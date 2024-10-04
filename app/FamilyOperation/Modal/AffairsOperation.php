<?php

namespace App\FamilyOperation\Modal;
use App\FamilyOperation\Modal\OperationModal;
use App\Models\AffairsFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
abstract class AffairsOperation implements OperationModal
{

    public function save(Request $request) :int
    {
        if (empty($request))
            return 0;

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


    public function edit(Request $request): void
    {
        if (empty($request))
            return;


        $currentUsersId = Auth::id();
        if ($request->assign) {
            $arUpdate = [
                'user_id_working' => $currentUsersId,
                'status' => 'assign'
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
