<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>EkoHero</title>
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/main.css" rel="stylesheet">
    <script src="resources/js/jquery.min.js" type="text/javascript"></script>
    <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="resources/js/main.js" type="text/javascript"></script>
    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true">
    </script>
    <script>

    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <a class="logo" href="/EkoHero">
                    <h1>
                        <span class="glyphicon glyphicon-leaf logo-leaf"></span>
                        EkoHero
                    </h1>
                </a>
                <!-- Start view -->
                <div class="content" id="start">
                    <p class="lead notice">
                        Random text.
                    </p>
                    <form class="form-horizontal">
                        <div class="input-group">
                        <span class="input-group-addon ">
                            <span class="glyphicon glyphicon-map-marker"></span>
                        </span>
                        <input type="text" class="input-lg form-control"
                        id="locationSearch" placeholder="Till">
                        </div>
                        <button id="go" class="btn btn-lg btn-success btn-block">
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
                    <div class="co2" id="bicycleCO2">
                    </div>
                    <div class="co2" id="walkingCO2">
                    </div>
                    <table class="table details">
                        <tr id="driving">
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
                    <div id="driving" class="row details">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <div id="transit" class="row details">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <div id="bicycling" class="row details">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <div id="walking" class="row details">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
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
