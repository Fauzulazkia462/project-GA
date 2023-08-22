@extends('layout.main')

@section('content')
<section class="section" id="home">
    <div class="container text-center">
        <h6 class="display-4 has-line">LIST PROJECT GA</h6>
        <p class="mb-5 pb-2"> </p>

        {{-- <form action="" method="GET">
            <div class="row justify-content-md-center">
                <div class="col-md-1">
                    <label for="" class="label col-md-1">Dari </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="min" id="min" required>
                </div>
                <div class="col-md-1">
                    <label for="" class="label col-md-1">Sampai </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="max" id="max" required>
                </div>
            </div>
        </form> --}}

        <div class="container">
            <table id="dttable" class="table table-stripeds">
                <thead>
                    <tr>
                        <th>Pekerjaan</th>
                        <th>Tanggal 1</th>
                        <th>Tanggal 2</th>
                        <th>Tanggal 3</th>
                        <th>Tanggal Input</th>
                        <th colspan="2">Action</th>
                        <th></th>
                        {{-- <th>Kode Cost Center</th>
                        <th>Tgl Pinjam</th>
                        <th>Jml Waktu Pinjam</th>
                        <th>Tgl Input</th>
                        <th>Action</th>
                        <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $value)
                        <tr>
        
                            <td>{{ $value->pekerjaan }}</td>
                            <td>{{ $value->tanggal1 }}</td>
                            <td>{{ $value->tanggal2 }}</td>
                            <td>{{ $value->tanggal3 }}</td>
                            <td>{{ $value->created_at }}</td>

                            {{-- <td><a href="{{ url('input/'.$value->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a></td> --}}

                            <td>
                            <form action="{{ url('input/'.$value->id.'/edit') }}" method="post">
                                @csrf
                                <input type="hidden">
                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                            </form>
                            </td>

                            <td>
                                <form action="{{ url('delete/'.$value->id) }}" method="post">
                                    @csrf
                                    <input type="hidden">
                                    <button class="btn btn-primary btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                            {{-- <td>
                                <form action="{{ url('loan/'.$value->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-primary btn-sm" type="submit">Hapus</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="modal">Ekspor Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('export') }}" method="post" id="exportFormModal">
                    @csrf
                    <div class="form-group">
                        <label for="">Dari Tanggal</label>
                        <input type="date" class="form-control" name="start_date" placeholder="Pilih Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="">Sampai Tanggal</label>
                        <input type="date" class="form-control" name="end_date" placeholder="Pilih Tanggal">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#dttable').DataTable();
});

$('#dttable').dataTable( {
    "scrollX": true,
    "bLengthChange": false,
    "columnDefs": [
        { "targets": 1, "width": 100 },
        { "targets": 5, "width": 90 },
        { "targets": 7, "width": 90 },
    ]
});

//BEGIN::Filter
$(document).on("change", "#start_date, #end_date", function() { // Setiap ada perubahan pada #start_date dan atau #end_date
    url = "/?start_date=" + $("#start_date-data").val() + "&end_date=" + $("#end_date").val(); // Ambil Value

    dt.ajax.url( url ).load(); //Reload URL pada Datatables dengan variabel dt
    dtableReload();
});
//END::Filter




var minDate, maxDate;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var dateMin = minDate.val();
        const min = new Date(dateMin);
        var max = maxDate.val();
        var date = new Date( data[5] );

        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {

    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });

    // DataTables initialisation
    var table = $('#dttable').DataTable();

    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});


</script>
@endsection
