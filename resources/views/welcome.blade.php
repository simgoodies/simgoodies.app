<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simgoodies - Let us lift the weight</title>
    <meta name="description" content="Simgoodies builds web apps for the online flight simulator community to reduce workload and increase enjoyment.">
    <meta property="og:title" content="Simgoodies - Let us lift the weight">
    <meta property="og:description" content="Goodies for FIR and ARTCC teams: organize events, simplify planning, and focus on flying.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" href="{{ asset('images/favicon/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

    <script defer src="https://cloud.umami.is/script.js" data-website-id="3b6628fb-3168-4e0c-8287-7dfa03358ae7"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="sg-page" style="--sg-bg-image: url('{{ asset('images/background-wing-landscape.jpg') }}');">
    <div class="sg-shell">
        <header class="sg-hero sg-container">
            <img
                src="{{ asset('images/logo/simgoodies-logo.png') }}"
                alt="Simgoodies logo"
                class="sg-logo"
            >
        </header>

        <main class="sg-container sg-section">
            <section aria-labelledby="goodies-heading">
                <h2 id="goodies-heading" class="sg-heading sg-heading-center">Presents the following goodies</h2>
                <div class="sg-grid">
                    <article class="sg-card">
                        <img
                            src="{{ asset('images/goodies/realops-by-vatgoodies.jpg') }}"
                            alt="Real Ops goodie"
                            class="sg-card-image"
                        >
                        <h3 class="sg-card-title">Real Ops</h3>
                        <p class="sg-card-copy">
                            Allows your FIR / ARTCC to organize the real ops event you always wanted to run.
                            Organize, place flights, monitor booking, and enjoy real ops as it should be.
                        </p>
                        <a href="https://realops.simgoodies.app" class="sg-card-cta" target="_blank" rel="noopener noreferrer" aria-label="Visit Realops">Visit Realops</a>
                    </article>

                    <article class="sg-card">
                        <a href="https://flock.simgoodies.app" target="_blank" rel="noopener noreferrer">
                            <img
                                src="{{ asset('images/goodies/flock.jpg') }}"
                                alt="Flock goodie"
                                class="sg-card-image"
                            >
                        </a>
                        <div class="sg-card-head">
                            <h3 class="sg-card-title">Flock</h3>
                            <p class="sg-status sg-status-live">Just launched</p>
                        </div>
                        <p class="sg-card-copy">
                            Coordinate group flights in seconds with a fast, focused planning experience for
                            pilots, virtual airlines, and streamers.
                        </p>
                        <a href="https://flock.simgoodies.app" class="sg-card-cta" target="_blank" rel="noopener noreferrer" aria-label="Visit Flock">Visit Flock</a>
                    </article>

                    <article class="sg-card">
                        <img
                            src="{{ asset('images/goodies/atc.jpg') }}"
                            alt="Available To Control goodie"
                            class="sg-card-image"
                        >
                        <div class="sg-card-head">
                            <h3 class="sg-card-title">Available To Control</h3>
                            <p class="sg-status sg-status-planned">In development</p>
                        </div>
                        <p class="sg-card-copy">
                            Eases event roster workload by making controller interest and assignment management
                            straightforward and fair.
                        </p>
                    </article>

                </div>
            </section>

            <section class="sg-section" aria-labelledby="goal-heading">
                <h2 id="goal-heading" class="sg-heading sg-heading-center">Goal of Simgoodies</h2>
                <div class="sg-goal-grid">
                    <div>
                        <p class="sg-paragraph">
                            Our goal is very simple: create goodies (web apps) that can be used by the online
                            flight simulator community.
                        </p>
                        <p class="sg-paragraph">
                            The goodies are here to reduce workload so that you can focus more on enjoying.
                        </p>
                    </div>
                    <aside class="sg-social-buttons" aria-label="Simgoodies social links">
                        <a href="{{ url('/discord') }}" class="sg-social-cta" aria-label="Join Simgoodies on Discord">Discord</a>
                        <a href="https://github.com/simgoodies/" class="sg-social-cta" target="_blank" rel="noopener noreferrer" aria-label="Visit Simgoodies on GitHub">GitHub</a>
                    </aside>
                </div>
            </section>
        </main>

    </div>
</body>
</html>
