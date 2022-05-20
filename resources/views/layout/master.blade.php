<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <div class="p-3">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('categories.index')}}" >Categories</a></li>
                        <li class="list-group-item"><a href="{{route('watches.index')}}">Products</a></li>
                        <li class="list-group-item">Orders</li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="card p-3" style="width: 930px">
                        {{-- alert message --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>                            
                        @endif
                        @if(session()->has('fail'))
                            <div class="alert alert-danger">{{session()->get('fail')}}</div>   
                        @endif

                        {{-- form validation --}}
                        @if ($errors->all())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>   
                            @endforeach
                        @endif
                        
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>