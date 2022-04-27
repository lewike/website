@if (! post_password_required())
  <section id="comments" class="mx-2 md:mx-0 comments shadow bg-white px-6 py-2 mb-4">
    @php(comment_form())
    @if (have_comments())
      <h3>
        评论列表（{{get_comments_number()}}条）
      </h3>
      <ol class="comment-list">
        {!! wp_list_comments(['style' => 'ol', 'short_ping' => true, 'avatar_size' => 24, 'callback' => 'custom_comment']) !!}
      </ol>
      @if (get_comment_pages_count() > 1 && get_option('page_comments'))
        <nav>
          <ul class="pager">
            @if (get_previous_comments_link())
              <li class="previous">
                {!! get_previous_comments_link(__('&larr; Older comments', 'sage')) !!}
              </li>
            @endif

            @if (get_next_comments_link())
              <li class="next">
                {!! get_next_comments_link(__('Newer comments &rarr;', 'sage')) !!}
              </li>
            @endif
          </ul>
        </nav>
      @endif
    @endif

    @if (! comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
      <x-alert type="warning">
        {!! __('Comments are closed.', 'sage') !!}
      </x-alert>
    @endif
  </section>
@endif
