<?php

namespace org\Bundle\QuinielaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partido
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Partido
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
     * @var integer
     *
     * @ORM\Column(name="numPartido", type="smallint")
     */
    private $numPartido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="id")
     * @ORM\JoinColumn(name="PaisHome", referencedColumnName="id")
     */
    private $paisHome;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="id")
     * @ORM\JoinColumn(name="PaisVist", referencedColumnName="id")
     */
    private $paisVisitante;

    /**
     * @var integer
     *
     * @ORM\Column(name="home_score", type="smallint")
     */
    private $homeScore;

    /**
     * @var integer
     *
     * @ORM\Column(name="vist_score", type="smallint")
     */
    private $vistScore;

    /**
     * @var integer
     *
     * @ORM\Column(name="home_penal", type="smallint")
     */
    private $homePenal;

    /**
     * @var integer
     *
     * @ORM\Column(name="vist_penal", type="smallint")
     */
    private $vistPenal;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="id")
     * @ORM\JoinColumn(name="Usuario", referencedColumnName="id")
     */
    private $idUsuario;

    /**
     * @var boolean
     *
     * @ORM\Column(name="jugado", type="boolean")
     */
    private $jugado;

    private $realVisitante;

    private $realHome;

    private $puntaje;

    private $color;

    public function getColor(){
        if(!$this->jugado){
            return "#eee";
        }

        return $this->color;
    }

    public function getRealHome(){
        if(!$this->jugado){
            return "-";
        }
        return $this->realHome;
    }

    public function getRealVisitante(){
        if(!$this->jugado){
            return "-";
        }
        return $this->realVisitante;
    }

    public function getPuntaje(){

        if(!$this->jugado){
            return 0;
        }
        return $this->puntaje;
    }

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
     * Set numPartido
     *
     * @param integer $numPartido
     * @return Partido
     */
    public function setNumPartido($numPartido)
    {
        $this->numPartido = $numPartido;

        return $this;
    }

    /**
     * Get numPartido
     *
     * @return integer 
     */
    public function getNumPartido()
    {
        return $this->numPartido;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Partido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set paisHome
     *
     * @param \stdClass $paisHome
     * @return Partido
     */
    public function setPaisHome($paisHome)
    {
        $this->paisHome = $paisHome;

        return $this;
    }

    /**
     * Get paisHome
     *
     * @return \stdClass 
     */
    public function getPaisHome()
    {
        return $this->paisHome;
    }

    /**
     * Set paisVisitante
     *
     * @param \stdClass $paisVisitante
     * @return Partido
     */
    public function setPaisVisitante($paisVisitante)
    {
        $this->paisVisitante = $paisVisitante;

        return $this;
    }

    /**
     * Get paisVisitante
     *
     * @return \stdClass 
     */
    public function getPaisVisitante()
    {
        return $this->paisVisitante;
    }

    /**
     * Set homeScore
     *
     * @param integer $homeScore
     * @return Partido
     */
    public function setHomeScore($homeScore)
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    
    public function getHomeScore2()
    {
        return $this->homeScore ;
    }

      public function getVistScore2()
    {
   
        return $this->vistScore;
    }

    public function getHomeScore()
    {
        if(!$this->jugado){
            return "-";
        }

        return $this->homeScore ;
    }

    /**
     * Set vistScore
     *
     * @param integer $vistScore
     * @return Partido
     */
    public function setVistScore($vistScore)
    {
        $this->vistScore = $vistScore;

        return $this;
    }

    /**
     * Get vistScore
     *
     * @return integer 
     */
    public function getVistScore()
    {
        if(!$this->jugado){
            return "-";
        }
        return $this->vistScore;
    }

    /**
     * Set homePenal
     *
     * @param integer $homePenal
     * @return Partido
     */
    public function setHomePenal($homePenal)
    {

        $this->homePenal = $homePenal;

        return $this;
    }

    /**
     * Get homePenal
     *
     * @return integer 
     */
    public function getHomePenal()
    {
       if(!$this->jugado){
        return "(-)";
    }
    return "("+$this->homePenal+")";
}

    /**
     * Set vistPenal
     *
     * @param integer $vistPenal
     * @return Partido
     */
    public function setVistPenal($vistPenal)
    {

        $this->vistPenal = $vistPenal;

        return $this;
    }

    /**
     * Get vistPenal
     *
     * @return integer 
     */
    public function getVistPenal()
    {
       if(!$this->jugado){
        return "(-)";
    }
    return "("+$this->vistPenal+")";
}

    /**
     * Set idUsuario
     *
     * @param \stdClass $idUsuario
     * @return Partido
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \stdClass 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getJugado()
    {
        return $this->jugado;
    }


    public function calcularPuntaje(Partido $partido){
        if($this->paisVisitante == $partido->paisVisitante ||
           $this->paisHome == $partido->paisHome){
            $this->realVisitante = $partido->vistScore;
        $this->realHome = $partido->homeScore;
        $this->jugado = $partido->jugado;
        $this->fecha = $partido->fecha;

        if($partido->homeScore == $this->homeScore && 
         $partido->vistScore == $this->vistScore){
            $this->puntaje = 3;
            $this->color = "#3EA99F";
    }else if(($partido->homeScore > $partido->vistScore && 
     $this->homeScore > $this->vistScore) || ($partido->homeScore < $partido->vistScore && 
     $this->homeScore < $this->vistScore)){
        $this->puntaje = 1;
        $this->color = "#FFF380";
    }else if($partido->homeScore == $partido->vistScore && 
      $this->homeScore == $this->vistScore){
        $this->puntaje = 1;
        $this->color = "#FFF380";
    }else {
        $this->color = "#E77471";
        $this->puntaje =0;
    }


}
}

}
