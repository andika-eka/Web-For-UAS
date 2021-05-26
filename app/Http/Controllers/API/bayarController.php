<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\bayar;
use Illuminate\Http\Request;

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
        $data['title'] = "daftar sewa";
        $data['bayar'] = bayar::get_sewa()->paginate(100);
        $data['admin'] = bayar::get_admin()->paginate(100);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            'sampai'    => 'required',
        ]);

        try{
            $response = bayar::create([
                'id_sewa' => request('id_sewa'),
                'dari' => request('dari'),
                'sampai' => request('sampai'),
                'id_admin' =>1,
                'keterangan' => request('keterangan'),
            ]);

            return response()->json([
                'success' => true,
                'notif'=>'pemabayaran berhasil dicatat',                
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
    public function edit($id)
    {
        //
    }

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
