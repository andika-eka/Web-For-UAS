<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sewa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'NIK', 'sewas.email', 'tlp', 'no_unit','harga','dari','sampai','keterangan',  'admin_id'];
    // static function get_user(){
    //     $result = DB::table('sewas')
    //     ->select('sewas.id AS S_id', 'nama', 'NIK', 'sewas.email', 'tlp', 'no_unit', 'harga', 'dari', 'sampai',   'keterangan',
    //     'users.name', 'users.email AS U_email' )//temporary solution
    //     ->join('users', "sewas.user_id", "=", "users.id");
    //     return $result;

        /* id for sewas table need to be aliased because of conflict with user id
        long term solution maybe is just to repair the database (which is too much work)
        soo yaa... YOLO*/

        //ps other model might have the same problem

    static function get_admin(){
        $result = DB::table('sewas')
        ->select('sewas.id AS S_id', 'nama', 'NIK', 'sewas.email', 'tlp', 'no_unit', 'harga', 'dari', 'sampai', 'keterangan',
        'users.name', 'lastpaid' )//temporary solution
        ->join('users', "sewas.admin_id", "=", "users.id");
        return $result;

    }
}
