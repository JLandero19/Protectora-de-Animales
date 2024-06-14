<?php

class AnimalController {

    public function ctrAll($table) {
        return AnimalModel::mdlAll($table);
    }

    public function ctrAnimalsJoinSpecies() {
        return AnimalModel::mdlAnimalsJoinSpecies();
    }


    public function ctrWhere($table, $field, $value) {
        return AnimalModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return AnimalModel::mdlOneWhere($table, $field,  $value);
    }

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";
        $image = null;

        $chip = Validator::filterChipAnimal($object['chip']);
        $name = Validator::filterString($object['name']);
        $race = Validator::filterString($object['race']);
        $description = Validator::filterString($object['description']);
        $sex = Validator::filterString($object['sex']);
        $age = Validator::filterNumberInteger($object['age']);
        $specie_id = $object['specie_id'];

        if (!$name) {
            $message .= "<div class='alert alert-danger'>
                            El nombre introducido no es válido.
                        </div>";
        }

        if (!$chip) {
            $message .= "<div class='alert alert-danger'>
                            El chip introducido no es válido.
                        </div>";
        }

        if (!$race) {
            $message .= "<div class='alert alert-danger'>
                            La raza introducida no es válida.
                        </div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>
                            La descripción introducida no es válida.
                        </div>";
        }

        if (!$sex) {
            $message .= "<div class='alert alert-danger'>
                            El sexo introducido no es válido.
                        </div>";
        }

        if (!$age) {
            $message .= "<div class='alert alert-danger'>
                            La edad introducida no es válida.
                        </div>";
        }        

        if ($message == "") {
            $search = AnimalModel::mdlWhere('animals', 'chip', $chip);

            if (!$search) {
                
                // Comprueba si se han introducido imagenes
                if (isset($_FILES['image']['tmp_name']) &&
                    $_FILES['image']['tmp_name'] != null) {
                    $directory = "../views/images/animals/";
                    if(!file_exists($directory)){
                        mkdir($directory, 0755);
                    }

                    // Comprueba que los archivos son imagenes en jpeg/jpg || png
                    if ($_FILES["image"]["type"] == "image/jpeg" || 
                        $_FILES["image"]["type"] == "image/png") {
                        
                        $image = microtime()."-".$_FILES['image']['name'];
                        $image = explode(" ", $image);
                        $image = implode("-", $image);
                    } else {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                        El archivo introducido no es imagen.
                                    </div>"; 
                    }

                    // Comprueba que no ocupe mas del espacio asignado
                    if ($_FILES['image']['size'] > 2000000) {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                        La imagen supera los 2MB.
                                    </div>"; 
                    }

                    if ($message == "") {

                        $image = explode(" ", $image);
                        $image = implode("-", $image);

                        $route = "../views/images/animals/".$image;

                        if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                            // Cambiamos los permisos del archivo a 777 
                            // para poder modificarlo posteriormente
                            chmod($route, 0777);

                        } else {
                            // Si no se ha podido subir la imagen, 
                            // mostramos un mensaje de error
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                            Ha habido un error con el archivo introducido.
                                        </div>";
                        }
                    }
                }

            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                Ya existe una animal que tiene ese chip.
                            </div>";
            }

            if ($message == "") {

                $object = [
                    "chip" => $chip,
                    "name" => $name,
                    "race" => $race,
                    "description" => $description,
                    "sex" => $sex,
                    "age" => $age,
                    "image" => $image,
                    "specie_id" => $specie_id
                ];
                // Si todo es correcto la inserción se hará satifactoriamente
                $query = AnimalModel::mdlInsertItem($table, $object);

                if ($query == true) {
                    $object3 = [
                        "image" => $image,
                        "category" => "animals",
                        "specie_id" => $specie_id,
                    ];
    
                    $query3 = AnimalModel::mdlInsertItem("gallery", $object3);

                    return "<script type='text/javascript'>
                                alert('Se ha añadido $name con éxito.'); 
                                window.location = 'animals';
                            </script>";
                }
            }
        }

        return $message;
    }

    // INSERT
    public function ctrUpdateItem($table, $object) {
        $message = "";
        $image = null;

        $chip = Validator::filterChipAnimal($object['chip']);
        $name = Validator::filterString($object['name']);
        $race = Validator::filterString($object['race']);
        $description = Validator::filterString($object['description']);
        $sex = Validator::filterString($object['sex']);
        $age = Validator::filterNumberInteger($object['age']);
        $specie_id = Validator::filterNumberInteger($object['specie_id']);
        $id = $object['animal_id'];

        if (!$name) {
            $message .= "<div class='alert alert-danger'>
                            El nombre introducido no es válido.
                        </div>";
        }

        if (!$chip) {
            $message .= "<div class='alert alert-danger'>
                            El chip introducido no es válido.
                        </div>";
        }

        if (!$race) {
            $message .= "<div class='alert alert-danger'>
                            La raza introducida no es válida.
                        </div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>
                            La descripción introducida no es válida.
                        </div>";
        }

        if (!$sex) {
            $message .= "<div class='alert alert-danger'>
                            El sexo introducido no es válido.
                        </div>";
        }

        if (!$age) {
            $message .= "<div class='alert alert-danger'>
                            La edad introducida no es válida.
                        </div>";
        }

        if (!$specie_id) {
            $message .= "<div class='alert alert-danger'>
                            La especie introducida no es válida.
                        </div>";
        }

        if ($message == "") {
            $search = AnimalModel::mdlWhere('animals', 'chip', $chip);
            if (count($search) == 1) {
                // Comprueba si se han introducido imagenes
                if (isset($_FILES['image']['tmp_name']) && 
                    $_FILES['image']['tmp_name'] != null) {
                    
                    $search2 = AnimalModel::mdlOneWhere('animals', 'id', $id);

                    // if ($search2['image'] != null && 
                    //     substr($search2['image'], 0, 4) != 'http') {
                    //     unlink("../views/images/animals/".$search2['image']);
                    // }
                    
                    $directory = "../views/images/animals/";
                    if(!file_exists($directory)){
                        mkdir($directory, 0755);
                    }

                    // Comprueba que los archivos son imagenes en jpeg/jpg || png
                    if ($_FILES["image"]["type"] == "image/jpeg" || 
                        $_FILES["image"]["type"] == "image/png") {
                        
                        $image = microtime()."-".$_FILES['image']['name'];
                        $image = explode(" ", $image);
                        $image = implode("-", $image);
                    } else {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                        El archivo introducido no es imagen.
                                    </div>"; 
                    }

                    // Comprueba que no ocupe mas del espacio asignado
                    if ($_FILES['image']['size'] > 2000000) {
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                        La imagen supera los 2MB.
                                    </div>"; 
                    }

                    if ($message == "") {

                        $image = explode(" ", $image);
                        $image = implode("-", $image);

                        $route = "../views/images/animals/".$image;

                        if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                            // Cambiamos los permisos del archivo a 777 
                            // para poder modificarlo posteriormente
                            chmod($route, 0777);

                        } else {
                            // Si no se ha podido subir la imagen, 
                            // mostramos un mensaje de error
                            $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                            Ha habido un error con el archivo introducido.
                                        </div>";
                        }
                    }
                }

            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>
                                Ya existe una animal que tiene ese chip.
                            </div>";
            }

            if ($message == "") {
                if ($image == null) {
                    $object2 = [
                        "chip" => $chip,
                        "name" => $name,
                        "race" => $race,
                        "description" => $description,
                        "sex" => $sex,
                        "age" => $age,
                        "specie_id" => $specie_id
                    ];
                } else {
                    $object2 = [
                        "chip" => $chip,
                        "name" => $name,
                        "race" => $race,
                        "description" => $description,
                        "sex" => $sex,
                        "age" => $age,
                        "image" => $image,
                        "specie_id" => $specie_id
                    ];
                }
                
                // var_dump($object);
                // Si todo es correcto la inserción se hará satifactoriamente
                $query = AnimalModel::mdlUpdateItem($table, $object2, $id);

                if ($query == true) {
                    return "<script type='text/javascript'>
                                alert('Se ha editado el animal $name con éxito.'); 
                                window.location = 'animals';
                            </script>";
                }
            }
        }

        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $search = AnimalModel::mdlOneWhere($table, 'id', $id);

        // if ($search['image'] != null && substr($search['image'], 0, 4) != 'http') {
        //     unlink("../views/images/animals/".$search['image']);
        // }
        $query = AnimalModel::mdlDeleteItem($table, $id);
        if ($query == true) {
            $message .= "<div class='alert alert-info mt-2' role='alert'>
                            Se ha eliminado el animal " . $search['name'] . ".
                        </div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>
                            Ha habido un error al eliminar al animal " . $search['name'] . ".
                        </div>";
        }

        return $message;
    }
}
?>