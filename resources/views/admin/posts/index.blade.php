@extends('admin.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                <a href="{{route('admin.posts.create')}}" class="btn btn-success">Create</a>
                <br>
                <br>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{route('admin.posts.edit', ['id'=>$post->id])}}"
                                   class="btn btn-default">Edit</a>
                                <a href="{{route('admin.posts.destroy', ['id'=>$post->id])}}" class="btn btn-danger">Destroy</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@stop
