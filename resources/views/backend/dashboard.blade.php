@extends('backend.layouts.backend')

@section('content')
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <h1> Posts Management</h1>
                    </div>
                    <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Creator</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="odd gradeX">
                                        <td><img width="100" height="100" src="{{ $post->cover }}" /></td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td class="center">{{ Helper::convertTimeToDisplay($post->created_at) }}</td>
                                        <td class="center">{{ Helper::convertTimeToDisplay($post->updated_at) }}</td>
                                        <td>
                                            <select name="approved" class="approved" data-content="{{ $post->id }}" data-url="{{ route('backend_post_approved') }}">
                                                <option value="0" {{ $post->approved == 0 ? 'selected' : '' }}>Un-Approved</option>
                                                <option value="1" {{ $post->approved == 1 ? 'selected' : '' }}>Approved</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop