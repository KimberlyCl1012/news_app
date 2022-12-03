@extends('layouts.content')
@section('content')
    <div class="container">
        <p class="text-news-principal">
            ¡¡What is going on in the world!!</p>
        @include('include.slider_news_important')
        <div style="background-color:#fff;padding: 10px; margin-bottom:1rem; opacity:0.1"></div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-title-new text-center">{{$newDetails->name}}</h5>
                <div class="row">
                    <div class="card mt-3 mb-5">
                        <img src="/images/news/new6.png" class="card-img-top mt-3" alt="...">
                        <p class="desc-img">(Kimberly Nava; by Ilustrator 2022)</p>
                        <div class="card-body">
                            <p class="card-text-new">
                               {{$newDetails->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
