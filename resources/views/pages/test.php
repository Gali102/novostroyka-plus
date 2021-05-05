@foreach($posts as $post)
      <div class="col-md-4">
        <div class="post sticky">
          <div class="post-thumbnail">
            <a href="{{route('blog.show', $post->slug)}}">
              <img src="{{$post->getImage()}}" alt="{{$post->title}}" height="205px;" width="100%;">
            </a>
          </div><!-- .post-thumbnail -->

          <div class="post-content">
            <h3 class="post-title">
              <a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a>
            </h3>
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