@extends('layout.app')

@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="row">

        <div class="col-sm-12">
            <h1 class="display-3">Cupboards</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Field qty</td>
                    <td>Folder qty</td>

                </tr>
                </thead>
                <tbody>
                @foreach($archives as $archive)
                    <tr>
                        <td>{{$archive->id}}</td>
                        <td>{{$archive->name}}</td>
                        <td>{{$archive->fields()->count()}}</td>
                        <td>{{$archive->folders()->count()}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection