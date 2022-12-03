@extends('layouts.content')
@section('content')
    <span class="ir-arriba icon-arrow-up2"><i class="fas fa-arrow-up"></i></span>

    <div class="container">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum atque corrupti deserunt? Recusandae accusamus
            ipsa veniam quam sed enim possimus aliquam necessitatibus officiis, ullam molestiae ipsum eius atque aspernatur
            magni?</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class='principal-text'>What is going on in the world?</p>
                @foreach ($newsImp as $news)
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="/images/news/new9.jpg" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ \Carbon\Carbon::parse($news->created_at)->format('d') }}</h3>
                                    <p>{{ \Carbon\Carbon::parse($news->created_at)->format('F') }}</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ $news->name }}</h2>
                                </a>
                                <p>{{ $news->description }}</p>
                                <ul class="blog-info-link">
                                    <li><a class="btn-more-info" href="{{ url('/news-detail', base64_encode($news->id)) }}">
                                            Ver más información</a>&nbsp; / &nbsp; <strong>
                                            @if ($visit == null)
                                            <p style="color:gray">Pending</p>
                                            @else
                                            <P style="color: green">Visited</P>
                                            @endif
                                        </strong> </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mt-5" style="background-color: #351D25">
                <div class="row">
                    <p class='principal-text'>Other Post</p>
                    <div class="col-sm-12">
                        <aside class="single_sidebar_widget popular_post_widget">
                            @foreach ($otherNews as $oNews)
                                <div class="card mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="/images/news/new4.png" class="card-img-top" width="auto"
                                                alt="News">
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="card-title mt-4">{{ $oNews->name }}</h5>
                                            <p class="card-text-lim"><small
                                                    class="text-muted limitado">{{ $oNews->description }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
    {{-- Funcion para limitar carácteres --}}
    <script>
        function ellipsis_box(elemento, max_chars) {
            limite_text = $(elemento).text();
            if (limite_text.length > max_chars) {
                limite = limite_text.substr(0, max_chars) + " ...";
                $(elemento).text(limite);
            }
        }
        $(function() {
            ellipsis_box(".limitado", 25);
        });
    </script>

    {{-- Flecha hacia arriba --}}
    <script>
        $(document).ready(function() {
            $(".ir-arriba").click(function() {
                $("body, html").animate({
                        scrollTop: "0px"
                    },
                    300
                );
            });

            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                    $(".ir-arriba").slideDown(300);
                } else {
                    $(".ir-arriba").slideUp(300);
                }
            });
        });
    </script>
    </script>
@endsection
@endsection
