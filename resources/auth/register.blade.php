<!DOCTYPEhtml>
<htmllang="en">
<head>
<metacharset="utf-8">

<metahttp-equiv="X-UA-Compatible" content="IE=edge">

<metaname="viewport" content="width=device-width, initial-scale=1">

<title>Регистрация</title>

<linkhref="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

<scriptsrc="{{ asset('/js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>

<scriptsrc="{{asset('/js/bootstrap.js') }}"type="text/javascript" charset="utf-8"></script>

</head>

<body>

<div class="container">

<nav class="navbar" role="navigation">

<ul class="navnavbar-nav">

<li class="active">

<a href="{{ url('auth/login') }}">Вход</a>

</li>;

</ul>

</nav>

        {{--Ошибки--}}

        @if ($errors->has())

<divclass="row">

<div class="col-md-8 col-md-offset-2">

<div class="alertalert-danger" role="alert">

<button class="close" aria-label="Close" data-dismiss="alert" type="button">

<spanaria-hidden="true">×</span>

</button>

<ul>

                          @foreach($errors->all() as $error)                        

<li> {{{ $error }}}</li>

                          @endforeach

</ul>

</div>

</div>

</div>

      @endif

<formrole="form" method="post" action="{{ url('auth/register') }}">

          {!! csrf_field() !!}

<div class="form-group">

<labelfor="email">Email</label>

<inputtype="email" class="form-control" id="email" placeholder="Email" name='email'>

</div>

<divclass="form-group">

<labelfor="password">Пароль</label>

<inputtype="password" class="form-control" id="password" placeholder="Пароль" name="password">

</div>

<div class="form-group">

<labelfor="confirm_password">Повторите пароль</label>

<inputtype="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">

</div>

<button type="submit" class="btn btn-default">Отправить</button>

</form>

</div>

</body>

</html>