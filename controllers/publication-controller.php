<?php

class PublicationController {

    public function ctrAll($table) {
        return PublicationModel::mdlAll($table);
    }

    public function ctrAnimalsJoinPublications() {
        return PublicationModel::mdlAnimalsJoinPublications();
    }

    public function ctrWhere($table, $field, $value) {
        return PublicationModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return PublicationModel::mdlOneWhere($table, $field,  $value);
    }

    public function ctrRecentBlog($table, $num) {
        return PublicationModel::mdlRecentBlog($table, $num);
    }

    public function ctrGalleryPreview($table, $num) {
        return PublicationModel::mdlGalleryPreview($table, $num);
    }

    public function ctrAllGallery($table) {
        return PublicationModel::mdlAllGallery($table);
    }

    public function ctrLastID($table) {
        return PublicationModel::mdlLastID($table);
    }

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";
        $image = null;

        $title = Validator::filterString($object['title']);
        $description = Validator::filterString($object['description']);
        $specie_id = $object['specie_id'];
        $user_id = $_SESSION['user_id'];

        if (!$title) {
            $message .= "<div class='alert alert-danger'>El título introducido no es válido.</div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>La descripción introducida no es válida.</div>";
        }

        if (!$specie_id) {
            $message .= "<div class='alert alert-danger'>La categoría introducida no es válida.</div>";
        }        

        if ($message == "") {

            // Comprueba si se han introducido imagenes
            if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != null) {
                $directory = "views/images/publications/";
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

                    $route = "views/images/publications/".$image;

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

                $object2 = [
                    "title" => $title,
                    "description" => $description,
                    "image" => $image,
                    "specie_id" => $specie_id,
                    "user_id" => $user_id
                ];
                // var_dump($object);
                // Si todo es correcto la inserción se hará satifactoriamente
                $query = PublicationModel::mdlInsertItem($table, $object2);

                

                if ($query == true) {
                    
                    $publication = PublicationModel::mdlLastID($table);

                    foreach ($object['tag_id'] as $key => $value) {
                        $object2 = [
                            "tag_id" => $object['tag_id'][$key],
                            "publication_id" => $publication['id']
                        ];
                        $query = TagModel::mdlInsertItem("tags_publications", $object2);
                    }

                    $object3 = [
                        "image" => $image,
                        "category" => "publications",
                        "specie_id" => $specie_id,
                    ];
    
                    $query3 = PublicationModel::mdlInsertItem("gallery", $object3);

                    return "<script type='text/javascript'>window.location = 'index.php?route=publication-single&publication_id=" . $publication['id'] . "';</script>";
                    // return "<script type='text/javascript'>window.location = 'blog';</script>";
                }
            }
        }

        return $message;
    }

    // UPDATE
    public function ctrUpdateItem($table, $object, $id) {
        $message = "";
        $image = null;

        $title = Validator::filterString($object['title']);
        $description = Validator::filterString($object['description']);
        $specie_id = $object['specie_id'];

        if (!$title) {
            $message .= "<div class='alert alert-danger'>El título introducido no es válido.</div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>La descripción introducida no es válida.</div>";
        }

        if (!$specie_id) {
            $message .= "<div class='alert alert-danger'>La categoría introducida no es válida.</div>";
        }        

        if ($message == "") {

            // Comprueba si se han introducido imagenes
            if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != null) {
                $directory = "views/images/publications/";
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

                    $route = "views/images/publications/".$image;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $route)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod($route, 0777);
                        // if ($object['image_original'] != NULL) {
                        //     unlink("views/images/publications/".$object['image_original']);
                        // }

                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error con el archivo introducido.</div>";
                    }
                }
            }

            if ($message == "") {

                if ($image == null) {
                    $object2 = [
                        "title" => $title,
                        "description" => $description,
                        "specie_id" => $specie_id
                    ];
                } else {
                    $object2 = [
                        "title" => $title,
                        "description" => $description,
                        "image" => $image,
                        "specie_id" => $specie_id
                    ];
                }
                
                // var_dump($object);
                // Si todo es correcto la inserción se hará satifactoriamente
                $query = PublicationModel::mdlUpdateItem($table, $object2, $id);

                if ($query == true) {
                    $tags = TagModel::mdlWhere("tags_publications", "publication_id", $id);

                    foreach ($tags as $tag) {
                        $query = PublicationModel::mdlDeleteItem("tags_publications", $tag['id']);
                    }

                    foreach ($object['tag_id'] as $key => $value) {
                        $object3 = [
                            "tag_id" => $object['tag_id'][$key],
                            "publication_id" => $id
                        ];
                        $query = TagModel::mdlInsertItem("tags_publications", $object3);
                    }

                    return "<script type='text/javascript'>window.location = 'index.php?route=publication-single&publication_id=" . $id . "';</script>";
                    // return "<script type='text/javascript'>window.location = 'blog';</script>";
                }
            }
        }

        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $search = PublicationModel::mdlOneWhere($table, 'id', $id);

        // if ($search['image'] != null || substr($search['image'], 0, 4) != 'http') {
        //     unlink("views/images/publications/".$search['image']);
        // }
        
        $tags = TagModel::mdlWhere("tags_publications", 'publication_id', $id);

        foreach ($tags as $data) {
            TagModel::mdlDeleteItem("tags_publications", $data['id']);
        }

        $query = PublicationModel::mdlDeleteItem($table, $id);
        
        if ($query == true) {
            $message .= "<div class='alert alert-info mt-2' role='alert'>Se ha eliminado publicación " . $search['title'] . ".</div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al eliminar la publicación " . $search['title'] . ".</div>";
        }

        return $message;
    }
}
?>