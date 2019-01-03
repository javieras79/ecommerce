<?php 
require_once 'categorias.php';

class subcategorias extends categorias {
    
    private $id_subcategoria;
    private $nombre_subcategoria;
    private $baja;
    
    public function __construct($id_categoria,$nombre_categoria,$bajacategoria,$id_subcategoria,$nombre_subcategoria,$baja) {
        
        parent::__construct($id_categoria,$nombre_categoria,$bajacategoria);
        $this->id_subcategoria=$id_subcategoria;
        $this->nombre_subcategoria=$nombre_subcategoria;
        $this->baja=$baja;
    }
    /**
     * @return mixed
     */
    public function getId_subcategoria()
    {
        return $this->id_subcategoria;
    }

    /**
     * @return mixed
     */
    public function getNombre_subcategoria()
    {
        return $this->nombre_subcategoria;
    }

    /**
     * @return Ambigous <unknown, mixed>
     */
    public function getSubBaja()
    {
        return $this->baja;
    }

    /**
     * @param mixed $id_subcategoria
     */
    public function setId_subcategoria($id_subcategoria)
    {
        $this->id_subcategoria = $id_subcategoria;
    }

    /**
     * @param mixed $nombre_subcategoria
     */
    public function setNombre_subcategoria($nombre_subcategoria)
    {
        $this->nombre_subcategoria = $nombre_subcategoria;
    }

    /**
     * @param Ambigous <unknown, mixed> $baja
     */
    public function setSubBaja($baja)
    {
        $this->baja = $baja;
    }

    public function __toString() {
        return "<tr>".
            "<td>".$this->id_subcategoria."</td>".
            "<td>".$this->nombre_subcategoria."</td>".
            "<td>".$this->baja."</td>".
            "<td><a href='gSubCategorias.php?id_subcategoria=".$this->id_subcategoria."'><img src='./images/editar.png' /></a></td>".
            "<td><a href='gSubCategorias.php?id_subcategoria=".$this->id_subcategoria."'><img src='./images/borrar.png' /></a></td>".
            "</tr>";
    }
    
}

?>