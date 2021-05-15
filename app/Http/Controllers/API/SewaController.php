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
        //
        $this->validate($request, [
            'nama' => 'required',
            'NIK' => 'required',
            'tlp' => 'required',
            'no_unit' => 'required',
            'dari' => 'required|before:sampai',
            'sampai' => 'required',
            'harga' => 'required'
        ]);
        sewa::create([
            'nama' => request('nama'),
            'NIK' => request('NIK'),
            'tlp' => request('tlp'),
            'email' => request('email'),
            'dari' => request('dari'),
            'sampai' => request('sampai'),
            'no_unit' => request('no_unit'),
            'harga' => request('harga'),
            'user_id' =>Auth::id(),
            'update_user_id' =>Auth::id(),
            
            'keterangan' => request('keterangan'),
        ]);
        return redirect('/sewa')->with('success', 'data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        
    //     $data = sewa::find($id);

    //     $user = user::find($data->user_id);
    //     $userUpdate = user::find($data->update_user_id);

    //     $title = $data->nama;
    //     return view('dashboard.detail')
    //     ->with('title', $title)
    //     ->with("sewa", $data)
    //     ->with('user', $user)
    //     ->with('update', $userUpdate);
    // }//just use edit

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = sewa::get_api()->where('sewas.id',$id)->first();
        return response()->json($data);
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
        $Sewa = sewa::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'NIK' => 'required',
            'tlp' => 'required',
            'no_unit' => 'required',
            'dari' => 'required',
            'sampai' => 'required',
            'harga' => 'required'
        ]);

        $Sewa->nama = $request->nama;
        $Sewa->NIK = $request->NIK;
        $Sewa->tlp = $request->tlp;
        $Sewa->email = $request->email;
        $Sewa->dari = $request->dari;
        $Sewa->sampai = $request->sampai;
        $Sewa->no_unit = $request->no_unit;
        $Sewa->harga = $request->harga;
        $Sewa->keterangan = $request->keterangan;
        $Sewa->update_user_id = Auth::id();
        $Sewa->save();    

        return redirect('/sewa')->with('success', 'data saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = sewa::find($id);       //cari id yang dipencet
        $data-> delete();                  //delete id tersebut

        return redirect('/sewa')->with('success', 'data deleted');
    }
}
