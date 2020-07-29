<?php
    require("head.php");
    $name = $email = $city = $country = $born = "";
    if (isset($_POST["newUser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("functions.php");
        require_once("dbconnect.php");
        $mensaje="";
        //empezamos a validar campos:
        //NOMBRE
        if (empty($_POST["name"])) {
            $mensaje.= "<div class='msg-error'>Nombre no puede estar vacío</div>";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $mensaje.= "<div class='msg-error'>Solo se admiten letras y espacios en blanco.</div>";
            }
        }
        //FNACIMIENTO
        if (empty($_POST["dateborn"])) {
            $mensaje .= "<div class='msg-error'>Debes indicar tu fecha de nacimiento.</div>";
        } else {
            $born = $_POST["dateborn"];
            //calculamos la edad a partir de la fecha de nacimiento
            $edad=calculaEdad($born);
            setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
            if ($edad<18) {
                $mensaje.= "<div class='msg-error'>Debes ser mayor de 18 años para inscribirte.</div>";
            }
        }
        //EMAIL
        if(empty($_POST["email"])){
            $mensaje.="<div class='msg-error'>E-mail es obligatorio.</div>";
        }else{
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensaje.= "<div class='msg-error'>Formato de e-mail no es correcto.</div>";
            }        
        }
        
    }
    
    //si mensaje llega vacío, es que no ha habido errores de validación
    if(isset($mensaje) && $mensaje==""){
        //se guarda el nuevo usuario en la BD:
        $password=genPass();
        $sql = "INSERT INTO users (usname,ussurname,usemail,uspassword,usphone,usdborn,usciid,usactive) VALUES ('".$name."','".$_POST["surname"]."','".$email."','".$password."','".$_POST["phone"]."','".$born."',28,false)";
        if ($connect->query($sql) === TRUE) {
            $mensaje = "<div class='msg-ok'>Se ha creado un nuevo registro en la base de datos.</div>";
            //se le envía el e-mail de activación
            if(sendMail($_POST["email"],$name,"Activa tu cuenta","email_activacion.phtml",$password))
                $mensaje.="<div class='msg-ok'>Mensaje enviado correctamente.</div>";
            else
                $mensaje.="<div class='msg-error'>No se ha podido enviar e-mail. Pruebe de nuevo.</div>";
            //se muestran los resultados
            include_once("register_result.php"); 
        } else {
            $mensaje = "<div class='msg-error'>Error: " . $connect->errno . ". " . $connect->error."</div>";
            include_once("register_form.php");
        }                       
    }else
        include_once("register_form.php");

    require("footer.html");
?>


