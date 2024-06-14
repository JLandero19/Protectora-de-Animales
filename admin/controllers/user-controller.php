<?php

class UserController {

    public function ctrAll($table) {
        return UserModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return UserModel::mdlWhere($table, $field,  $value);
    }

    public function ctrWhereNotAdmin($table) {
        return UserModel::mdlWhereNotAdmin($table);
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

            if ($check && $check['email'] == $email && $check['password'] == $password && $check['profile'] == "admin") {
                $_SESSION['role_id'] = $check['role_id'];
                $_SESSION['user_id'] = $check['user_id'];
                $_SESSION['dni'] = $check['dni'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $check['name'];
                $_SESSION['lastname'] = $check['lastname'];
                $_SESSION['tlf'] = $check['tlf'];
                $_SESSION['image'] = $check['image'];
                $_SESSION['profile'] = $check['profile'];

                return "<script type='text/javascript'>window.location = 'inicio';</script>";

                // if (isset($check['imagen'])) {
                //     $_SESSION['imagen'] = $check['imagen'];
                // }

                // if ($check['profile'] == 'admin') {
                //     return "<script type='text/javascript'>alert('Has iniciado sesión.'); window.location = 'admin/';</script>";
                // } else {
                //     return "<script type='text/javascript'>alert('Has iniciado sesión.'); window.location = 'inicio';</script>";
                // }
                
            } else {
                $str .= "<div class='alert alert-danger mt-2' role='alert'>El usuario y/o la contraseña son incorrectos.</div>";
                // $str .= "<p style='color: red;'>El usuario o la contraseña son incorrectos.</p>";
            }
        }
        return $str;
    }

    // INSERT - REGISTER
    public function ctrInsertItem($object) {
        $message = "";
        $image = null;

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

                    // Comprueba si se han introducido imagenes
                    if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != null) {
                        $directory = "../views/images/users/";
                        if(!file_exists($directory)){
                            mkdir($directory, 0755);
                        }

                        // Comprueba que los archivos son imagenes en jpeg/jpg || png
                        if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                            
                            $image = microtime()."-".$_FILES['image']['name'];
                            $image = explode(" ", $image);
                            $image = implode("-", $image);
                        } else {
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>El archivo introducido no es imagen.</div>"; 
                        }

                        // Comprueba que no ocupe mas del espacio asignado
                        if ($_FILES['image']['size'] > 2000000) {
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>La imagen supera los 2MB.</div>"; 
                        }

                        if ($message == "") {

                            $image = explode(" ", $image);
                            $image = implode("-", $image);

                            $route = "../views/images/users/".$image;

                            if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod($route, 0777);

                            } else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error con el archivo introducido.</div>";
                            }
                        }
                    }

                    if ($message == "") {
                        // Este Array lo pasamos al modelo para que ejecute la consulta
                        $object = [
                            "email" => $email,
                            "password" => $password
                        ];

                        // Si todo es correcto la inserción se hará satifactoriamente
                        $query = UserModel::mdlInsertItem("roles", $object);

                        if ($query == true) {

                            $searchUser = UserModel::mdlOneWhere('roles', 'email', $email);
                            // var_dump($searchUser);
                            if ($searchUser) {

                                $object2 = [
                                    "name" => $name,
                                    "lastname" => $lastname,
                                    "tlf" => $tlf,
                                    "dni" => $dni,
                                    "image" => $image,
                                    "role_id" => $searchUser['id']
                                ];

                                // var_dump($object);
                                
                                // Si todo es correcto la inserción se hará satifactoriamente
                                $query2 = UserModel::mdlInsertItem("users", $object2);
                
                                if ($query2 == true) {
                                    return "<script type='text/javascript'>alert('Se ha registrado " . $name . " " . $lastname . " con exito.'); window.location = 'users';</script>";
                                }                            
                            }                       

                            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error intentelo de nuevo.</div>";
                        }  
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
    public function ctrUpdateItem($object) {
        $message = "";
        $image = null;

        $role_id = $object['role_id'];
        $user_id = $object['user_id'];

        $name = Validator::filterString($object['name']);
        $lastname = Validator::filterString($object['lastname']);
        $dni = Validator::filterDNI($object['dni']);
        $tlf = Validator::filterTlf($object['tlf']);
        $email = Validator::filterEmail($object['email']);
        if (isset($object['password']) && isset($object['confirm_password']) && $object['password'] != null && $object['confirm_password'] != null) {
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

        if ($message == "") {
            $route = "";
            
            $searchUsers = UserModel::mdlWhere('roles', 'email', $email);
            
            if (count($searchUsers) <= 1) {

                $searchUsers2 = UserModel::mdlWhere('users', 'dni', $dni);

                if (count($searchUsers2) <= 1) {
                    
                    $searchUsers2 = UserModel::mdlOneWhere('users', 'id', $user_id);

                    // Comprueba si se han introducido imagenes
                    if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != null) {
                        $directory = "../views/images/users/";
                        
                        if ($searchUsers2['image'] != null || substr($searchUsers2['image'], 0, 4) != 'http') {
                            unlink("../views/images/users/".$searchUsers2['image']);
                        }
                        
                        if(!file_exists($directory)){
                            mkdir($directory, 0755);
                        }

                        // Comprueba que los archivos son imagenes en jpeg/jpg || png
                        if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png") {
                            
                            $image = microtime()."-".$_FILES['image']['name'];
                            $image = explode(" ", $image);
                            $image = implode("-", $image);
                        } else {
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>El archivo introducido no es imagen.</div>"; 
                        }

                        // Comprueba que no ocupe mas del espacio asignado
                        if ($_FILES['image']['size'] > 2000000) {
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>La imagen supera los 2MB.</div>"; 
                        }

                        if ($message == "") {

                            $image = explode(" ", $image);
                            $image = implode("-", $image);

                            $route = "../views/images/users/".$image;

                            if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod($route, 0777);

                            } else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error con el archivo introducido.</div>";
                            }
                        }
                    }

                    if ($message == "") {
                        // Este Array lo pasamos al modelo para que ejecute la consulta
                        $object = [
                            "email" => $email
                        ];

                        if (isset($password) && $password != null) {
                            $object['password'] = $password;
                        }

                        // Si todo es correcto la inserción se hará satifactoriamente
                        $query = UserModel::mdlUpdateItem("roles", $object, $role_id);

                        if ($query == true) {

                            $searchUser = UserModel::mdlOneWhere('roles', 'email', $email);
                            // var_dump($searchUser);
                            if ($searchUser) {

                                $object2 = [
                                    "name" => $name,
                                    "lastname" => $lastname,
                                    "tlf" => $tlf,
                                    "dni" => $dni,
                                    "role_id" => $searchUser['id']
                                ];

                                if (isset($image) && $image != null) {
                                    $object2['image'] = $image;
                                }

                                // var_dump($object);
                                
                                // Si todo es correcto la inserción se hará satifactoriamente
                                $query2 = UserModel::mdlUpdateItem("users", $object2, $user_id);
                
                                if ($query2 == true) {
                                    return "<script type='text/javascript'>alert('Se ha actualizado el usuario " . $name . " " . $lastname . " con exito.'); window.location = 'users';</script>";
                                }                            
                            }                       

                            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error intentelo de nuevo.</div>";
                        }  
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

    // DELETE
    public function ctrDeleteItem($table, $user_id) {
        $message = "";
        $search = UserModel::mdlOneWhere("users", 'id', $user_id);
        if ($search['image'] != NULL && substr($search['image'], 0, 4) != 'http') {
            unlink("../views/images/users/".$search['image']);
        }

        $query = UserModel::mdlDeleteItem("users", $user_id);
        
        if ($query == true) {

            $query2 = UserModel::mdlDeleteItem("roles", $search['role_id']);

            if ($query2 == true) {
                return "<div class='alert alert-info mt-2' role='alert'>Se ha eliminado el usuario " . $search['name'] . " " . $search['lastname'] . ".</div>";
            }

        }

        $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al eliminar el usuario " . $search['name'] . " " . $search['lastname'] . ".</div>";

        return $message;
    }
}
?>