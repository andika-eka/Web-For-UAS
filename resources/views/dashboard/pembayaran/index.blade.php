
@extends('dashboard.template.layout')

@section('content')
<main>
    
           
                <div class="table-responsive" style="padding:30px;">
                @if(count($bayar)>0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              
                                <th>nama</th>
                                <th>no unit</th>
                                <th>lama</th>
                                <th>harga</th>
                                <th>admin</th>
                                <th>waktu</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr> 
                                <th>nama</th>
                                <th>no unit</th>
                                <th>lama</th>
                                <th>harga</th>
                                <th>admin</th>
                                <th>waktu</th>
                                <th>-</th>
                            </tr>
                        </tfoot>
                        <tbody>
                         @foreach($bayar as $Bayar)   
                            <tr>
                                <td title="{{$Bayar -> keterangan }}">{{$sewa[$Bayar->id_sewa - 1]->nama}}</td>
                                <td>{{$sewa[$Bayar->id_sewa - 1]->no_unit}}</td>
                                <td>{{$Bayar->bulan}} bulan</td>
                                <td>Rp. {{ $sewa[$Bayar->id_sewa - 1]->harga * $Bayar->bulan}}</td>
                                <td>{{$user[$Bayar->id_user - 1]->name}}</td>
                                <td>{{$Bayar->created_at}}</td>
                                <td><form name="delete" action="/pembayaran/{{ $Bayar->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="rounded-pill bg-danger" style="color: white;" name='delete'>Delete</button>
                                </form></td>
                            </tr>
                         @endforeach   
                        </tbody>
                    </table>
                    @else
                    <p>data tidak ditemukan</p>
                    @endif
                </div>
            
</main>
@endsection
