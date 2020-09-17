@extends('layout.app')

@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div>
        <a style="margin: 19px;" href="{{ route('folder.create')}}" class="btn btn-primary">New folder</a>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <h1 class="display-3">Folders</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Cupboard</td>
                    <td>Field</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($folders as $folder)
                    <tr>
                        <td>{{$folder->id}}</td>
                        <td>{{$folder->name}}</td>
                        <td>{{$folder->field()->first()->archive()->first()->name}}</td>
                        <td>{{$folder->field()->first()->name}}</td>

                        <td>
                            <a href="{{ route('folder.edit',$folder->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('folder.destroy', $folder->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection