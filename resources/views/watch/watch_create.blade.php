@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('watches.index')}}" class="btn btn-dark">နောက်သို့</a>

        <form action="{{route('watches.store')}}" class="mt-3" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Product အမည်</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group mt-3">
                <label for="">Product ပုံ</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            <div class="form-group mt-3">
                <label for="">Product အမျိုးအစား</label>
                <select name="category_id" class="form-select">
                    <option disabled selected>-- အမျိူးစားရွေးပါ --</option>
                    @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">စျေးနှုန်း</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group mt-3">
                <label for="">ဖော်ပြချက်</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group mt-3">
                <input type="submit" value="အသစ်ထည့်မည်" class="btn btn-success mt-1">
            </div>
        </form>
    </div>
@endsection