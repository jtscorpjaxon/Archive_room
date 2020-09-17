@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a folder</h1>

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
            <form method="post" action="{{ route('folder.update', $folder->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $folder->name }} />
                </div>

                <div class="form-group">
                    <label for="text">Cupboard ID:</label>
                    {{--<input type="text" class="form-control" name="text" value={{ $folder->field()->first()->archive()->first()->name }} />--}}
                    <select name="cupboard" onchange="getval(this);" >
                        @foreach($cupboards as $cupboard)
                            <option value="{{$cupboard->id}}">
                                {{ $cupboard->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="folder">Field ID:</label>
                   {{-- <input type="text" class="form-control" name="folder" value={{ $folder->field()->first()->name }} />--}}
                    <span id="list">
                    <select name="field">
                        @foreach($fields as $field)
                            <option value="{{$field->id}}">
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                    </span>
                </div>



                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <script>
        function getval(sel)
        {

            $.ajax({
                url: '/list/'+sel.value,
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    $('#list').html(res);
                },
                error:function () {

                }
            });
        }
    </script>
@endsection