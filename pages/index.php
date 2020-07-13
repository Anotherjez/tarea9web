<?php

include('header.php');
include('../libs/utils.php');

Connection::testconnection();

include_once('../libs/user.php');
include_once('../libs/user_session.php');

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
  }else if(isset($_POST['username']) && isset($_POST['password'])){
      
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
  
    if ($user->userExists($userForm, $passForm)) {
      $userSession->setCurrentUser($userForm);
      $user->setUser($userForm);
      header("Location:index.php");
    }else{
      echo '<script language="javascript">';
      echo "alert('Nombre de usuario y/o password incorrectos');";
      echo '</script>';
    }
  
  }else{
    header("Location:login.php");
}

?>

<section>
<div id="carouselHome" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active" data-interval="5000">
        <img src="https://www3.hilton.com/resources/main/Property_Photography/HiltonHotels/CZMPCHH/14065995_CZMPCHH-Hilton-Playa-del-Carmen-Central-Garden-Meeting-Setup1_1270x560.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
        <img src="../assets/images/hero2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="https://www3.hilton.com/resources/main/Property_Photography/HiltonHotels/CZMPCHH/14065973_CZMPCHH_Hilton-Playa-del-Carmen-K1JFO-Junior_Suite_Oceanfront_Walk_Out_King_1_1270x560.jpg" class="d-block w-100" alt="...">
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
</section>

<section>
<div class="container">
    <div class="row row-cols-2">
    <div class="col colimg">
        <img src="../assets/images/hero3.jpg" class="img-fluid" alt="Responsive image">

    </div>
    <div class="col">
        <p class="text-center welcome-text">
        <strong>Bienvenido a Hotel Magno</strong>
        <br>
        Con vista a las playas bordeadas de palmeras del mar Caribe, Hilton Playa del Carmen, An All Inclusive Resort, le ofrece una escapada elegante en un resort galardonado con el premio Four Diamond otorgado por la AAA (Asociación Americana del Automóvil). Disfrute de un alojamiento de solo suites, un sinfín de opciones de alimentos y bebidas, y una amplia variedad de servicios y comodidades, ideales para parejas, viajes de incentivo y fiestas de boda. A pasos de la famosa Quinta Avenida, nuestro resort le permite descubrir lo mejor de la Riviera Maya.      
        </p>
    </div>
    </div>
</div>
</section>

<section>
<div class="bgcustomgray" id="roomsCards">
    <div class="container">
    <p class="text-center" style="padding-top: 40px">
        <strong>Rooms & Suites</strong>
    </p>
    <div class="row row-cols-3">
        <div class="col">
        <img src="../assets/images/card2.jpg" class="img-fluid" style="max-height: 200px;" alt="...">
        <h5 class="text-center" style="padding-top: 20px;">Suite</h5>
        </div>
        <div class="col">
        <img src="../assets/images/card3.jpg" class="img-fluid" style="max-height: 200px;" alt="...">
        <h5 class="text-center" style="padding-top: 20px;">Double Room</h5>
        </div>
        <div class="col">
        <img src="../assets/images/card1.jpg" class="img-fluid" style="max-height: 200px;" alt="...">
        <h5 class="text-center" style="padding-top: 20px;">Standard</h5>
        </div>
    </div>
    </div>
</div>
</section>

<section>
<div class="container" style="padding-bottom: 60px; padding-top: 60px;">
    <div class="jumbotron shadow p-3 mb-5">
    <h1 class="display-4">Registrate ahora!</h1>
    <hr class="my-4">
    <a class="btn btn-primary" href="guests.php"><span class="font-weight-bold">Registrarse</span></a>
    </div>
</div>
</section>

<?php include('footer.php');