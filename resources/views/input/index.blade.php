@extends('layout.main')

@section('content')
<section class="section" id="input">
    <div class="container">
        <h6 class="display-4 has-line text-center">INPUT DATA PROJECT GA</h6>
        <p class="mb-5 pb-2 text-center">Hati - hati dalam input, periksa kembali sebelum submit!</p>

        <form method="post" action="{{ route('selesai') }}">
            @csrf
            <div class="container">

                {{-- <div class="row mb-4">
                    <div class="col-md-4">
                        <input type="hidden" name="_token" value="">
                        <div class="form-group pb-1">
                            <label for="inputer"><b>Admin</b></label>
                            <select name="inputer" id="inputer" class="form-control text-center" title="Kode Payroll" required>
                            </select>
                        </div>
                    </div>
                </div> --}}

                <div class="row mb-4">
                    <div class="col-md-6">
                        {{-- <input type="hidden" name="" value=""> --}}
                        <div class="form-group pb-1">
                            <label><b>Pekerjaan</b></label>
                            <input type="text" class="form-control" name="pekerjaan" required>
                        </div>
                        <div class="form-group pb-1">
                            <label><b>Tanggal 1</b></label>
                           <input type="date" class="form-control" name="tanggal1" required>
                        </div>
                        <div class="form-group pb-1">
                            <label><b>Tanggal 2</b></label>
                            <input type="date" class="form-control" name="tanggal2" required>
                        </div>

                        <div class="form-group pb-1">
                            <label><b>Tanggal 3</b></label>
                            <input type="date" class="form-control" name="tanggal3" required>
                        </div>

                        <div class="text-right">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>

                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group pb-1">
                            <label for="section"><b>Kode Bagian</b></label>
                            <input type="text" class="form-control" name="section" id="section" required placeholder="Kode Bagian" disabled>
                        </div>
                        <div class="form-group pb-1">
                            <label for="date"><b>Tanggal Peminjaman</b></label>
                            <input type="date" class="form-control" name="date" id="date" required placeholder="Tanggal">
                        </div>
                        <div class="form-group pb-1">
                            <label for="time"><b>Jumlah Menit Bekerja</b></label>
                            <input type='text' onkeypress='validate(event)' class="form-control" name="time" id="time" required placeholder="Jumlah Menit Bekerja">
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                            <a class="btn btn-primary mt-3" href="/">Selesai</a>
                            <input type="" class="btn btn-primary mt-3" value="Selesai">
                        </div>
                    </div> --}}
                </div>
            </div>
        </form>

    </div>
</section>
@endsection

@section('script')
<script>

</script>
@endsection
