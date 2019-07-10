@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Testimoni</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/testimoni">Terstimoni</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Invoice</th>
                <th>Rating</th>
                <th>Testimoni</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($testimoni as $ktg)
            @php
            if($ktg->rating == 5){
            $rating = "Perfect";
            }elseif($ktg->rating == 4){
            $rating = "Exellent";
            }elseif($ktg->rating == 3){
            $rating = "Good";
            }elseif($ktg->rating == 2){
            $rating = "Bad";
            }elseif($ktg->rating == 1){
            $rating = "Awful";
            }else{
            $rating = "Not Found";
            }
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->invoice_id }}</td>
                <td>{{ $rating }}</td>
                <td>{{ $ktg->isi_testimoni }}</td>
                <td>
                    @if($ktg->publish == 0)
                    <a href="/testimoni/publish/{{ $ktg->id }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="publish"><i class="icofont icofont-upload-alt"></i>
                    </a>
                    @endif
                    @if($ktg->publish == 1)
                    <a href="/testimoni/unpublish/{{ $ktg->id }}" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="unpublish"><i class="icofont icofont-upload-alt"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection