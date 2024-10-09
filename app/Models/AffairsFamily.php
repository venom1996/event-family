<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class AffairsFamily extends Model
{
    use HasFactory;

    protected $table = 'affairs_families';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'date_create',
        'date_finish',
        'user_id_created',
        'user_id_working',
        'status'
    ];


    public static function conclusionTable()
    {
        $affairsFamilies = self::select('*')
            ->where('status', 'wait')
            ->where('user_id_working', '0')
            ->get()
            ->toArray();

        return !empty($affairsFamilies) ? $affairsFamilies : [];
    }

    public static function getAffairs(int $id)
    {
        $affairsFamilies = self::select('*')
            ->where('id', $id)
            ->get();

        return $affairsFamilies;
    }


    public static function currentTable($usersId)
    {
        $affairsFamilies = self::select('*')
            ->where('status', 'assign')
            ->get()
            ->toArray();

        $affairs = [];
        foreach ($affairsFamilies as $key => $item){
            $userName = User::find($item['user_id_working'])->name;
            $affairs[$key] = $item;

            $affairs[$key]['userName'] = $userName;
        }


        return !empty($affairs) ? $affairs : [];
    }

    public static function getOverdueAffairs()
    {

        $affairsFamilies = self::select('*')
            ->where('status', 'assign')
            ->where('date_finish', '<=', date('Y-m-d 23:59:59'))
            ->get()
            ->toArray();

        $arOverdueAffairs = [];
        foreach ($affairsFamilies as $key => $item){
            $userName = User::find($item['user_id_working'])->name;
            $arOverdueAffairs[$key] = $item;

            $arOverdueAffairs[$key]['userName'] = $userName;
        }



        return !empty($arOverdueAffairs) ? $arOverdueAffairs : [];
    }

}
