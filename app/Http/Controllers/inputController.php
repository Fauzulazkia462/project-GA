<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;

class inputController extends Controller
{
    public function index(){
        return view('input.index');
    }

    public function selesai(Request $req){
        \DB::table('pekerjaan')
        ->insert([
            'pekerjaan' => $req -> pekerjaan,
            'tanggal1' => $req -> tanggal1,
            'tanggal2' => $req -> tanggal2,
            'tanggal3' => $req -> tanggal3,
        ]);

        return redirect()-> to ('/');
    }

    public function edit($id){

        // $pekerjaan = Pekerjaan::all();
        $model = \DB::table('pekerjaan')
            ->select('pekerjaan.*')
            ->where('pekerjaan.id', '=', $id)
            ->first();

            // return $model;

            return view('input.edit', compact('model'));

    }

    public function update(Request $req, $id){

        $model = Pekerjaan::find($id);
        $model-> pekerjaan = $req->pekerjaan;
        $model-> tanggal1 = $req->tanggal1;
        $model-> tanggal2 = $req->tanggal2;
        $model-> tanggal3 = $req->tanggal3;
        $model->save();

        return redirect('/');
    }
}
