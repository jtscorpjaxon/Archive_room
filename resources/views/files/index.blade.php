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
        <a style="margin: 19px;" href="{{ route('file.create')}}" class="btn btn-primary">New File</a>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <h1 class="display-3">Files</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Text</td>
                    <td>Folder</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>{{$file->id}}</td>
                        <td>{{$file->name}}</td>
                        <td>{{$file->text}}</td>
                        <td>{{$file->folder()->first()->name}}</td>
                        <td>
                            <a href="{{ route('file.edit',$file->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('file.destroy', $file->id)}}" method="post">
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