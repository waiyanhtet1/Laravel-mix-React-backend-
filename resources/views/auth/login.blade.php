<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="p-5 col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header"><h4>Login Here</h4></div>
            <div class="card-body">
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

                <form action="{{url('/admin/login')}}" class="mt-3" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email">
                        <label for="floatingInput">Email ရိုက်ထည့်ပါ</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password">
                        <label for="floatingPassword">Password ရိုက်ထည့်ပါ</label>
                      </div>
                      <input type="submit" class="btn btn-dark mt-3" value="Login ဝင်မည်">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>