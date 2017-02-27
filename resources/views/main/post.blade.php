@extends('template')
@section('content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div>{{$post->content}}</div>
        <hr>
        <h4>Tags</h4>
        @foreach($post->tags as $tag)
            <a href="#">{{ $tag->name }}</a>
        @endforeach
        <hr>
        <h4>Comentários</h4>
        <dl>
            @foreach($post->comments as $comment)
                <dt>{{ $comment->name }}</dt>
                <dd>{{ $comment->comment }}</dd>
            @endforeach
        </dl>
    </div>
</div>
@stop
