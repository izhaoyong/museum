<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel 5</title>
         {{HTML::style('http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css') }}
        {{ HTML::style('css/main.css')}}
    </head>

    <body>
			<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand hidden-sm" href="/">Laravel</a>
                </div>


                <ul class="nav navbar-nav navbar-right hidden-sm">
                    <li>{{ HTML::link('users/register', 'Register') }}</li>
                    <li>{{ HTML::link('users/login', 'Login') }}</li>
                </ul>

            </div>

        </div>
        <div class="container">
          @if(Session::has('message'))
          <p class="alert">{{ Session::get('message') }}</p>
          @endif
          {{ $content }}
        </div>
    </body>
</html>