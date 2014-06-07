<?php

namespace org\Bundle\QuinielaBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuario
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
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Partido", mappedBy="idUsuario")
     * @ORM\JoinColumn(name="Partido_id", referencedColumnName="id")
     */
    private $partidos;

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
     * @return Usuario
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


    public function getPartidos()
    {
        return $this->partidos->toArray();
    }

    public function addPartido(Partido $job)
    {
        if (!$this->partidos->contains($job)) {
            $this->partidos->add($job);
        }

        return $this;
    }

    public function removePartido(Partido $job)
    {
        if ($this->partidos->contains($job)) {
            $this->partidos->removeElement($job);
        }

        return $this;
    }

    /**
     * retrona los puntos del usuario calculados
     *
     * @return integer 
     */
    public function getPuntos(){

        $sumbuffer = 0;

        foreach ($this->partidos as $partido) {
            if($partido->getPuntaje() != null){
                $sumbuffer += $partido->getPuntaje();
            }
        }
        return $sumbuffer;

    }

    public function calcularPuntaje(Usuario $usuario){
       
        foreach ($usuario->getPartidos() as $partidoreal) {
            foreach ($this->partidos as $partido) {
                if($partido->getNumPartido() == $partidoreal->getNumPartido()){
                    $partido->calcularPuntaje($partidoreal);
                }
            }
        }
    }
}
