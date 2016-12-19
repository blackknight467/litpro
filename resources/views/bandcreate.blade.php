@extends('layouts.base')

@section('title', 'Create Band')

@section('content')
    <h1>Create Band</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(['route' => ['bandCreatePost'], 'method' => \Symfony\Component\HttpFoundation\Request::METHOD_POST]) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('start_date', 'Start Date') }}
        {{ Form::date('start_date', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('still_active', 'Still Active') }}
        {{ Form::select('still_active', [0 => 'No', 1 => 'Yes'], null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection