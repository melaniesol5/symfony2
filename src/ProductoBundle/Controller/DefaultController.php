<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/product/list", name="Product List")
     */
    public function indexAction()
    {
    	$productos=$this->getDoctrine()
    	->getRepository('ProductoBundle:Producto')->findAll();
    	//var_dump($productos);
        return $this->render('ProductoBundle/index.html.twig',
				[
				'productos'=>$productos
				]
        	);
    }
}
