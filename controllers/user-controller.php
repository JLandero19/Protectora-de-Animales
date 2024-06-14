<?php

class UserController {

    public function ctrAll($table) {
        return UserModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return UserModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return UserModel::mdlOneWhere($table, $field,  $value);
    }

    // LOGIN
    public function ctrlLoginUserWithEmail($object) {
        $str = "";
        $email = Validator::filterEmail($object['email']);
        $password = Validator::filterPassword($object['password']);

        if (!$email) {
            $str .= "<div class='alert alert-danger'>El email introducido no es válido.</div>";
        }

        if (!$password) {
            $str .= "<div class='alert alert-danger mt-2' role='alert'>La contraseña es requerida.</div>";
        }

        if ($str == "") {
            $check = UserModel::mdlOneWhere("role_users", "email", $email);

            if ($check && $check['email'] == $email && $check['password'] == $password) {
                if ($check['confirm'] == "Aceptado") {
                    $_SESSION['role_id'] = $check['role_id'];
                    $_SESSION['user_id'] = $check['user_id'];
                    $_SESSION['dni'] = $check['dni'];
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $check['name'];
                    $_SESSION['lastname'] = $check['lastname'];
                    $_SESSION['tlf'] = $check['tlf'];
                    $_SESSION['image'] = $check['image'];
                    $_SESSION['profile'] = $check['profile'];
                    
                    if (isset($_SESSION['animal_id'])) {
                        return "<script type='text/javascript'>alert('Has iniciado sesión.'); window.location = 'index.php?route=".$_SESSION['route']."&animal_id=".$_SESSION['animal_id']."';</script>";
                    } elseif (isset($_SESSION['publication_id'])) {
                        return "<script type='text/javascript'>alert('Has iniciado sesión.'); window.location = 'index.php?route=".$_SESSION['route']."&publication_id=".$_SESSION['publication_id']."';</script>";
                    } else {

                        if ($_SESSION['profile'] == 'admin') {
                            return "<script type='text/javascript'>window.location = 'admin/inicio';</script>";
                        }

                        return "<script type='text/javascript'>alert('Has iniciado sesión.'); window.location = 'inicio';</script>";
                    }
                }

                $str .= "<div class='alert alert-danger mt-2' role='alert'>Necesita verificar la cuenta.</div>";

            } else {
                $str .= "<div class='alert alert-danger mt-2' role='alert'>El usuario y/o la contraseña son incorrectos.</div>";
                // $str .= "<p style='color: red;'>El usuario o la contraseña son incorrectos.</p>";
            }
        }
        return $str;
    }

    // INSERT - REGISTER
    public function ctrRegister($object) {
        $message = "";

        $name = Validator::filterString($object['name']);
        $lastname = Validator::filterString($object['lastname']);
        $dni = Validator::filterDNI($object['dni']);
        $tlf = Validator::filterTlf($object['tlf']);
        $email = Validator::filterEmail($object['email']);
        $password = Validator::filterPassword($object['password']);
        $confirm_password = Validator::filterPassword($object['confirm_password']);

        if (!$name) {
            $message .= "<div class='alert alert-danger'>El nombre introducido no es válido.</div>";
        }

        if (!$lastname) {
            $message .= "<div class='alert alert-danger'>El apellido introducido no es válido.</div>";
        }

        if (!$tlf) {
            $message .= "<div class='alert alert-danger'>El número de teléfono introducido no es válido.</div>";
        }

        if (!$dni) {
            $message .= "<div class='alert alert-danger'>El DNI introducido no es válido.</div>";
        }

        if (!$email) {
            $message .= "<div class='alert alert-danger'>El email introducido no es válido.</div>";
        }

        if (!$password || !$confirm_password) {
            $message .= "<div class='alert alert-danger'>La contraseña y confirmar contraseña son requeridas.</div>";
        }

        if ($password != $confirm_password) {
            $message .= "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
        }

        if ($message == "") {
            $route = "";
            
            $searchUsers = UserModel::mdlWhere('roles', 'email', $email);
            
            if (!$searchUsers) {

                $searchUsers = UserModel::mdlWhere('users', 'dni', $dni);

                if (!$searchUsers) {
                    // Este Array lo pasamos al modelo para que ejecute la consulta
                    $object = [
                        "email" => $email,
                        "password" => $password
                    ];

                    // Si todo es correcto la inserción se hará satifactoriamente
                    $query = UserModel::mdlInsertItem("roles", $object);

                    if ($query == true) {

                        $searchUser = UserModel::mdlOneWhere('roles', 'email', $email);

                        if ($searchUser) {
                            $code = FunctionsController::ctrTokenUnique("users","code",20,false);
                            $object2 = [
                                "name" => $name,
                                "lastname" => $lastname,
                                "tlf" => $tlf,
                                "dni" => $dni,
                                "code" => $code,
                                "role_id" => $searchUser['id']
                            ];

                            $query2 = UserModel::mdlInsertItem("users", $object2);

                            if ($query2 == true) {
                                $name_to = $name . " " . $lastname;

                                $send = MailModel::sendMailConfirmation($email, $name_to, $code);

                                return "<script type='text/javascript'>window.location = 'index.php?route=login&code=".$code."';</script>";
                            }
                        }

                        $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error intentelo de nuevo.</div>";
                    }

                } else {
                    $message .= "<div class='alert alert-danger mt-2' role='alert'>Ya hay un usuario registrado con ese DNI.</div>";
                }
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ya hay un usuario registrado con ese Email.</div>";
            }
        }

        return $message;
    }

    // UPDATE
    public function ctrUpdateItem($table, $object, $role_id, $user_id) {
        $message = "";
        $image = null;

        $name = Validator::filterString($object['name']);
        $lastname = Validator::filterString($object['lastname']);
        $dni = Validator::filterDNI($object['dni']);
        $tlf = Validator::filterTlf($object['tlf']);
        $email = Validator::filterEmail($object['email']);

        if ($object['password'] != NULL && $object['confirm_password'] != NULL) {
            $password = Validator::filterPassword($object['password']);
            $confirm_password = Validator::filterPassword($object['confirm_password']);

            if (!$password || !$confirm_password) {
                $message .= "<div class='alert alert-danger'>La contraseña y confirmar contraseña son requeridas.</div>";
            }
    
            if ($password != $confirm_password) {
                $message .= "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
            }
        }        

        if (!$name) {
            $message .= "<div class='alert alert-danger'>El nombre introducido no es válido.</div>";
        }

        if (!$lastname) {
            $message .= "<div class='alert alert-danger'>El apellido introducido no es válido.</div>";
        }

        if (!$tlf) {
            $message .= "<div class='alert alert-danger'>El número de teléfono introducido no es válido.</div>";
        }

        if (!$dni) {
            $message .= "<div class='alert alert-danger'>El DNI introducido no es válido.</div>";
        }

        if (!$email) {
            $message .= "<div class='alert alert-danger'>El email introducido no es válido.</div>";
        }

        if ($message == '') {
            $route = "";
            $users = UserModel::mdlWhere($table, 'email', $email);
            if (count($users) <= 1) {

                // Este Array lo pasamos al modelo para que ejecute la consulta
                if ($object['password'] != NULL && $object['confirm_password'] != NULL) {
                    $object = [
                        "email" => $email,
                        "password" => $password
                    ];
                } else {
                    $object = [
                        "email" => $email
                    ];
                }
                
                // Si todo es correcto la actualizará se hará satifactoriamente
                $query = UserModel::mdlUpdateItem("roles", $object, $role_id);

                // Comprueba si se han introducido imagees
                if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != null) {
                    
                    $directory = "views/images/users/";
                    if(!file_exists($directory)){
                        mkdir($directory, 0755);
                    }

                    $search = UserModel::mdlOneWhere("users", 'id', $user_id);

                    if ($search['image'] != null && substr($search['image'], 0, 4) != 'http') {
                        unlink("views/images/users/" . $search['image']);
                    }

                    // Comprueba que los archivos son imagees en jpeg/jpg || png
                    if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                        $image = microtime()."-".$_FILES['image']['name'];
                        $image = explode(" ", $image);
                        $image = implode("-", $image);
                    } else {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>El archivo introducido no es imagen.</div>"; 
                    }

                    // Comprueba que no ocupe mas del espacio asignado
                    if ($_FILES['image']['size'] > 2000000) {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>La image supera los 2MB.</div>"; 
                    }

                    if ($message == "") {

                        $image = explode(" ", $image);
                        $image = implode("-", $image);

                        $route = "views/images/users/".$image;
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod($route, 0777);
                        } else {
                            //Si no se ha podido subir la image, mostramos un mensaje de error
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error con el archivo introducido.</div>";
                        }
                    }
                }
                if ($message == "") {

                    if ($image != null) {
                        $object2 = [
                            "name" => $name,
                            "lastname" => $lastname,
                            "dni" => $dni,
                            "tlf" => $tlf,
                            "image" => $image
                        ];
                    } else {
                        $object2 = [
                            "name" => $name,
                            "lastname" => $lastname,
                            "dni" => $dni,
                            "tlf" => $tlf
                        ];
                    }

                    // Si todo es correcto la inserción se hará satifactoriamente
                    $query = UserModel::mdlUpdateItem("users", $object2, $user_id);

                    if ($query == true) {
                        $check = UserModel::mdlOneWhere('role_users', 'role_id', $role_id);

                        $_SESSION['role_id'] = $check['role_id'];
                        $_SESSION['user_id'] = $check['user_id'];
                        $_SESSION['dni'] = $check['dni'];
                        $_SESSION['email'] = $check['email'];
                        $_SESSION['name'] = $check['name'];
                        $_SESSION['lastname'] = $check['lastname'];
                        $_SESSION['tlf'] = $check['tlf'];
                        $_SESSION['image'] = $check['image'];
                        $_SESSION['profile'] = $check['profile'];

                        return "<script type='text/javascript'>window.location = 'my-account';</script>";
                    }
                }
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ya existe un usuario con ese nombre.</div>";
            }
        }

        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        return UserModel::mdlDeleteItem($table, $id);
    }

    // INSERT ADOPTIONS
    public function ctrAdopted($table, $object) {
        $message = "";

        $animal_id = $_POST['animal_id'];
        $user_id = $_SESSION['user_id'];
        $name_animal = $_POST['name_animal'];

        $query = UserModel::mdlWhere($table, "animal_id", $animal_id);

        if ($query != true) {
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "animal_id" => $animal_id,
                "user_id" => $user_id
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query2 = UserModel::mdlInsertItem($table, $object);

            if ($query2 == true) {
                $name = $_SESSION['name'] . " " . $_SESSION['lastname'];
                $send = MailModel::sendMailAdopted($_SESSION['email'], $name, $name_animal);
                $_SESSION['success'] = 1;
                return "<script type='text/javascript'>window.location = 'index.php?route=adopted-single&animal_id=".$animal_id."';</script>";
            }
        }

        return "<script type='text/javascript'>alert('No se ha podido adoptar a ".$name_animal.".'); window.history.back();</script>";
    }

    public function ctrConfirmation($object) {
        if (isset($object['code']) && isset($object['verificated'])) {
            $search = UserModel::mdlOneWhere("users", "code", $object['code']);

            if ($search) {

                $object2 = [
                    "code" => $object['code'],
                    "confirm" => "Aceptado"
                ];

                $query = UserModel::mdlUpdateItem("users", $object2, $search['id']);

                if ($query == true) {
                    
                    return "<div class='alert alert-success mt-2' role='alert'>La cuenta de " . $search['name'] . " " . $search['name'] . " ha sido verificada.</div>";
                }
            }
        }

        return "<script type='text/javascript'>window.location = 'login';</script>";
    }

    // INSERT - REGISTER
    public function ctrRememberMeResponse($object, $email) {
        $message = "";

        $password = Validator::filterPassword($object['password']);
        $confirm_password = Validator::filterPassword($object['confirm_password']);

        if (!$password || !$confirm_password) {
            $message .= "<div class='alert alert-danger'>La contraseña y confirmar contraseña son requeridas.</div>";
        }

        if ($password != $confirm_password) {
            $message .= "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
        }

        if ($message == "") {
            $route = "";
            
            $search = UserModel::mdlOneWhere('roles', 'email', $email);

            if ($search) {
                $object = [
                    "password" => $password
                ];

                $query = UserModel::mdlUpdateItem("roles", $object, $search['id']);

                if ($query == true) {
                    $_SESSION['message'] = "<div class='alert alert-success mt-2' role='alert'>Se ha recuperado la contraseña con exito.</div>";
                    return "<script type='text/javascript'>window.location = 'login';</script>";
                }
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>No existe ese usuario en nuestra base de datos.</div>";
            }
        }

        return $message;
    }

    // INSERT SPONSORED
    public function ctrSponsored($table, $object) {
        $message = "";

        $animal_id = $object['animal_id'];
        $user_id = $_SESSION['user_id'];
        
        $animal = AnimalModel::mdlOneWhere("animals", "id", $animal_id);
        // Esto es para sacar la fecha y la ultima hora del día actual
        $date_end = date("Y-m-d H:i:s");

        // Con esto conseguimos sacar la de dentro de 30 días. (Que se va a usar como referente para el proximo pago)
        $date_end = date("Y-m-d H:i:s",strtotime($date_end."+ 30 days"));

        $query = UserModel::mdlWhereSponsored($table, "animal_id", $animal_id);

        if (count($query) == 0) {
            
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "animal_id" => $animal_id,
                "user_id" => $user_id,
                "status" => "Activo",
                "end_date" => $date_end
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query2 = UserModel::mdlInsertItem($table, $object);

            if ($query2 == true) {
                $name_user = $_SESSION['name'] . " " . $_SESSION['lastname'];
                $send = MailModel::sendMailSponsored($_SESSION['email'], $name_user, $animal['name']);
                $_SESSION['success'] = 1;
                return "<script type='text/javascript'>window.location = 'index.php?route=adopted-single&animal_id=".$animal_id."';</script>";
            }
        }

        return "<script type='text/javascript'>alert('No se ha podido apadrinar a ".$animal['name'].".'); window.history.back();</script>";
    }

    // DATE PAYMENT SPONSOR
    public function ctrDatePaymentSponsor() {
        $message = "";

        $current_date = date("Y-m-d H:i:s");
        $last_payment_date = "";
        
        $sponsored = UserModel::mdlWhereSponsored("species_animals_sponsored", "user_id", $_SESSION['user_id']);
        // var_dump($sponsored);
        foreach ($sponsored as $data) {
            $end_date = date("Y-m-d H:i:s",strtotime($data['end_date']));
            $last_payment_date = date("Y-m-d H:i:s",strtotime($data['end_date']."+ 7 days"));

            if ($current_date >= $end_date && $current_date <= $last_payment_date) {
                $message .= "<div class='alert alert-info' role='alert'>";
                $message .= "Tienes que pagar el apadrinamiento de " . $data['name'];
                $message .= ", el plazo es hasta el " . date("d-m-Y",strtotime($last_payment_date));
                $message .= " (Pasada la fecha dejara de estar apadrinado)";
                // $message .= "El siguiente enlace lleva al sitio para abonar el importe. <a href='#'><b>Haz click aqui para pagar</b></a>";
                $message .= "</div>";
            } else {
                if ($current_date > $last_payment_date) {
                    $object2 = [
                        "status" => "Cancelado"
                    ];

                    $query3 = UserModel::mdlUpdateItem("sponsored", $object2, $data['sponsored_id']);
                }
            }
        }

        return $message;
    }

    // DATE PAYMENT SPONSOR
    public function ctrCancelSponsor($table, $id) {
        
        $search = UserModel::mdlOneWhere('species_animals_sponsored', 'sponsored_id', $id);

        $object = [
            "status" => "Cancelado"
        ];

        $query = UserModel::mdlUpdateItem("sponsored", $object, $id);

        if ($query == true) {
            return "<div class='alert alert-info' role='alert'>Se ha cancelado el apadrinamiento del animal " . $search['name'] . " </div>";
        }
    }
}
?>