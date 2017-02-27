@extends('template')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{url("post/$post->id")}}">
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ $post->subtitle }}
                    </h3>
                </a>
                <p class="post-meta">Enviado por <a href="#">{{ $post->author }}</a> em {{ $post->updated_at }}</p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
@stop
