<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VATGoodies.com - let us lift the weight!</title> <!-- CHANGE THIS TITTLE FOR EACH PAGE -->

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body>
<div class="container">
    <div class="content-wrapper">
        <div class="row">
            <br>
            <br>
            <br>
            <div class="col-md-offset-1 col-md-10">
                <img src="images/logo/main-logo.png" alt="VATGoodies Logo" width="800" height="400"
                     class="img-responsive">
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-4 col-md-8">
                <h2>presents Real Ops!</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <p>VATGoodies Real Ops will allow your FIR / ARTCC to organize the real ops event that you always wanted
                    to organize! Organize your event, add the focus airports, place the flights and enjoy real ops the
                    way it should be enjoyed!</p>
                <ul>
                    <li>Easily organize and manage your real ops event!</li>
                    <li>No hassle flight booking for pilots!</li>
                    <li>Everyone uses VATSIM SSO for login!</li>
                    <li>and many awesome ideas in the pipeline!</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="content-wrapper">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <strong>Success:</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('subscription.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <input type="email" class="form-control" name="email" required="true"
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email address to stay posted!">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-block">Keep me posted!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <a class="github-button" href="https://github.com/vatsimgoodies" data-size="large"
                   data-show-count="true" aria-label="Follow @vatsimgoodies on GitHub">Follow @vatsimgoodies on
                    Github</a><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <p>VATGoodies.com - @version('full')</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>