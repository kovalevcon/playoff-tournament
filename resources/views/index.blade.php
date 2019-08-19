<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Playoff Tournament</title>

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script|Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Istok+Web|Roboto+Condensed:700' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('css/tournament-bracket.css') }}" rel="stylesheet">

    </head>
    <body>
        <header class="hero">
            <div class="hero-wrap">
                <p class="intro" id="intro">Playoff</p>
                <h1 id="headline">Tournament</h1>
                <p class="year"><i class="fa fa-star"></i> 2019 <i class="fa fa-star"></i></p>
                <p>Championship</p>
            </div>
        </header>

        <section id="bracket">
            <div class="container">
                <div class="split split-one">
                    <div class="round round-one current">
                        <div class="round-details">1/8 finals</div>
                        <ul class="matchup" id="match-1">
                            <li class="team team-top">Уругвай<span class="score">2</span></li>
                            <li class="team team-bottom">Португалия<span class="score">1</span></li>
                        </ul>
                        <ul class="matchup" id="match-2">
                            <li class="team team-top">Франция<span class="score">4</span></li>
                            <li class="team team-bottom">Аргентина<span class="score">3</span></li>
                        </ul>
                        <ul class="matchup"  id="match-3">
                            <li class="team team-top">Бразилия<span class="score">2</span></li>
                            <li class="team team-bottom">Мексика<span class="score">0</span></li>
                        </ul>
                        <ul class="matchup" id="match-4">
                            <li class="team team-top">Бельгия<span class="score">3</span></li>
                            <li class="team team-bottom">Япония<span class="score">2</span></li>
                        </ul>
                    </div>

                    <div class="round round-two current">
                        <div class="round-details">1/4 finals</div>
                        <ul class="matchup" id="match-9">
                            <li class="team team-top">Уругвай<span class="score">0</span></li>
                            <li class="team team-bottom">Франция<span class="score">2</span></li>
                        </ul>
                        <ul class="matchup" id="match-10">
                            <li class="team team-top">Бразилия<span class="score">1</span></li>
                            <li class="team team-bottom">Бельгия<span class="score">2</span></li>
                        </ul>
                    </div>

                    <div class="round round-three current">
                        <div class="round-details">1/2 finals</div>
                        <ul class="matchup" id="match-13">
                            <li class="team team-top">Франция<span class="score">1</span></li>
                            <li class="team team-bottom">Бельгия<span class="score">0</span></li>
                        </ul>
                    </div>
                </div>

                <div class="champion">
                    <div class="final current">
                        <i class="fa fa-trophy"></i>
                        <div class="round-details">Final</div>
                        <ul class="matchup" id="match-16">
                            <li class="team team-top">Франция<span class="score">2</span></li>
                            <li class="team team-bottom">Хорватия<span class="score">1</span></li>
                        </ul>

                        <div class="round-details">3rd place</div>
                        <ul class="matchup" id="match-15">
                            <li class="team team-top">Бельгия<span class="score">2</span></li>
                            <li class="team team-bottom">Англия<span class="score">1</span></li>
                        </ul>
                    </div>
                </div>

                <div class="split split-two">
                    <div class="round round-three current">
                        <div class="round-details">1/2 finals</div>
                        <ul class="matchup" id="match-14">
                            <li class="team team-top">Хорватия<span class="score">2</span></li>
                            <li class="team team-bottom">Англия<span class="score">1</span></li>
                        </ul>
                    </div>

                    <div class="round round-two current">
                        <div class="round-details">1/4 finals</div>
                        <ul class="matchup" id="match-13">
                            <li class="team team-top">Россия<span class="score">2</span></li>
                            <li class="team team-bottom">Хорватия<span class="score">2</span></li>
                        </ul>
                        <ul class="matchup">
                            <li class="team team-top">Швеция<span class="score">0</span></li>
                            <li class="team team-bottom">Англия<span class="score">2</span></li>
                        </ul>
                    </div>

                    <div class="round round-one current">
                        <div class="round-details">1/8 finals</div>
                        <ul class="matchup">
                            <li class="team team-top">Испания<span class="score">1</span></li>
                            <li class="team team-bottom">Россия<span class="score">1</span></li>
                        </ul>
                        <ul class="matchup">
                            <li class="team team-top">Хорватия<span class="score">1</span></li>
                            <li class="team team-bottom">Дания<span class="score">1</span></li>
                        </ul>
                        <ul class="matchup">
                            <li class="team team-top">Швеция<span class="score">1</span></li>
                            <li class="team team-bottom">Швейцария<span class="score">0</span></li>
                        </ul>
                        <ul class="matchup">
                            <li class="team team-top">Колумбия<span class="score">1</span></li>
                            <li class="team team-bottom">Англия<span class="score">1</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="share">
            <div class="share-wrap">
                <a class="share-icon" href="https://github.com/kovalevcon"><i class="fa fa-github"></i></a>
                <a class="share-icon" href="tg://resolve?domain=kovalevcon"><i class="fa fa-telegram"></i></a>
                <a class="share-icon" href="mailto:zilich08@gmail.com"><i class="fa fa-envelope"></i></a>
            </div>
        </section>
    </body>
</html>
