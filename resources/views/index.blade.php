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
                    <div class="round round-one">
                        <div class="round-details">1/8 finals</div>
                        @foreach([1, 2, 3, 4] as $key)
                            @if(isset($matches[$key]))
                                <ul class="matchup current" id="match-{{ $key }}">
                                    <li class="team team-top">{{ $matches[$key]['top_team_name'] }}<span class="score">{{ $matches[$key]['top_team_score'] }}</span></li>
                                    <li class="team team-top">{{ $matches[$key]['bottom_team_name'] }}<span class="score">{{ $matches[$key]['bottom_team_score'] }}</span></li>
                                </ul>
                            @else
                                <ul class="matchup" id="match-{{ $key }}">
                                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                </ul>
                            @endif
                        @endforeach
                    </div>

                    <div class="round round-two">
                        <div class="round-details">1/4 finals</div>
                        @foreach([9, 10] as $key)
                            @if(isset($matches[$key]))
                                <ul class="matchup current" id="match-{{ $key }}">
                                    <li class="team team-top">{{ $matches[$key]['top_team_name'] }}<span class="score">{{ $matches[$key]['top_team_score'] }}</span></li>
                                    <li class="team team-top">{{ $matches[$key]['bottom_team_name'] }}<span class="score">{{ $matches[$key]['bottom_team_score'] }}</span></li>
                                </ul>
                            @else
                                <ul class="matchup" id="match-{{ $key }}">
                                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                </ul>
                            @endif
                        @endforeach
                    </div>

                    <div class="round round-three">
                        <div class="round-details">1/2 finals</div>
                        @if(isset($matches[13]))
                            <ul class="matchup current" id="match-13">
                                <li class="team team-top">{{ $matches[13]['top_team_name'] }}<span class="score">{{ $matches[13]['top_team_score'] }}</span></li>
                                <li class="team team-top">{{ $matches[13]['bottom_team_name'] }}<span class="score">{{ $matches[13]['bottom_team_score'] }}</span></li>
                            </ul>
                        @else
                            <ul class="matchup" id="match-13">
                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="champion">
                    <div class="final">
                        <i class="fa fa-trophy"></i>
                        <div class="round-details">Final</div>
                        @if(isset($matches[16]))
                            <ul class="matchup current" id="match-16">
                                <li class="team team-top">{{ $matches[16]['top_team_name'] }}<span class="score">{{ $matches[16]['top_team_score'] }}</span></li>
                                <li class="team team-top">{{ $matches[16]['bottom_team_name'] }}<span class="score">{{ $matches[16]['bottom_team_score'] }}</span></li>
                            </ul>
                        @else
                            <ul class="matchup" id="match-16">
                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                            </ul>
                        @endif

                        <div class="round-details">3rd place</div>
                        @if(isset($matches[15]))
                            <ul class="matchup current" id="match-15">
                                <li class="team team-top">{{ $matches[15]['top_team_name'] }}<span class="score">{{ $matches[15]['top_team_score'] }}</span></li>
                                <li class="team team-top">{{ $matches[15]['bottom_team_name'] }}<span class="score">{{ $matches[15]['bottom_team_score'] }}</span></li>
                            </ul>
                        @else
                            <ul class="matchup" id="match-15">
                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="split split-two">
                    <div class="round round-three">
                        <div class="round-details">1/2 finals</div>
                        @if(isset($matches[14]))
                            <ul class="matchup current" id="match-14">
                                <li class="team team-top">{{ $matches[14]['top_team_name'] }}<span class="score">{{ $matches[14]['top_team_score'] }}</span></li>
                                <li class="team team-top">{{ $matches[14]['bottom_team_name'] }}<span class="score">{{ $matches[14]['bottom_team_score'] }}</span></li>
                            </ul>
                        @else
                            <ul class="matchup" id="match-14">
                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                            </ul>
                        @endif
                    </div>

                    <div class="round round-two">
                        <div class="round-details">1/4 finals</div>
                        @foreach([11, 12] as $key)
                            @if(isset($matches[$key]))
                                <ul class="matchup current" id="match-{{ $key }}">
                                    <li class="team team-top">{{ $matches[$key]['top_team_name'] }}<span class="score">{{ $matches[$key]['top_team_score'] }}</span></li>
                                    <li class="team team-top">{{ $matches[$key]['bottom_team_name'] }}<span class="score">{{ $matches[$key]['bottom_team_score'] }}</span></li>
                                </ul>
                            @else
                                <ul class="matchup" id="match-{{ $key }}">
                                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                </ul>
                            @endif
                        @endforeach
                    </div>

                    <div class="round round-one">
                        <div class="round-details">1/8 finals</div>
                        @foreach([5, 6, 7, 8] as $key)
                            @if(isset($matches[$key]))
                                <ul class="matchup current" id="match-{{ $key }}">
                                    <li class="team team-top">{{ $matches[$key]['top_team_name'] }}<span class="score">{{ $matches[$key]['top_team_score'] }}</span></li>
                                    <li class="team team-top">{{ $matches[$key]['bottom_team_name'] }}<span class="score">{{ $matches[$key]['bottom_team_score'] }}</span></li>
                                </ul>
                            @else
                                <ul class="matchup" id="match-{{ $key }}">
                                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                </ul>
                            @endif
                        @endforeach
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
