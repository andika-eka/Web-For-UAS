<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bayar extends Model
{
    use HasFactory;
    protected $fillable = ['id_sewa', 'bulan','keterangan', 'id_user'];
    public function sewa(){
        return $this->belongsTo('App\Models\sewa', 'id_sewa');
    }
    public function user(){
      return  $this->belongsTo('App\Models\User', 'id_user');
    }
    static function get_api(){
      $result = DB::table('bayars')
      ->join('users', "bayars.id_user", "=", "users.id")
      ->join('sewas', "bayars.id_sewa", '=', "sewas.id");
      return $result;
  }
}
