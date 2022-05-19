@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('categories.index')}}" class="btn btn-dark">နောက်သို့</a>

        <form action="{{route('categories.update',$category->id)}}" class="mt-3" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Category အမည်</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <input type="submit" value="ပြင်မည်" class="btn btn-warning mt-1">
            </div>
        </form>
    </div>
@endsection