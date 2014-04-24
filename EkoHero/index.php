<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>EkoHero</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- for Google -->
    <meta name="description" content="Bli en EkoHero, Gå istället" />
    <meta name="keywords" content="eko, hållbarhet, ekologisk, miljö" />

    <meta name="author" content="EkoHero" />
    <meta name="copyright" content="EkoHero" />
    <meta name="application-name" content="EkoHero" />

    <!-- for Facebook -->
    <meta property="og:title" content="EkoHero" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="" /> <!-- TODO -->
    <meta property="og:url" content="http://ekohero.se" />
    <meta property="og:description" content="Jag är en EkoHero, Bli en du med. #EkoHero" />

    <!-- for Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="EkoHero" />
    <meta name="twitter:description" content="Bli en EkoHero, Gå istället" />
    <meta name="twitter:image" content="" /> <!-- TODO -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/ligature-symbols.css" rel="stylesheet">
    <link href="resources/css/font-awesome.css" rel="stylesheet">
    <link href="resources/css/bootstrap-social.css" rel="stylesheet">
    <link href="resources/css/main.css" rel="stylesheet">
    <script src="resources/js/jquery.min.js" type="text/javascript"></script>
    <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="resources/js/main.js" type="text/javascript"></script>
    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true">
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-47143712-4', 'ekohero.se');
      ga('send', 'pageview');
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-1">
                        <a class="logo" href="/">
                            <h1>
                                <span class="glyphicon glyphicon-leaf logo-leaf"></span>
                                EkoHero
                            </h1>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <!-- Start view -->
                    <div class="content" id="start">
                        <p class="lead notice">
                            Knappa in din destination och bli en #EkoHero
                        </p>
                        <form class="form-horizontal">
                            <div class="input-group">
                            <span class="input-group-addon ">
                                <span class="glyphicon glyphicon-map-marker"></span>
                            </span>
                            <input type="text" class="input-lg form-control"
                            id="locationSearch" placeholder="Ange destination" disabled>
                            </div>
                            <button id="go" class="btn btn-lg btn-success btn-block" disabled>
                                Bli en #EkoHero
                            </button>
                        </form>
                    </div>
                    <!-- End start view -->
                    <!-- Result view -->
                    <div class="content" id="result">
                        <div class="co2" id="drivingCO2">
                        </div>
                        <div class="co2" id="transitCO2">
                        </div>
                        <div class="co2" id="bicyclingCO2">
                        </div>
                        <div class="co2" id="walkingCO2">
                        </div>
                        <table class="table details lead">
                            <tr class="current-view" id="driving">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="transit">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="walking">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="bicycling">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <button class="btn btn-lg btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> Dela på Facebook
                        </button>
                        <button
                        class="btn btn-lg btn-block btn-social btn-twitter">
                        <i class="fa fa-twitter"></i> Dela på Twitter
                        #EkoHero</button>
                    </div>
                </div>
                <!-- End result view -->
                <hr>
                <span class="glyphicon glyphicon-heart"></span> 2014 EkoHero
            </div>
        </div>
    </div>
</body>
</html>
