<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>EkoHero</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
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
                    <div class="col-sm-1 back-btn">
                        <a class="back-btn" href="/EkoHero">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                    </div>
                    <div class="col-sm-7 col-sm-offset-1">
                        <a class="logo" href="/EkoHero">
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
                        <table class="table details">
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
