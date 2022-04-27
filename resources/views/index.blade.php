@include('sections.page-header')
<main id="main" class="main bg-slate-50"> 
  <div class="container block pb-4 md:pb-0 md:flex mx-auto gap-6">
    <div class="px-2 md:px-0">
      <ul class="flex-auto post-list px-6 bg-white shadow rounded-sm my-4">
      @while(have_posts()) @php(the_post())
        <li class="block md:flex gap-6 hover:bg-gray-100 py-6 border-b border-gray-100 hover:-mx-6 hover:px-6 transition-margin duration-500 ease-in-out">
          <div class="w-full mb-4 md:mb-0 md:w-1/3 flex-none">
            <a href="{{the_permalink()}}">
            <div class="post-thumbnail rounded shadow-md shadow-slate-300 hover:shadow-slate-400">
              @if (has_post_thumbnail())
              <img src="@php(the_post_thumbnail_url())" alt="@php(the_title())" class="transition-transform duration-500 ease-in-out">
              @endif
            </div>
            </a>
          </div>
          <div class="flex flex-col flex-auto post-main justify-between">
            <div>
              <div class="post-main-title text-xl font-medium text-gray-800">
                <a href="@php(the_permalink())">@php(the_title())</a>
              </div>
              <div class="post-main-excerpt text-gray-500 py-3">
                @php(the_excerpt())
              </div>
            </div>
            <div class="post-main-matedata flex text-gray-400 font-normal text-xs justify-between w-full">
              <div class="flex gap-4 items-center"> 
                <div class="post-author flex items-center gap-2">
                {!! get_avatar(get_the_author_meta('ID'), 24) !!}
                <span>@php(the_author())</span> 
                </div>
                <div class="flex gap-1 items-center">
                  <svg t="1647552933616" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="21547" width="14" height="14"><path d="M678.4 691.2l-60.8 60.8-179.2-176V243.2h86.4v294.4l153.6 153.6z m288-169.6c0 249.6-201.6 454.4-454.4 454.4S57.6 774.4 57.6 521.6C57.6 272 262.4 70.4 512 67.2c249.6 3.2 454.4 204.8 454.4 454.4z m-86.4 0C880 320 713.6 156.8 512 156.8S144 320 144 521.6c0 201.6 163.2 368 368 368 201.6 0 368-163.2 368-368z" p-id="21548" fill="#9ca3af"></path></svg>
                  <div class="post-date">@php(the_date())</div>
                </div>
                
              </div> 
              <div class="flex gap-3 items-center">
                <div class="flex gap-1 items-center">
                  <svg t="1647551148454" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4090" width="14" height="14"><path d="M512 128c230.058667 0 421.461333 165.546667 461.610667 384-40.106667 218.453333-231.552 384-461.610667 384-230.058667 0-421.461333-165.546667-461.610667-384C90.496 293.546667 281.941333 128 512 128z m0 682.666667a384.213333 384.213333 0 0 0 374.485333-298.666667 384.213333 384.213333 0 0 0-748.970666 0A384.213333 384.213333 0 0 0 512 810.666667z m0-106.666667a192 192 0 1 1 0-384 192 192 0 0 1 0 384z m0-85.333333a106.666667 106.666667 0 1 0 0-213.333334 106.666667 106.666667 0 0 0 0 213.333334z" p-id="4091" fill="#9ca3af"></path></svg>
                  <div class="post-view">{{(int)get_post_meta(get_the_ID(), 'post_views', true)}}</div>
                </div>
                <div class="flex gap-1 items-center">
                  <svg t="1647551392609" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6889" width="14" height="14"><path d="M85.333333 256a85.333333 85.333333 0 0 1 85.333334-85.333333h682.666666a85.333333 85.333333 0 0 1 85.333334 85.333333v469.333333a85.333333 85.333333 0 0 1-85.333334 85.333334h-195.669333l-115.498667 115.498666a42.666667 42.666667 0 0 1-60.330666 0L366.336 810.666667H170.666667a85.333333 85.333333 0 0 1-85.333334-85.333334V256z m768 0H170.666667v469.333333h213.333333a42.666667 42.666667 0 0 1 30.165333 12.501334L512 835.669333l97.834667-97.834666A42.666667 42.666667 0 0 1 640 725.333333h213.333333V256zM256 405.333333a42.666667 42.666667 0 0 1 42.666667-42.666666h426.666666a42.666667 42.666667 0 1 1 0 85.333333H298.666667a42.666667 42.666667 0 0 1-42.666667-42.666667z m0 170.666667a42.666667 42.666667 0 0 1 42.666667-42.666667h256a42.666667 42.666667 0 1 1 0 85.333334H298.666667a42.666667 42.666667 0 0 1-42.666667-42.666667z" fill="#9ca3af" p-id="6890"></path></svg>
                  
                  <div class="post-comment-number">@php(comments_number('0', '1', '%'))</div>
                </div>
                <div class="flex gap-1 items-center">
                  <svg t="1647552639467" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10089" width="14" height="14"><path d="M853.333333 341.333333h-239.445333l47.914667-143.658666c8.618667-25.941333 4.266667-54.698667-11.733334-76.885334S608.128 85.333333 580.778667 85.333333H512c-12.672 0-24.661333 5.632-32.810667 15.36L278.656 341.333333H170.666667c-47.061333 0-85.333333 38.272-85.333334 85.333334v384c0 47.061333 38.272 85.333333 85.333334 85.333333h567.765333a85.76 85.76 0 0 0 79.914667-55.381333l117.632-313.642667A42.666667 42.666667 0 0 0 938.666667 512v-85.333333c0-47.061333-38.272-85.333333-85.333334-85.333334zM170.666667 426.666667h85.333333v384H170.666667v-384z m682.666666 77.610666L738.432 810.666667H341.333333V399.445333L531.968 170.666667h48.896l-66.645333 199.808A42.581333 42.581333 0 0 0 554.666667 426.666667h298.666666v77.610666z" p-id="10090" fill="#9ca3af"></path></svg>
                  <div>{{(int)get_post_meta(get_the_ID(), 'post_likes', true)}}</div>
                </div>
              </div>
            </div>
          </div>
        </li>
      @endwhile
      </ul>
      <div>
        @php(the_posts_pagination())
      </div>
    </div>
    <div class="sidebar mx-2 md:mx-0 my-4 shadow rounded-sm bg-white p-6">
      @include('sections.sidebar')
    </div>
  </div>
</main>
@include('sections.footer')
