@extends('layouts.base')

@section('title', 'Create Album')

@section('content')
    <h1>Create Ablum</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route' => ['albumCreatePost'], 'method' => \Symfony\Component\HttpFoundation\Request::METHOD_POST]) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('band_id', 'Band') }}
        {{ Form::select('band_id', $bands, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('recorded_date', 'Recorded Date') }}
        {{ Form::date('recorded_date', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('release_date', 'Release Date') }}
        {{ Form::date('release_date', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('number_of_tracks', 'Number of Tracks') }}
        {{ Form::number('number_of_tracks', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('label', 'Label') }}
        {{ Form::text('label', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('producer', 'Producer') }}
        {{ Form::text('producer', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('genre', 'Genre') }}
        {{ Form::text('genre', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection