<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sewa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'NIK', 'email', 'tlp', 'no_unit','harga','dari','sampai','keterangan', 'user_id', 'update_user_id'];
    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function bayar(){
       return $this->hasMany(bayar::class);
    }
    static function get_api(){
        $result = DB::table('sewas')
        ->select("*" ,'sewas.id AS S_id')//temporary solution
        ->join('users', "sewas.user_id", "=", "users.id");
        return $result;

        /* id for sewas table need to be aliased because of conflict with user id
        long term solution maybe is just to repair the database (which is too much work)
        soo yaa... YOLO*/

        //ps other model might have the same problem
    }
}
