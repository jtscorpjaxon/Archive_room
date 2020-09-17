@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a file</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('file.update', $file->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $file->name }}" />
                </div>

                <div class="form-group">
                    <label for="text">Text:</label>
                    <textarea type="text" class="form-control" name="text" rows="3" >{{ $file->text }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="folder">Folder ID:</label>

                    <select name="folder" class="custom-select">
                        @foreach($folders as $folder)
                        <option value="{{$folder->id}}">
                            {{ $folder->name }}
                        </option>
                            @endforeach
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection