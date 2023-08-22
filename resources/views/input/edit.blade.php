@extends('layout.main')

@section('content')
<section class="section" id="input">
    <div class="container">
        <h6 class="display-4 has-line text-center">EDIT DATA PROJECT GA</h6>
        <p class="mb-5 pb-2 text-center">Hati - hati dalam input, periksa kembali sebelum submit!</p>

        <form method="post" action="{{ url('input/' .$model->id) }}">
            @csrf
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-6">
                       
                        <div class="form-group pb-1">
                            <label><b>Pekerjaan</b></label>
                            <input type="text" class="form-control" name="pekerjaan" value="{{ $model->pekerjaan }}">
                        </div>
                        <div class="form-group pb-1">
                            <label><b>Tanggal 1</b></label>
                           <input type="date" class="form-control" name="tanggal1" value="{{ $model->tanggal1 }}">
                        </div>
                        <div class="form-group pb-1">
                            <label><b>Tanggal 2</b></label>
                            <input type="date" class="form-control" name="tanggal2" value="{{ $model->tanggal2 }}">
                        </div>

                        <div class="form-group pb-1">
                            <label><b>Tanggal 3</b></label>
                            <input type="date" class="form-control" name="tanggal3" value="{{ $model->tanggal3 }}">
                        </div>

                        <div class="text-right">
                            <input type="submit" class="btn btn-primary mt-3" value="Submit">
                        </div>

                    </div>
                  
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
