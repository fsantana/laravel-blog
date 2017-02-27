@extends('admin.template')
@section('content')
    <div class="container-fluid">
        <h2>Create new Post</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>

        @endif
        {!!  Form::open(['route'=>'admin.posts.store','method'=>'post']) !!}

        @include('admin.posts._form')

        <div class="form-group">
            {!! Form::label('tags','Tags:',['class'=>'control-label']) !!}
            {!! Form::textarea('tags', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop
