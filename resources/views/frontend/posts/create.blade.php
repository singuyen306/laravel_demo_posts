<!-- create post form -->
<div class="create-post-page show-modal">
    <div class="form">
        <form class="form-create-post" id="createPostForm" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="alert alert-warning login-alert">
            </div>
            <input type="file" name="cover" accept="image/*" />
            <input type="text" name="title" placeholder="title"/>
            <textarea name="body" placeholder="body" rows="10" id="body_post"></textarea>

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

    @include('layouts.froala_editor_css');
    @include('layouts.froala_editor_js');

    <script type="text/javascript">
        // instance.
        $('#body_post').froalaEditor({
            toolbarButtons: ['undo', 'redo', 'html', '-',
                'fontSize', 'paragraphFormat', 'align', 'quote',
                '|', 'formatOL', 'formatUL', '|', 'bold', 'italic', 'underline',
                '|', 'insertLink', 'insertImage'],
            heightMin: 250,
            imageDefaultWidth: 0,
            imageMove: true,
            imageUploadParam: 'image',
            imageUploadMethod: 'post',
            imageDefaultAlign: 'left',
            // Set the image upload URL.
            imageUploadURL: "{{ route('froalaUpload') }}",
            imageUploadParams: {
                location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
            },
            // URL to get all department images from
            imageManagerLoadURL: '/fileuploads',
            // Set the delete image request URL.
            imageManagerDeleteURL: "/fileuploads/1",
            // Set the delete image request type.
            imageManagerDeleteMethod: "DELETE",
            imageManagerDeleteParams: {
                _token: "{{ csrf_token() }}"
            }
        });
    </script>
@stop