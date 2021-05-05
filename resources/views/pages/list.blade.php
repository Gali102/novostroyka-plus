@extends('layout')

@section('content')
@push('style')
    <style>
        .post-excerpt{
            word-break: break-all;
        }
        .post-content > p{
            word-break: break-all;
        }
    </style>
@endpush
<div class="page-content">
    <div class="breadcrumbs-container">
        <div class="container">
            <ul class="breadcrumbs min-list inline-list">
                <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__link">
                        <span class="breadcrumbs__title">Главная</span>
                    </a>
                </li>

                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__page c-gray">Блог</span>
                </li>
            </ul><!-- .breadcrumbs -->
        </div><!-- .container -->
    </div>

    <div class="container">
        <h2 class="page-title t-center">Блог</h2>
    </div>
    <section class="news news--layout-4">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="post">
                        <div class="post-thumbnail">
                            <a href="{{route('blog.show', $post->slug)}}">
                                <img src="{{$post->getImage()}}" alt="Sa Pa festival for next month" height="205px;" width="100%;">
                            </a>
                        </div><!-- .post-thumbnail -->

                        <div class="post-content bg-wild-sand">
                            <h3 class="post-title">
                                <a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a>
                            </h3>
                            <p class="post-excerpt c-dove-gray">
                                {!!$post->description!!}
                            </p>
                            <p class="post-meta t-small">
                                <span><a href="#" class="c-dusty-gray">{{$post->getDate()}}</a></span>
                                <span>
                                    @if($post->hasCategory())
                                        <a class="c-dusty-gray" href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                                    @endif
                                </span>
                            </p>
                        </div><!-- .post-content -->
                    </div><!-- .post -->
                </div><!-- .col -->
                @endforeach

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .news -->

    {{$posts->links()}}

</div><!-- .page-content -->

@endsection