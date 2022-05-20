@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('watches.create')}}" class="btn btn-success">Product အသစ်ထည့်</a>
        <table class="table table-striped mt-3">
            <thead class="text-center">
                <th style="width: 100px">product ပုံ</th>
                <th>အမည်</th>
                <th style="width: 100px">အမျိုးအစား</th>
                <th style="width: 100px">စျေးနှုန်း</th>
                <th>ဖော်ပြချက်</th>
                <th style="width: 100px">ဖန်တီးခဲ့</th>
                <th style="width: 100px">ထိန်းချုပ်</th>
            </thead>
            <tbody class="text-center">
                @foreach ($watches as $watch)
                <tr>
                    <td><img src="{{asset('images/'.$watch->image)}}" width="100px"  height="100px" class="img-thumbnail" alt=""></td>
                    <td>{{$watch->name}}</td>
                <td>{{$watch->category->name}}</td>
                <td>$ {{$watch->price}}</td>
                <td>{{$watch->description}}</td>
                <td>{{$watch->created_at->diffForHumans()}}</td>

                <td style="width: 150px">
                   <a href="{{route('watches.edit',$watch->id)}}" class="btn btn-sm btn-warning">ပြင်မည်</a>
                   <form action="{{route('watches.destroy',$watch->id)}}" class="d-inline" method="POST" onsubmit="return confirm('{{$watch->name}} ကိုဖျက်မှာသေချာပါသလား?')">
                       @csrf
                       @method('DELETE')
                       <input type="submit" class="btn btn-sm btn-danger" value="ဖျက်မည်">
                   </form>
                </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-item-center mt-5">{{$watches->links()}}</div>
    </div>
@endsection