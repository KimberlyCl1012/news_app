@extends('layouts.dashboard')
@section('title', 'News')
@section('link')
    <link href="{{ asset('/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('content')

    <div id="content" class="content">
        <h1 class="page-header">Show News</h1>

        <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{Storage::url($newDetails->image)}}" alt="">
                    <img src="{{ asset('/news') . Storage::url($newDetails->image) }}" alt="" />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$newDetails->name}}</h5>
                      <p class="card-text">{{$newDetails->description}}</p>
                      <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($newDetails->created_at)->format('d F Y') }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
