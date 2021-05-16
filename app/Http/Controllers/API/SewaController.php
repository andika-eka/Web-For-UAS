<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sewa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "daftar sewa";
        $data['sewa'] = sewa::get_api()->paginate(10);
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
        $data['title']= 'daftarkan penyewa';
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*check your fucking request json
     could save you tons of headache
                    -me who an idiot
     */  
        $validasi = $this->validate($request, [
            'nama'          => 'required',
            'NIK'           => 'required',
            'tlp'           => 'required',
            'no_unit'       => 'required',
            'dari'          => 'required|date|before:sampai',
            'sampai'        => 'required|date',
            'harga'         => 'required|numeric|min:50000',
           
        ]);

        try{
            $response = sewa::create([
                'nama' => request('nama'),
                'NIK' => request('NIK'),
                'tlp' => request('tlp'),
                'email' => request('email'),
                'dari' => request('dari'),
                'sampai' => request('sampai'),
                'no_unit' => request('no_unit'),
                'harga' => request('harga'),
                'user_id' =>1,//major problem
                'update_user_id' =>1,
                'keterangan' => request('keterangan'),
            ]);

     
            return response()->json([
                'success' => true,
                'notif'=>'penyewa berhasil di daftarkan',                
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
        
         // this api also can be called for sewa edit
        $data = sewa::get_api()->where('sewas.id',$id)->first();
        return response()->json($data);
    }//just use edit

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     // this api also can be called for sewa detail
    //     $data = sewa::get_api()->where('sewas.id',$id)->first();
    //     return response()->json($data);
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
            'nama'          => 'required',
            'NIK'           => 'required',
            'tlp'           => 'required',
            'no_unit'       => 'required',
            'dari'          => 'required|date|before:sampai',
            'sampai'        => 'required|date',
            'harga'         => 'required|numeric|min:50000',
           
        ]);

        try{
            $Sewa = sewa::find($id);
            $Sewa->nama = $request->nama;
            $Sewa->NIK = $request->NIK;
            $Sewa->tlp = $request->tlp;
            $Sewa->email = $request->email;
            $Sewa->dari = $request->dari;
            $Sewa->sampai = $request->sampai;
            $Sewa->no_unit = $request->no_unit;
            $Sewa->harga = $request->harga;
            $Sewa->keterangan = $request->keterangan;
            $Sewa->update_user_id = 2;
            $Sewa->save();    
            return response()->json([
                'success' => true,
                'notif'=>'berhasil update data',                
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
            $data = sewa::find($id);       //cari id yang dipencet
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
