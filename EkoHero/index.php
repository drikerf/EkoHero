<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>EkoHero</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
                                <td></td>
                            </tr>
                            <tr id="transit">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="walking">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr id="bicycling">
                                <td></td>
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
                        </button>
                    </div>
                </div>
                <!-- End result view -->
                <!-- About view -->
                <div class="content" id="about">
<h1>#EkoVad?</h1>
<p>
EkoHero är en reseplanerare som på ett enkelt och illustrativt sätt uppmuntrar människor att göra klimatsmarta val i vardagen. Applikationen är utvecklad av fyra studenter på Datateknikprogrammet på Kungliga Tekniska högskolan för kursen <a href="https://www.kth.se/social/course/AG1814" target="blank">Hållbar utveckling för datatenik</a>.
</p>

<p>
<h4>Vad mäter reseplaneraren?</h4>
För varje vald resa presenterar reseplaneraren den tid det tar för användaren att förflytta sig från aktuella position till vald destination. Tiden för varje resa beräknas med hjälp av <a href="https://www.google.com/maps">Google Maps</a> och varierar beroende på vilket färdmedel användaren väljer. Den tar ingen hänsyn till eventuella trafikhinder, naturkatastrofer eller tid att hitta parkering. Reseplaneraren redovisar förutom restid koldioxidutsläpp i antal kilogram per resa. För att lättare förstå omfattningen symboliseras utsläppen också med olika livsmedel, så som antal morötter eller portioner ris. Utsläppen från livsmedlena beräknas med hjälp av <a href="http://carbon.to" target="blank">Carbon.to</a> och räknar energitillförseln i MJ (Megajoule) under hela livscykeln och översätter dem till koldioxidutsläpp. För varje resa kan användaren också välja att få upp en anpassad karta över den aktuella resan geno,m att klicka på kompass-ikonen längst till höger.
</p>

<p>
<h4>Dela dina hjältedåd</h4>
När du knappat in din destination och blivit en EkoHero kan du dela ditt hjältedåd på Facebook och Twitter. När du klickar på någon av dela-knapparna dyker en förinställd text upp som presenterar din utsläppsbesparing i form av olika livsmedel. Du kan låta denna text stå kvar eller modifiera den om du så vill.
</p>

<p>
<h4>Hur kan EkoHero bidra till att främja ett hållbart vardagsliv för stadsbor?</h4>
EkoHero kan användas för att främja ett hållbart vardagsliv för stadsbor genom att på ett enkelt och illustrativt sätt uppmuntra användare att göra klimatsmarta val i vardagen. Genom att öka medvetenheten hos människor kan EkoHero hjälpa dem att fatta kloka beslut ur miljösynpunkt. Trafikläget i Stockholm har under de senaste åren försämrats och det tar idag ofta längre tid att ta bilen än att åka kollektivt eller cykla. I Stockholm finns idag en utbyggd och relativt bra fungerande kollektivtrafik, men det finns också stora möjligheter att gå och cykla i hela Stor Stockholm. EkoHero visualiserar hur stora utsläppen är på ett sätt som gör det lätt för den oinsatte att sätta mängden koldioxidutsläpp i ett perspektiv, och även tidsskillnaderna mellan olika färdmedel. Med EkoHero så är det helt enkelt lättare för människor att fatta kloka beslut och bli EkoHjältar. De kan sedan dela med sig av sina hjältedåd och uppmana andra att göra samma sak. 
</p>

<p>
<h4>Hur stor bedömer vi att nyttan är?</h4>
EkoHero kan inte själv rädda planeten men vi kan genom ökad medvetenhet få människor att ändra sina vanor och det är just vanorna som behöver ändras för att vi ska kunna uppnå  en hållbar utveckling. Om bara ett fåtal personer ändrar sina vanor och börjar cykla eller gå regelbundna sträckor, eller bara väljer att gå en solig vårdag har vi tagit ett stort steg mot en hållbar utveckling För den analyserande användaren kan jämförelserna mellan koldioxidutsläpp och livsmedel även medföra nya insikter om människans val gällande miljöpåverkan. Dessa nya insikter kan få en att börja titta på andra vanor och val i vardagen, såsom inköp av ekologiska livsmedel, minska mängden matsvinn och elanvändning.

I dag har sociala medier stor inverkan på människors livsstil och möjligheten att dela sina hjältedåd på Facebook och Twitter underlättar för andra människor att göra klimatsmarta val och på så sätt öka nyttan. Just Facebook och Twitter är två medier för att visa sig duktig och när man ser andra personers smarta val i vardagen och på helgen så triggas man själv till att vara lika duktig, om inte bättre. Givetvis kan man även använda hashtagen #EkoHero på andra sociala medier som till exempel Instagram.

I dagsläget fungerar applikationen endast i Sverige, vilket gör att dess nytta inte kan bedömas som allt för stor. Förhoppningen är att EkoHero kommer att få ett stort genombrott i Sverige och på så vis inspirera andra internationellt som då kan ta efter konceptet.
</p>
                </div>
                <!-- End about view. -->
                <hr>
                <span class="glyphicon glyphicon-heart"></span> 2014 EkoHero - <a href="#" id="aboutLink">Om</a>
            </div>
        </div>
    </div>
</body>
</html>
