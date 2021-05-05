@extends('layout')

@section('content')

<div class="page-content">
  <div class="breadcrumbs-container"> 
    <div class="container">
      <ul class="breadcrumbs min-list inline-list">
        <li class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__link">
            <span class="breadcrumbs__title">Главная</span>
          </a>
        <li>

        <li class="breadcrumbs__item">
          <span class="breadcrumbs__page c-gray">{{$post->title}}</span>
        </li>
      </ul><!-- .breadcrumbs -->
    </div><!-- .container -->
  </div>
  
  <div class="container">
    <div class="post-image">
      <img class="mx-auto d-block img-fluid" src="{{$post->getImage()}}" alt="Post Image">
    </div>
    <div class="col-lg-8 offset-lg-2">
      <header class="entry-header">
        <h1 class="entry-title">{{$post->title}}</h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p>
          {!! $post->content !!}
        </p>
      </div><!-- .entry-content -->

      <div>
        <p class="entry-byline c-dusty-gray">          
          <p>{{$post->getDate()}} {{$post->author->name}}</p>
        </p>
      </div>

      <div class="entry-meta">

        <div class="entry-tags">
          @foreach($post->tags as $tag)
            <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
          @endforeach
        </div>

        <ul class="min-list inline-list social-list">
          <li>
            <a href="#">
              <i class="fa fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-pinterest"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-linkedin"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div><!-- .entry-meta -->

      

      <div class="nav-links">
        @if($post->hasPrevious())
        <div class="nav-link nav-previous">
          <a href="{{route('blog.show', $post->getPrevious()->slug)}}">
            <span class="screen-reader-text">Предыдущий пост:</span>
            <span class="nav-link-text">Previous:</span>
            <h3 class="nav-link-title">{{$post->getPrevious()->title}}</h3>
          </a>
        </div>
        @endif



        @if($post->hasNext())
        <div class="nav-link nav-next">
          <a href="{{route('blog.show', $post->getNext()->slug)}}">
            <span class="screen-reader-text">Следующий пост:</span>
            <span class="nav-link-text">Next:</span>
            <h3 class="nav-link-title">{{$post->getNext()->title}}</h3>
          </a>
        </div>
        @endif
      </div><!-- .nav-links -->

      
      <div id="comments" class="comments-area">
        @if(!$post->comments->isEmpty())
          <h3 class="comments-title">Количество комментариев: {{$post->comments()->count()}}</h3>
        @foreach($post->getComments() as $comment)
        <div class="comments-wrap">       
          <ol class="min-list comment-list">
            <li class="comment">
              <article>
                <div class="comment-wrapper">
                  <div class="comment-avatar">
                    <img src="/images/uploads/james-turner.jpg" alt="James Turner">
                  </div><!-- .comment-avatar -->

                  <div class="comment-content">
                    <header class="comment-header">
                      <h4 class="comment-author">{{$comment->author->name}}</h4>
                      <span class="comment-time c-gray">{{$comment->created_at->diffForHumans()}}</span>
                    </header>

                    <div class="comment-body c-dove-gray">
                      <p>
                        {{$comment->text}}
                      </p>
                    </div>
                  </div><!-- .comment-content -->
                </div><!-- .comment-wrapper -->
              </article>
            </li><!-- .comment -->

            
          </ol><!-- .comment-list -->
        </div><!-- .comments-wrap -->
        @endforeach
        @endif

        @if(Auth::check())
        <div class="comments-wrap">
          <h3 class="comments-title">Оставить комментарий</h3>
          <form class="comment-form" role="form" method="post" action="/comment">
            {{csrf_field()}}
            <div class="row">
              <input type="hidden" name="post_id" value="{{$post->id}}">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="comment">Ваш коммент</label>
                  <textarea
                    class="form-input form-input--square form-input--border-c-alto"
                    rows="8"
                    id="comment"
                    name="message"
                    placeholder="Ваш комментарий"
                  ></textarea>
                </div>
              </div><!-- .col -->

              <div class="col-md-12">
                <div class="form-group--submit">
                  <button
                    class="button button--square button--green button--large button--submit"
                    type="submit"
                  >
                    Отправить коммент
                  </button>
                </div>
              </div><!-- .col -->
            </div><!-- .row -->
          </form><!-- .comment-form -->
        </div><!-- .comments-wrap -->
        @endif


      </div><!-- #comments -->
    </div><!-- .col -->
  </div><!-- .container -->
</div><!-- .page-content -->

@endsection