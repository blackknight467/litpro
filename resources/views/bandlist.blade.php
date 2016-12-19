@extends('layouts.base')

@section('title', 'Band List')

@section('content')
    <h1>Band List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                @include('sortheader', ['element' => 'name', 'label' => 'Name', 'routeName' => 'bandIndex'])
                @include('sortheader', ['element' => 'start_date', 'label' => 'Start Date', 'routeName' => 'bandIndex', 'class' => 'hidden-xs'])
                @include('sortheader', ['element' => 'website', 'label' => 'Website', 'routeName' => 'bandIndex', 'class' => 'hidden-xs'])
                @include('sortheader', ['element' => 'still_active', 'label' => 'Active', 'routeName' => 'bandIndex', 'class' => 'hidden-xs'])
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>{{ $band->name }}</td>
                <td class="hidden-xs">{{ $band->start_date }}</td>
                <td class="hidden-xs"><a href="{{ $band->website }}">{{ $band->website }}</a></td>
                <td class="hidden-xs">
                    @if($band->still_active)
                        <i class="fa fa-check"></i>
                    @endif
                </td>
                <td>
                    <a class="btn btn-default" href="{{ URL::route('bandEdit', ['id' => $band->id]) }}">Edit</a>
                    {{ Form::open(['url' => URL::route('bandDelete', ['id' => $band->id])]) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $bands->render() !!}
@endsection