@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('categories.index')}}" class="btn btn-dark">နောက်သို့</a>

        <form action="{{route('categories.store')}}" class="mt-3" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Category အမည်</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <input type="submit" value="အသစ်ထည့်မည်" class="btn btn-success mt-1">
            </div>
        </form>
    </div>
@endsection