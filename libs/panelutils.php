<?php

if(file_exists("../../libs/configx.php")){
    include('../../libs/configx.php');
}

include('../../libs/connection.php');

function GetGuests()
{
    $sql = "Select * from guests";

    $data = Connection::query_arr($sql);
    $num = 0;

    if(count($data) > 0){
        foreach ($data as $guest) {
            $num = $num + 1;
            echo<<<GUEST
            <tr>
                <th scope="row">{$num}</th>
                <td>{$guest['nombre']}</td>
                <td>{$guest['apellido']}</td>
                <td>{$guest['pasaporte']}</td>
                <td>{$guest['correo']}</td>
                <td>{$guest['telefono']}</td>
                <td>{$guest['pais']}</td>
                <td>{$guest['firstdate']}</td>
                <td>{$guest['lastdate']}</td>
                <td>{$guest['room']}</td>
                <td>
                <a href="guestedit.php?guest={$guest['pasaporte']}" class="btn btn-outline-warning">Editar</a>
                <br>
                <a class="btn btn-outline-danger">Eliminar</a>
                </td>
            </tr>
            GUEST;
        }
    }else{
        echo<<<INFO
        <div class="alert alert-info" role="alert">
            Aun no hay huespedes registrados        
        </div>
        INFO;
    }
}
function GetUsers()
{
    $sql = "Select * from users";

    $data = Connection::query_arr($sql);
    $num = 0;

    if(count($data) > 0){
        foreach ($data as $user) {
            $num = $num + 1;
            if ($user['role'] == 1) {
                $role = "Admin";
            }else{
                $role = "Usuario";
            }
            echo<<<USER
            <tr>
                <th scope="row">{$num}</th>
                    <td>{$user['name']}</td>
                    <td>{$user['username']}</td>
                    <td>{$role}</td>
                <td>
                <a href="useredit.php?user={$user['id']}" class="btn btn-outline-warning">Editar</a>
                <a class="btn btn-outline-danger">Eliminar</a>
                </td>
            </tr>
            USER;
        }
    }else{
        echo<<<INFO
        <div class="alert alert-info" role="alert">
            Aun no hay usuarios registrados        
        </div>
        INFO;
    }
}

function Input($id, $label, $value="", $opts=[]){

    $placeholder = "";
    $type = "text";
    $readonly = "";

    if(isset($_POST[$id])){
        $value = $_POST[$id];
    }

    extract($opts);

    if($id == "firstdate"){
        return <<<INPUT
        <div class="form-group">
            <label for="firstdatelabel">Fecha de llegada</label>
            <input required type="{$type}" value="{$value}" class="form-control" id="{$id}" name="{$id}" min="<?php echo(date('Y-m-d')); ?>" onchange="DateInput();">
        </div>
        INPUT;
    }
    else{

        return <<<INPUT
        <div class="form-group">
            <label>{$label}</label>
            <input required {$readonly} type="{$type}" value="{$value}" class="form-control {$id}" id="{$id}" name="{$id}" placeholder="{$placeholder}">
        </div>
        INPUT;
    }
    
}

?>