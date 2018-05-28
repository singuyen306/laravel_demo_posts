<div class="ui-modal-contents-inner">
    <div class="ui-modal-contents">
        <main class="post blog-post">
            <div class="container">
                <div class="post-single">
                    <div class="post-thumbnail" style="background: url('{{$post->cover}}')">
                    </div>
                    <div class="post-details">
                        <h1>{{ $post->title }}</h1>
                        <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                <div class="title"><span>{{ $post->name }}</span></div>
                            </a>
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="date"><i class="icon-clock"></i> {{ Helper::diffForHumans($post->created_at) }}</div>
                            </div>
                        </div>
                        <div class="post-body">
                            @markdown($post->body)
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
