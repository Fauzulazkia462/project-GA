<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

class dashboardController extends Controller
{
    public function index() {
        
        $query = "SELECT id, pekerjaan, tanggal1, tanggal2, tanggal3, created_at
        FROM pekerjaan";

        $datas = \DB::select($query);

        return view ('dashboard.index', compact('datas'));
    }

    public function destroy($id){
        \DB::delete('DELETE FROM pekerjaan WHERE id = ?', [$id]);
        return redirect('/');
    }

    public function export(Request $req){

        $req->validate([
            'start_date' => 'bail|nullable|date',
            'end_date' => 'bail|nullable|date',
        ]);

        $params = [
            'start_date' => $req->start_date,
            'end_date' => $req->end_date
        ];

        // return $request;

        return Excel::download(new DataExport($params), 'GA-'.date('Y-m-d').'.xlsx');
    }

    
}
