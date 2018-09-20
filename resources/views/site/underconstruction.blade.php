<!DOCTYPE HTML>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$setting->title }}</title>
    <link rel="shortcut icon" href="{{ url('/' . @$setting->favicon) }}"/>
    <!-- Modernizr -->
    <script src="{{ url('/') }}/site/underconstruction/js/modernizr.js"></script>
    <!-- Open Sans from Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <!-- Main styles file -->
    <link rel="stylesheet" href="{{ url('/') }}/site/underconstruction/css/styles.css" />
    <!-- Icons via Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/site/underconstruction/css/font-awesome.min.css" />

</head>
<body class="color-scheme-neue">
<!-- Animated background -->
<canvas id="bg-canvas"></canvas>
<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: url({{ url('/') }}{{ @$setting->under_construction_image }}) no-repeat center center; background-size: cover;"></div>
<!-- First screen -->
<div class="splash">
    <div class="centered-unit">
        <div class="container">
            <!-- Main header -->
            <h1 style="direction: rtl">{!! @$setting->under_construction_text !!}</h1>
            <!-- Countdown -->
            @if($setting->under_construction_downcount == 1)
            <div class="countdown circled large">
                <!-- Days -->
                <div class="time days">
                    <div class="value">00</div>
                    <div class="unit">Days</div>
                </div>
                <!-- Hours -->
                <div class="time hours">
                    <div class="value">00</div>
                    <div class="unit">Hours</div>
                </div>
                <!-- Minutes -->
                <div class="time minutes">
                    <div class="value">00</div>
                    <div class="unit">Minutes</div>
                </div>
                <!-- Seconds -->
                <div class="time seconds">
                    <div class="value">00</div>
                    <div class="unit">Seconds</div>
                </div>
            </div>
            @endif
            <!-- Countdown end -->
        </div>
    </div>
</div>
<!-- JavaScripts -->
<script src="{{ url('/') }}/site/underconstruction/js/jquery.js"></script>
<script src="{{ url('/') }}/site/underconstruction/js/countdown.js"></script>
<script src="{{ url('/') }}/site/underconstruction/js/bezierCanvas.js"></script>
<script src="{{ url('/') }}/site/underconstruction/js/notifyMe.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // Activate countdownTimer plugin on a '.countdown' element
        $(".countdown").countdownTimer({
            // Set the end date for the countdown
            endTime: new Date("August 10, 2018 00:00:00 UTC+0330")
        });
        // Activate notifyMe plugin on a '#notifyMe' element
        $("#notifyMe").notifyMe();
        // Activate bezierCanvas plugin on a #bg-canvas element
        $("#bg-canvas").bezierCanvas({
            maxStyles: 3,
            maxLines: 80,
            strokeWidth: 0.5,
            lineSpacing: 0.07,
            spacingVariation: 0.07,
            colorBase: {r: 237,g: 28,b: 36},
            colorVariation: {r: 237, g: 28, b: 36},
            moveCenterX: 0,
            moveCenterY: 0,
            delayVariation: 4,
            globalAlpha: 0.4,
            globalSpeed:200,
        });
        // Add handler on 'Scroll down to learn more' link
        $().ready(function(){
            $(".overlap .more").click(function(e){
                e.preventDefault();
                $("body,html").animate({scrollTop: $(window).height()});
            });
        });
    });
</script>
</body>
</html>