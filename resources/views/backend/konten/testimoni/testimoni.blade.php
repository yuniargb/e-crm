@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>testimoni</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/testimoni">Testimoni</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <div class="flash-message" data-title="Thank You" data-flashmessage="{{ Session::get('success') }}"></div>
    <hr>
    <div class="card-body">
        @php $no=1; @endphp
        @foreach($testi as $tst)
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-2">
                <img width="85px;" class="img-fluid img-circle" src="/assets/images/avatar-2.png" alt="User">
            </div>
            <div class="col-md-8">
                <h5>{{ $tst->nama_pelanggan }} (<span>{{ $tst->invoice_id }}</span>)</h5>
                <p>{{ $tst->isi_testimoni }}</p>
            </div>
            <div class="col-md-2">
                <div class="text-right">
                    <span class="icofont icofont-star {{ ( 1 <= $tst->rating ? 'text-warning' : '') }}"></span>
                    <span class="icofont icofont-star {{ ( 2 <= $tst->rating ? 'text-warning' : '') }}"></span>
                    <span class="icofont icofont-star {{ ( 3 <= $tst->rating ? 'text-warning' : '') }}"></span>
                    <span class="icofont icofont-star {{ ( 4 <= $tst->rating ? 'text-warning' : '') }}"></span>
                    <span class="icofont icofont-star {{ ($tst->rating == 5 ? 'text-warning' : '') }}"></span>
                    <br>
                    <small class="text-muted">{{ date('F d, Y', strtotime($tst->created_at)) }}</small>
                    <br>
                    <span class="badge {{ ($tst->publish != 0) ? 'badge-success' : 'badge-danger'}}">{{ ($tst->publish != 0) ? 'Published' : 'Not published' }}</span>
                </div>
                <div class="text-right">
                    <div style="margin-top:10px;" class="dropdown-primary dropdown">
                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icofont icofont-gear"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            @if($tst->publish != 0)
                            <a class="dropdown-item waves-light waves-effect btn-del" href="/testimoni/unpublish/{{ $tst->id }}">Unpublish</a>
                            <a class="dropdown-item waves-light waves-effect btn-del" href="/testimoni/delete/{{ $tst->id }}">Delete</a>
                            @else
                            <a class="dropdown-item waves-light waves-effect" href="/testimoni/publish/{{ $tst->id }}">Publish</a>
                            <a class="dropdown-item waves-light waves-effect btn-del" href="/testimoni/delete/{{ $tst->id }}">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection