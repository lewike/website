<div class="my-4 shadow rounded-sm bg-white p-6">
    <div class="author-bg mr-0"></div>
    <div class="-mt-8 text-center">
        <div class="img-box mx-auto bg-white rounded-full p-0.5 shadow">
            <img src="{{get_avatar_url(get_the_author_ID())}}" alt="" class="rounded-full">
        </div>
        <div class="flex justify-center items-baseline gap-3 mt-3">
            <span class="text-sm text-gray-800">{{get_the_author()}}</span>
            <span>
                @php
                $user = get_userdata(get_the_author_ID());
                @endphp
                @if (in_array('administrator', $user->roles))
                <span class="web-master">管理团队</span>
                @endif
            </span>
        </div>
        <div class="mt-4 text-gray-700 text-sm">
            {{get_user_meta(get_the_author_ID(), 'description', true)}}
        </div>
    </div>
    <div class="mt-8 author-latest-posts">
        <h3>最近文章</h3>
        @php 
            $authorPosts = get_posts([
                'author' => get_the_author_ID(),
                'post_status' => 'publish',
            ]);
        @endphp
        <ul class="my-1 ml-1">
            @foreach ($authorPosts as $post)
            <li>
            <a href="{{get_the_permalink($post)}}">{{$post->post_title}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="my-4 shadow rounded-sm bg-white px-6 py-3 latest-posts">
    <h2>最新文章</h2>
    @php 
        $authorPosts = get_posts([
            'author' => get_the_author_ID(),
            'post_status' => 'publish',
        ]);
    @endphp
    <ul class="my-1 ml-1">
        @foreach ($authorPosts as $post)
        <li>
            <div class="post-thumbnail-box">
                <img src="{{get_the_post_thumbnail_url($post)}}" alt="{{$post->post_title}}">
            </div>
            <div class="flex flex-col justify-between">
                <a href="{{get_the_permalink($post)}}">{{$post->post_title}}</a>
                <time>{{preg_replace('/(\d+)-(\d+)-(\d+)/', '${1}年${2}月${3}日', substr($post->post_date, 0, 10))}}</time>
            </div>
        </li>
        @endforeach
    </ul>
</div>
