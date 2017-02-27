@extends('admin.template')
@section('content')
    <div class="container-fluid">
        <h2>Editando : {{ $post->title}}</h2>

        @if($errors->any())

            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>

        @endif

        {{--Form:model faz o bind automatico do modelo passado como primeiro parametro para os campos do form. --}}
        {!!  Form::model($post, ['route'=>['admin.posts.update', $post->id],'method'=>'put']) !!}

        @include('admin.posts._form')

        <div class="form-group">
            {!! Form::label('tags','Tags:',['class'=>'control-label']) !!}
            {!! Form::textarea('tags', $post->tagList, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop
