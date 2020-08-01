<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simgoodies - let us lift the weight!</title> <!-- CHANGE THIS TITTLE FOR EACH PAGE -->

    <!-- Google Analytics -->

@if (config('app.env') === 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134452334-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-134452334-1');
        </script>
    @endif

    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function () {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#edeff5",
                        "text": "#838391"
                    },
                    "button": {
                        "background": "#4b81e8"
                    }
                },
                "theme": "classic",
                "position": "bottom-right"
            })
        });
    </script>

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
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <img src="images/logo/simgoodies-logo.png" alt="Simgoodies Logo" width="800" height="400"
                     class="img-fluid">
            </div>
            <div class="col-md-10 text-center">
                <h2>presents the following goodies</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 my-2">
                <div class="card bg-light">
                    <img class="card-img-top img-fluid" src="{{ asset('images/goodies/realops-by-vatgoodies.jpg') }}"
                         alt="Real Ops Image">
                    <div class="card-body">
                        <h4 class="card-title m-0">Real Ops</h4>
                        <p class="card-text"><span class="badge badge-success badge-pill">Launching Soon</span></p>
                        <p class="card-text">allows your FIR / ARTCC to organize the real ops event that you always
                            wanted
                            to organize! Organize your event, place the flights, watch them be booked and enjoy real ops
                            the
                            way it should be enjoyed!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card bg-light">
                    <img class="card-img-top img-fluid" src="{{ asset('images/goodies/atc.jpg') }}"
                         alt="Available to Control">
                    <div class="card-body">
                        <h4 class="card-title m-0">Available To Control</h4>
                        <p class="card-text"><span class="badge badge-info badge-pill">Planned</span></p>
                        <p class="card-text">eases your workload when it comes to making your event roster. Figuring out
                            who wants to control what and deciding who actually gets to control what on an event becomes
                            a fun task.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-header">
                        Goal of Simgoodies
                    </div>
                    <div class="card-body">
                        <p class="card-text">Our goal is very simple.</p>
                        <p class="card-text">
                            Create goodies (web apps) that can be used by the (online) flight simulator community.
                        </p>
                        <p class="card-text">
                            The goodies are here to reduce workload so that you can focus more on enjoying!
                        </p>
                    </div>
                </div>

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
                    <form action="{{ route('subscription-request.store') }}" method="post">
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
                            <a class="typeform-share link btn btn-success btn-block text-da"
                               href="https://rolgonzalez.typeform.com/to/CjREly"
                               data-mode="popup"
                               data-hide-headers=true data-hide-footer=true data-submit-close-delay="5" target="_blank">Contact
                                Simgoodies</a>
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
        <div class="row justify-content-center my-2">
            <div class="col-md-3">
                <a href="discord"><img class="img-fluid" src="{{ asset('images/discord-button.png') }}"
                                       alt="Join us on Discord"></a>
            </div>
            <div class="col-md-3 my-auto">
                <a class="github-button" href="https://github.com/simgoodies/simgoodies.app" data-size="large"
                   data-show-count="true" aria-label="Star simgoodies on GitHub">Star on GitHub!</a>
            </div>
        </div>
        <div class="row justify-content-center my-2">
        </div>
        <div class="row justify-content-center my-2">
            <div class="col-md-3">
                <p>simgoodies.app - version {{ config('app.version') }}</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
