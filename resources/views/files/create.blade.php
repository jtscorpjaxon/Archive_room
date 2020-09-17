@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a file</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('file.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="text">Text:</label>
                        <input type="text" class="form-control" name="text"/>
                    </div>

                    <div class="form-group">
                        <label for="folder">Folder ID:</label>

                        <select name="folder">
                            @foreach($folders as $folder)
                                <option value="{{$folder->id}}">
                                    {{ $folder->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary-outline">Add file</button>
                </form>
            </div>
        </div>
    </div>
@endsection