<?php

class PaginationModel {

    public static function mdlAll($table) {
        $sql = Connect::connected()->prepare("SELECT * FROM $table ");
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlAllByPagination($startPage,$num,$table,$order,$field,$value) {
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
        }

        if ($order != NULL) {
            $sql .= " ORDER BY 1 DESC ";
        }
        

        $sql .= " LIMIT $startPage,$num ";
        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $sql->execute(array(':condition' => $value));
        } else {
            $sql->execute();
        }

        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlNumPages($num, $table, $field, $value) {
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
        }

        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $sql->execute(array(':condition' => $value));
        } else {
            $sql->execute();
        }

        $count = $sql->rowCount();

        if ($count % $num != 0) {
            $total = intval($count / $num)+1;
        } else {
            $total = intval($count / $num);
        }

        return $total;
    }

    // Funciones especificas para hacer la pagina de Adopción
    public static function mdlAdoptedPage($startPage,$num,$field,$value,$field2,$value2) {
        // SELECT * FROM animals 
        // WHERE id NOT IN (SELECT animal_id FROM adopted)
        // AND id NOT IN (SELECT animal_id FROM sponsored);
        $object = array();

        $sql = " SELECT * FROM animals ";
        $sql .= " WHERE id NOT IN (SELECT animal_id FROM adopted) ";
        $sql .= " AND id NOT IN (SELECT animal_id FROM sponsored WHERE status LIKE 'Activo') ";
        
        if ($field != NULL && $value != NULL) {
            $sql .= " AND $field LIKE :condition ";
            if ($field2 != NULL && $value2 != NULL) {
                $sql .= " AND $field2 LIKE :condition2 ";
                
            }
        } else {
            if ($field2 != NULL && $value2 != NULL) {
                $sql .= " AND $field2 LIKE :condition2 ";
                
            }
        }

        $sql .= " LIMIT $startPage,$num ";
        
        if ($field != NULL && $value != NULL) {
            $object[":condition"] = $value;
            if ($field2 != NULL && $value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
            }
            $sql = Connect::connected()->prepare($sql);
            $sql->execute($object);
        } else {
            if ($field2 != NULL && $value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $sql = Connect::connected()->prepare($sql);
                $sql->execute($object);
            } else {
                $sql = Connect::connected()->prepare($sql);
                $sql->execute();
            }
        }

        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlNumPagesInAdopted($num,$field,$value,$field2,$value2) {
        // SELECT * FROM animals 
        // WHERE id NOT IN (SELECT animal_id FROM adopted)
        // AND id NOT IN (SELECT animal_id FROM sponsored);
        $object = array();

        $sql = " SELECT * FROM animals ";
        $sql .= " WHERE id NOT IN (SELECT animal_id FROM adopted) ";
        $sql .= " AND id NOT IN (SELECT animal_id FROM sponsored WHERE status LIKE 'Activo') ";

        if ($field != NULL && $value != NULL) {
            $sql .= " AND $field LIKE :condition ";
            if ($field2 != NULL && $value2 != NULL) {
                $sql .= " AND $field2 LIKE :condition2 ";
                
            }
        } else {
            if ($field2 != NULL && $value2 != NULL) {
                $sql .= " AND $field2 LIKE :condition2";
            }
        }

        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $object[":condition"] = $value;
            if ($field2 != NULL && $value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
            }
            $sql->execute($object);
        } else {
            if ($field2 != NULL && $value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $sql->execute($object);
            } else {
                $sql->execute();
            }
        }

        $count = $sql->rowCount();

        if ($count % $num != 0) {
            $total = intval($count / $num)+1;
        } else {
            $total = intval($count / $num);
        }

        return $total;
    }
    // FIN funciones especificas de la página Adopción

    // Funciones especificas para hacer la pagina de Publicación
    public static function mdlAllByPaginationPublication($startPage,$num,$table,$field,$value,$value2,$value3) {
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
            if ($value2 != NULL) {
                $sql .= " AND (title LIKE :condition2 OR description LIKE :condition3) ";
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            } else {
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            }
        } else { 
            if ($value2 != NULL) {
                $sql .= " WHERE (title LIKE :condition2 OR description LIKE :condition3) ";
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            } else {
                if ($value3 != NULL) {
                    $sql .= " WHERE id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            }
        }
        $sql .= " ORDER BY creation_date DESC ";
        $sql .= " LIMIT $startPage,$num ";

        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $object[":condition"] = $value;
            if ($value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $object[":condition3"] = "%".$value2."%";
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                }
            } else {
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                }
            }
            $sql->execute($object);
        } else {
            if ($value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $object[":condition3"] = "%".$value2."%";
                $sql->execute($object);
            } else {
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                    $sql->execute($object);
                } else {
                    $sql->execute();
                }
            }
        }

        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlNumPagesPublication($num, $table, $field, $value, $value2, $value3) {
        // SELECT * 
        // FROM publications_users 
        // WHERE id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE 1)
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
            if ($value2 != NULL) {
                $sql .= " AND (title LIKE :condition2 OR description LIKE :condition3) ";
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            } else {
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            }
        } else { 
            if ($value2 != NULL) {
                $sql .= " WHERE (title LIKE :condition2 OR description LIKE :condition3) ";
                if ($value3 != NULL) {
                    $sql .= " AND id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            } else {
                if ($value3 != NULL) {
                    $sql .= " WHERE id IN (SELECT publication_id FROM tags_publications WHERE tag_id LIKE :condition4) ";
                }
            }
        }
        
        $sql .= " ORDER BY creation_date DESC ";

        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $object[":condition"] = $value;
            if ($value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $object[":condition3"] = "%".$value2."%";
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                }
            } else {
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                }
            }
            $sql->execute($object);
        } else {
            if ($value2 != NULL) {
                $object[":condition2"] = "%".$value2."%";
                $object[":condition3"] = "%".$value2."%";
                $sql->execute($object);
            } else {
                if ($value3 != NULL) {
                    $object[":condition4"] = $value3;
                    $sql->execute($object);
                } else {
                    $sql->execute();
                }
            }
        }

        $count = $sql->rowCount();

        if ($count % $num != 0) {
            $total = intval($count / $num)+1;
        } else {
            $total = intval($count / $num);
        }

        return $total;
    }
    // FIN funciones especificas de la página Publicación

    public static function mdlInitPage($page, $num) {
        if ($page == 1) {
            $start = 0;
            $page = 1;
        } else {
            $start = $page * $num - $num;
        }
        return $start;
    }

    public static function mdlBtnFirst($page) {
        if ($page == 1) {
            $btn = false;
        } else {
            $btn = 1;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=1'>Primero</a></li>";
        }

        return $btn;
    }

    public static function mdlBtnPrevious($page) {
        if ($page == 1) {
            $btn = false;
        } else {
            $page = $page - 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$page."'><i class='fa fa-long-arrow-left'></i> Anterior</a></li>";
        }
    
        return $btn;
    }

    public static function mdlBtnNumbers($nPage) {
        $btns = array();
        // $btns = "";
        if ($nPage < 2) {
            return false;
        }
        for ($i=1; $i <= $nPage; $i++) {
            $btns[] = $i;
            // $btns .= "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=$i'>$i</a></li>";
        }

        return $btns;
    }

    public static function mdlBtnNext($page, $nPage) {
        if ($page == $nPage) {
            // $btn = "";
            $btn = false;
        } else {
            $page = $page + 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$page."'>Siguiente <i class='fa fa-long-arrow-right'></i></a></li>";
        }
    
        return $btn;
    }

    public static function mdlBtnLast($page, $nPage) {
        if ($page == $nPage) {
            // $btn = "";
            $btn = false;
        } else {
            $page = $page + 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$nPage."'>Ultimo</a></li>";
        }
    
        return $btn;
    }
}