<!-- create post form -->
<div class="create-post-page show-modal">
    <div class="form">
        <form class="form-create-post" id="createPostForm" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="alert alert-warning login-alert">
            </div>
            <input type="file" name="cover" accept="image/*" />
            <input type="text" name="title" placeholder="title"/>
            <textarea name="body" placeholder="body" rows="10" id="editor_beaaty"></textarea>

            <button type="submit" class="btn-create-post">Create</button>
        </form>
    </div>
</div>

@section('script')
    @if (session('message'))
        <script type="text/javascript">
            twentyci.hideMessageCreatePost();
        </script>
    @endif
@stop