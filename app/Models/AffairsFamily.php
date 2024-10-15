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
            ->paginate(10);

        return !empty($affairsFamilies) ? $affairsFamilies : [];
    }

    public static function getAffairs(int $id)
    {
        $affairsFamilies = self::select('*')
            ->where('id', $id)
            ->get();

        return $affairsFamilies;
    }


    public static function currentTable($usersId) :?object
    {
        $affairsFamilies = self::select('affairs_families.*', 'users.name as userName')
            ->where('status', 'assign')
            ->where('date_finish', '>=', date('Y-m-d'))
            ->rightJoin('users', 'users.id', '=', 'affairs_families.user_id_created')
            ->paginate(10);

        return !empty($affairsFamilies) ? $affairsFamilies : null;
    }

    public static function getFinishTask() :?object
    {
        $affairsFamilies = self::select('affairs_families.*', 'users.name as userName')
            ->where('status', 'finish')
            ->rightJoin('users', 'users.id', '=', 'affairs_families.user_id_created')
            ->paginate(10);

        return !empty($affairsFamilies) ? $affairsFamilies : null;
    }

    public static function getOverdueAffairs() :?object
    {
        $affairsFamilies = self::select('affairs_families.*', 'users.name as userName')
            ->where('status', 'assign')
            ->where('date_finish', '<', date('Y-m-d'))
            ->rightJoin('users', 'users.id', '=', 'affairs_families.user_id_created')
            ->paginate(10);

        return !empty($affairsFamilies) ? $affairsFamilies : null;
    }

}
