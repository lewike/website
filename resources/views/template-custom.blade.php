@extends('layouts.app')

@section('content')
  <div class="container flex mx-auto">
    <div class="flex-auto">
      @while(have_posts()) @php(the_post())
        @include('partials.content-page')
      @endwhile
    </div>
    <div class="sidebar">
      @include('sections.sidebar')
    </div>
</div>
@endsection
