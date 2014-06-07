<?php

namespace org\Bundle\QuinielaBundle\Controller;

use Org\Bundle\QuinielaBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class InicioController extends Controller
{
    /**
     * @Route("/", name="q_index")
     * @Template()
     */
    public function indexAction()
    {



    	$repository = $this->getDoctrine()->getRepository('orgQuinielaBundle:Usuario');

    	$usuarios = $repository->findAll();    

    	$usuarioMaster = $repository->find(999);


    	foreach ($usuarios as $usuario) {
    		$usuario->calcularPuntaje($usuarioMaster);
    	}

    	usort($usuarios, array($this, "cmp"));

    	return array('usuario' =>$usuarioMaster,'usuarios' =>$usuarios);
    }


    /**
     * @Route("/user/{id}", name="q_user")
     * @Template()
     */
    public function userAction($id)
    {

    	$repository = $this->getDoctrine()->getRepository('orgQuinielaBundle:Usuario');

    	$usuarios = $repository->findAll();

    	$usuarioMaster = $repository->find(999);
    	$usuario = $repository->find($id);
    	$usuario->calcularPuntaje($usuarioMaster);

    	foreach ($usuarios as $usuariotemp) {
    		$usuariotemp->calcularPuntaje($usuarioMaster);
    	}    	

    	usort($usuarios,array($this, "cmp"));

    	return array('usuario' =>$usuario, 'usuarios' =>$usuarios);
    }

    function cmp(Usuario $a,Usuario $b)
    {
    	return $a->getPuntos() < $b->getPuntos();
    }

}
