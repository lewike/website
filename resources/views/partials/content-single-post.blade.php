<article @php post_class() @endphp>
  <div class="mx-2 md:mx-0 shadow bg-white py-6 my-4 rounded-sm">
    <div class="px-6">
      <h1 class="entry-title text-2xl mb-4">
        {!! $title !!} 
      </h1>
      <div class="entry-meta flex flex-wrap gap-1 md:flex-nowrap md:gap-2 text-sm text-gray-500 my-3 border-b border-gray-100 pb-2">
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn hidden md:block">
          {{ get_the_author() }}
        </a>
        <span class="hidden md:block">&bull;</span>
        <time class="updated" datetime="{{ get_post_time('c', true) }}">
          {{ get_the_date() }}
        </time>
        <span>&bull;</span>
        <div class="title-cateogry">
          @php the_category() @endphp
        </div>
        <span>&bull;</span>
        <div>
          阅读 {{(int)get_post_meta(get_the_ID(), 'post_views', true)}}
        </div>
        <span>&bull;</span>
        <div>
          <a href="#comments">评论 {{comments_number('0', '1', '%')}}</a> 
        </div>
      </div>  
    </div>
    <div class="entry-content mt-3 px-6 leading-6">
      @php the_content() @endphp
    </div>
    <div class="px-6">
      <div class="bg-gray-50 border border-gray-100 rounded-sm px-6 py-4 my-8 text-sm">
        如若转载，请注明出处：{{get_the_permalink()}}
      </div>
    </div>
    @php $tags = get_the_tags(get_the_ID()) @endphp
    @if (is_array($tags))
      <div class="post-tags mb-4 px-6">
        <ul class="flex flex-wrap gap-3">
        @foreach ($tags as $tag)
          <li><a href="{{get_tag_link($tag->term_id)}}">{{$tag->name}}</a></li>
        @endforeach
        </ul>
      </div>
    @endif
    <div class="flex justify-center px-6">
      <button class="outline outline-1 outline-blue-500 text-blue-500 px-8 py-2 hover:outline-0 hover:bg-blue-600 hover:text-white rounded-md btn-like" data-postid="{{get_the_ID()}}" data-url="{{admin_url('admin-ajax.php')}}">赞（ <span id="post-likes-number">{{(int)get_post_meta(get_the_ID(), 'post_likes', true)}}</span> ）</button>
    </div>
    <div class="flex mt-6 border-t px-6 pt-4">
      <div class="author flex gap-2 items-center">
        <img src="{{get_avatar_url(get_the_author_ID())}}" alt="" class="rounded-full w-10 h-10">
        <div>
          <a href="{{ get_author_posts_url(get_the_author_ID()) }}" rel="author" class="text-blue-600 hover:underline text-sm">
            {{ get_the_author() }}
          </a>
        </div>
        <div class="ml-3">
            @php $user = get_userdata(get_the_author_ID()) @endphp
            @if (in_array('administrator', $user->roles))
            <div class="web-master">管理团队</div>
            @endif
        </div>
        <div>
        </div>
      </div> 
  
      
    </div>
  </div>
  <div class="mx-2 md:mx-0 grid grid-cols-1 md:grid-cols-2 gap-2">
    <div>
      @php
      $prePost = get_previous_post();
      @endphp
      @if ($prePost)
      <div class="rela-post-box" style="background-image: url({{get_the_post_thumbnail_url($prePost)}})">
        <div class="absolute z-30 w-full h-full p-2">
          <a href="{{get_the_permalink($prePost)}}">{{$prePost->post_title}}</a>
        </div>
        <div class="absolute z-30 bottom-1 w-full flex justify-between px-2 py-1 text-sm">
          <div>
            << 上一篇
          </div>
          <div>
            {{substr($prePost->post_date, 0, 16)}}
          </div>
        </div>
      </div>
      @endif
    </div>
    <div>
      <div>
        @php
        $nextPost = get_next_post();
        @endphp
        @if ($nextPost)
        <div class="rela-post-box" style="background-image: url({{get_the_post_thumbnail_url($nextPost)}})">
          <div class="absolute z-50 w-full h-full p-2">
            <a href="{{get_the_permalink($nextPost)}}">{{$nextPost->post_title}}</a>
          </div>
          <div class="absolute z-50 bottom-1 w-full flex justify-between px-2 py-1 text-sm">
            <div>
              {{substr($nextPost->post_date, 0, 16)}}
            </div>
            <div>
              下一篇 >>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  @php(comments_template())
</article>