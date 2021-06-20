<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\bayar;
use App\Models\sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class bayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        $data['bayar'] = bayar::get_sewa()->paginate(100);
        $data['admin'] = bayar::get_admin()->paginate(100);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
    //     //
    //     $data = sewa::find($id);
    //     return response()->json($data);

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $this->validate($request, [
            'id_sewa'   => 'required',
            'dari'      => 'required',
            'bulan'    => 'required',
        ]);
        
        $sampai = Carbon::createFromFormat('Y-m-d',request('dari'))->addMonths(request('bulan'));
        try{
            $response = bayar::create([
                'id_sewa' => request('id_sewa'),
                'dari' => request('dari'),
                'sampai' => $sampai,
                'id_admin' =>1,
                'keterangan' => request('keterangan')
            ]);

            $Sewa = sewa::find(request('id_sewa'));
            $Sewa->lastpaid =  $sampai;
            $Sewa->save(); 

            return response()->json([
                'success' => true,
                'notif'=>'pembayaran berhasil dicatat',                
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'notif'=>'Error',               
            ], 422);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['user'] = bayar::get_sewa()->where('bayars.id',$id)->first();
        $data['admin'] = bayar::get_admin()->where('bayars.id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validasi = $this->validate($request, [
            'id_sewa'   => 'required',
            'dari'      => 'required',
            'bulan'    => 'required',
        ]);
        
        $sampai = Carbon::createFromFormat('Y-m-d',request('dari'))->addMonths(request('bulan'));
        try{
            $bayar = bayar::find($id);
            $bayar->id_sewa = $request->id_sewa;
            $bayar->dari = $request->dari;
            $bayar->sampai = $sampai;
            $bayar->id_admin = 1;
            $bayar->keterangan = $request->keterangan;
            $bayar->save();

            $Sewa = sewa::find(request('id_sewa'));
            $Sewa->lastpaid =  $sampai;
            $Sewa->save(); 

            return response()->json([
                'success' => true,
                'notif'=>'pembayaran berhasil diupdate',                
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'notif'=>'Error',               
            ], 422);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = bayar::find($id);       //cari id yang dipencet
            $data-> delete();                  //delete id tersebut
            return response()->json([
                'success' => true,
                'notif'=>'berhasil delete data',                
            ]);
        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'notif'=>'Error',               
            ], 422);
        } 
    }
}
