<?php

namespace org\Bundle\QuinielaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="bandera", type="string", length=255)
     */
    private $bandera;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Pais
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNombreCorto(){

        if(strlen($this->nombre)>8){
            return substr ( $this->nombre , 0 ,8 )."...";
        }else{
            return $this->nombre;
        }

    }

    /**
     * Set bandera
     *
     * @param string $bandera
     * @return Pais
     */
    public function setBandera($bandera)
    {
        $this->bandera = $bandera;

        return $this;
    }

    /**
     * Get bandera
     *
     * @return string 
     */
    public function getBandera()
    {
        return $this->bandera;
    }
}
