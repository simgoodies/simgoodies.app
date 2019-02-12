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

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">

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
            <div class="offset-md-1 col-md-10">
                <img src="images/logo/main-logo.png" alt="VATGoodies Logo" width="800" height="400"
                     class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-md-8">
                <h2>presents Real Ops!</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <p>VATGoodies Real Ops will allow your FIR / ARTCC to organize the real ops event that you always wanted
                    to organize! Organize your event, place the flights, watch them be booked and enjoy real ops the
                    way it should be enjoyed!</p>
                <ul>
                    <li>Easily organize and manage your real ops event!</li>
                    <li>No hassle flight booking for pilots!</li>
                    <li>Everyone uses VATSIM SSO for login! (pending)</li>
                    <li>and many awesome ideas in the pipeline!</li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        @honeypot
                        <div class="row mt-md-n2">
                            <div class="col-md-8 mt-2">
                                <input type="email" class="form-control" name="email" required="true"
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email address to stay posted!">
                            </div>
                            <div class="col-md-4 mt-2">
                                <button type="submit" class="btn btn-success btn-block">Keep me posted!</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <a class="typeform-share link btn btn-success btn-block text-da" href="https://rolgonzalez.typeform.com/to/CjREly"
                               data-mode="popup"
                               data-hide-headers=true data-hide-footer=true data-submit-close-delay="5" target="_blank">Contact VATGoodies</a>
                            <script> (function () {
                                    var qs, js, q, s, d = document, gi = d.getElementById, ce = d.createElement,
                                        gt = d.getElementsByTagName, id = "typef_orm_share",
                                        b = "https://embed.typeform.com/";
                                    if (!gi.call(d, id)) {
                                        js = ce.call(d, "script");
                                        js.id = id;
                                        js.src = b + "embed.js";
                                        q = gt.call(d, "script")[0];
                                        q.parentNode.insertBefore(js, q)
                                    }
                                })() </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <a class="github-button" href="https://github.com/vatsimgoodies" data-size="large"
                   data-show-count="true" aria-label="Follow @vatsimgoodies on GitHub">Follow @vatsimgoodies on
                    Github</a><br>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <p>VATGoodies.com - version {{ config('app.version') }}</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
