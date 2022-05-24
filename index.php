<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?PHP
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: policy");
?>
<!DOCTYPE html>
<html ng-app="pokemon">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="fashionar">
  <meta name="author" content="pokemonWEB">
  <title>pokemonWEB</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.ico" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
      <link rel="stylesheet" href="assets/css/estilos.css" type="text/css">
  <link rel="stylesheet" href="assets/css/argon.css" type="text/css">
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" type="text/css">

  <!--link rel="stylesheet" href="assets/css/spinner.css" type="text/css"-->

  <!--script src="angularjs/angular.min.js"></script-->
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-animate.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.1.2.js"></script>
    <script data-require="angular-route@*" data-semver="1.4.8" src="https://code.angularjs.org/1.4.8/angular-route.js"></script>
    <script src="angularjs/app.js"></script>

  <style>
  .navbar-horizontal.navbar-transparent .navbar-nav .nav-link {
    color: rgba(255, 255, 255, .95);
}
    .navbar-horizontal.navbar-transparent .navbar-nav .nav-link:hover,
    .navbar-horizontal.navbar-transparent .navbar-nav .nav-link:focus
    {
        color: rgba(255, 255, 255, .65);
    }
</style>
</head>

<body class="bg-default"  ng-controller="MainCtrl">
  <!-- Navbar -->
  <!-- Main content -->
  <div class="main-content" style="background-image: url(assets/img/theme/background.login.jpg) !important;
    background-size: cover;
    background-position: top;">
    <!-- Header -->
    <div class="header py-4 py-lg-5 pt-lg-6">
      <div class="container">

      </div>

    </div>
    <!-- Page content -->
    <div class="container pb-6">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="border-0 mb-0">
            <div class="card-header bg-transparent">
              <div class="text-muted text-center mt-2 mb-3"><h1>Pokemon Finder</h1>
                <!--div class="text-center text-muted mb-4"><small>El que quiere Pokemons, que lo busque</small></div-->
              </div>

              <form role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    
                         <input type="text" name="name" ng-model="pokemon.name" typeahead-on-select="selectTypeAhead($item)" uib-typeahead="item.name for item in Pokemons.pokemons | filter:{name:$viewValue}"  typeahead-loading="loading" typeahead-no-results="noResults" class="form-control input-sm" autocomplete="off">
                  </div>
                </div>
              </form>    

         
            </div>

            <div class="card-body px-lg-5 py-lg-5" >
                <div class="spinner-border" role="status" ng-show="cargando">
                  <!--img src="assets/img/icons/common/cargando.gif" style="padding: 0;" alt="imagen header card" class="card-header"-->
                  <span class="sr-only">Loading...</span>
                </div> 
                  <main class="flex">

                      <article class="card" ng-show="showCard">
                        <img src="assets/img/theme/bg-pattern-card.svg" style="padding: 0;" alt="imagen header card" class="card-header">
                        <div class="card-body">
                            <img src="{{pokemon.img}}" alt="{{pokemon.name}}" class="card-body-img">
                            <h1 class="card-body-title">{{pokemon.name}}</h1>
                            <p class="card-body-text">{{pokemon.baseExperience}} exp</p>
                        </div>
                        
                    </article>
                </main>         

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2022 <a href="https://www.linkedin.com/in/andres-galarza-9b08a8183/" class="font-weight-bold ml-1" target="_blank">Andres GalarzAR</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">

              <a href="https://github.com/galand03/pokemonWeb" class="nav-link" target="_blank">WEB GitHub</a>
            </li>
            <li class="nav-item">

              <a href="https://github.com/galand03/pokemonAPI" class="nav-link" target="_blank">API GitHub</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>