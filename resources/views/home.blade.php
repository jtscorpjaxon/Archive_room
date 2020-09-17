@extends('layout.app')

@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="col-sm-12 search-for-help">

        <form action="/home/search" class="search-bar">
            <input type="text" name="q" placeholder="Search folder...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
@endsection