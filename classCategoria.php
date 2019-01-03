<?php 
class categorias {
	private $id_categoria;
	private $nombre_categoria;
	private $baja;
	
    /**
     * @return mixed
     */
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * @return mixed
     */
    public function getNombre_categoria()
    {
        return $this->nombre_categoria;
    }

    /**
     * @return mixed
     */
    public function getBaja()
    {
        return $this->baja;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @param mixed $nombre_categoria
     */
    public function setNombre_categoria($nombre_categoria)
    {
        $this->nombre_categoria = $nombre_categoria;
    }

    /**
     * @param mixed $baja
     */
    public function setBaja($baja)
    {
        $this->baja = $baja;
    }

    public function __toString() {
        return "<tr>".
            "<td>".$this->id_categoria."</td>".
            "<td>".$this->nombre_categoria."</td>".
            "<td>".$this->baja."</td>".
            "<td><a href='gCategorias.php?id_categoria=".$this->id_categoria."'><img src='./images/editar.png' /></a></td>".
            "<td><a href='gCategorias.php?id_categoria=".$this->id_categoria."'><img src='./images/borrar.png' /></a></td>".
            "</tr>";	
    }
	
	
}	
?>
	