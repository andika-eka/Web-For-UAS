<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bayar extends Model
{
    use HasFactory;
    protected $fillable = ['id_sewa', 'dari', 'sampai', 'keterangan', 'id_admin'];
    
    static function get_sewa(){
      $result = DB::table('bayars')
      ->select("bayars.id", 'id_sewa', 'bayars.dari', 'bayars.sampai', 'bayars.keterangan',  'nama', 
      'no_unit', 'harga', 'bayars.created_at')
      ->join('sewas', "bayars.id_sewa", '=', "sewas.id");
  
      return $result;
    }

    static function get_admin(){
      $result = DB::table('bayars')
      ->select("bayars.id",  'id_admin', 'name', 'email' )
      ->join('users', "bayars.id_admin", "=", "users.id");
      return $result;
    }
  }
