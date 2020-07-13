<?php

include('../../libs/panelutils.php');

Connection::testconnection();

include_once('../../libs/user.php');
include_once('../../libs/user_session.php');

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
      header("Location: ../index.php");
    }else{
      echo '<script language="javascript">';
      echo "alert('Nombre de usuario y/o password incorrectos');";
      echo '</script>';
    }
  
  }else{
    header("Location: ../login.php");
}

include('headerpanel.php');

?>

<div class="container">
  <h2>Huespedes</h2>
</div>
<br>

<div class="table-responsive">
    <table class="table table-striped table-hover" style="margin-bottom: 260px;">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Pasaporte</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Pais</th>
        <th scope="col">Fecha de llegada</th>
        <th scope="col">Fecha de salida</th>
        <th scope="col">Habitacion</th>
        <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php GetGuests(); ?>
    </tbody>
    </table>
<div>


<?php include('../footer.php'); ?>