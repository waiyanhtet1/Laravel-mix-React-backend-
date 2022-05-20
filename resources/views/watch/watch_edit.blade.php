@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('watches.index')}}" class="btn btn-dark">နောက်သို့</a>
        <div class="mt-2"><b>{{$watch->updated_at->diffForHumans()}}</b> ကနောက်ဆုံးပြင်ခဲ့သည်</div>

        <form action="{{route('watches.update',$watch->id)}}" class="mt-3" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Product အမည်</label>
                <input type="text" class="form-control" name="name" value="{{$watch->name}}">
            </div>
            <div class="form-group mt-3">
                <label for="">Product ပုံ</label>
                <img src="{{asset('images/'.$watch->image)}}"  alt="">
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>

            <div class="form-group mt-3">
                <label for="">Product အမျိုးအစား</label>
                <select name="category_id" class="form-select">
                    <option disabled selected>-- အမျိူးစားရွေးပါ --</option>
                    @foreach ($categories as $c)
                    <option {{$c->id == $watch->category_id ? 'selected':''}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="">စျေးနှုန်း</label>
                <input type="number" class="form-control" name="price" value="{{$watch->price}}">
            </div>
            <div class="form-group mt-3">
                <label for="">ဖော်ပြချက်</label>
                <textarea name="description" class="form-control">{{$watch->description}}</textarea>
            </div>
            <div class="form-group mt-3">
                <input type="submit" value="ပြင်မည်" class="btn btn-warning mt-1">
            </div>
        </form>
    </div>
@endsection