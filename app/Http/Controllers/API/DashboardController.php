<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\sewa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function dashboard(){
        $data['title'] = 'dashboard';
        $sewa =sewa::all();
        $data['active'] = sewa::whereDate('dari','<=', Carbon::today())
                            ->whereDate('sampai','>=', Carbon::today())->count ();
        $data['expired'] = sewa::whereDate('sampai','<=', Carbon::today())->count ();
        $data['reserved'] = sewa::whereDate('dari','>=', Carbon::today())->count ();
            
        $belumSelesai = sewa::whereDate('sampai','>', Carbon::now())->sum('harga');
        $belumMulai = sewa::whereDate('dari','>', Carbon::now())->sum('harga');
        $data['rev'] = $belumSelesai - $belumMulai;

        return response()->json($data);
    }
}
