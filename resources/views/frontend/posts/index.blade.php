@extends('frontend.layouts.frontend')

@section('content')
    <main class="posts-listing col-lg-12">
        <div class="container">
            <div class="row">
                <!-- post -->
                @foreach($posts as $post)
                    <div class="post col-xl-4">
                        <div class="post-thumbnail">
                            <a href="javascript:void(0);" class="view-post-detail" data-post-id="{{ $post->id }}">
                                <img src="{{$post->cover}}" alt="{{$post->title}}" class="img-fluid">
                            </a>
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date meta-last">{{ Helper::convertTimeToDisplay($post->created_at) }}</div>
                            </div>
                            <a href="javascript:void(0);" class="view-post-detail" data-post-id="{{ $post->id }}">
                                <h3 class="h4">{{$post->title}}</h3>
                            </a>
                            <p class="text-muted">{!!  str_limit($post->body, 300) !!}</p>
                            <footer class="post-footer d-flex align-items-center">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="title"><span>{{$post->name}}</span></div>
                                </a>
                                <div class="date"><i class="icon-clock"></i> {{ Helper::diffForHumans($post->created_at) }}</div>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <div class="row justify-content-center">
                    {{ $posts->links() }}
                </div>
            </nav>
        </div>
    </main>
@stop