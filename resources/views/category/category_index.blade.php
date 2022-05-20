@extends('layout.master')
@section('content')
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-success">Category အသစ်ထည့်</a>
        <table class="table table-striped mt-3">
            <thead>
                <th>အမည်</th>
                <th>ဖန်တီးခဲ့</th>
                <th>ထိန်းချုပ်</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-warning">ပြင်မည်</a>

                    <form action="{{route('categories.destroy',$category->id)}}" method="POST" class="d-inline" onsubmit="return confirm('{{$category->name}} ကိုဖျက်မှာသေချာပါသလား? {{$category->name}}နှင့်ဆိုင်သည့် product အားလုံးပျက်သွားပါလိမ့်မည်')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="ဖျက်မည်">
                    </form>
                    
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-item-center mt-5">{{$categories->links()}}</div>
    </div>
@endsection