<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/product/list", name="Product_list")
     */
    public function indexAction()
    {
    	$productos=$this->getDoctrine()
    	->getRepository('ProductoBundle:Producto')->findAll();
    	//var_dump($productos);
        return $this->render('ProductoBundle:Default:index.html.twig',
				[
				'productos'=>$productos
				]
        	);
    }
    /**
     * @Route("/product/list/tele", name="Product_list_search")
     */
    public function filterAction()
    {
     /*  $dql_query = $em->createQuery("
    SELECT name, price, stock FROM ProductoBundle:Producto p
    WHERE 
      p.name LIKE '%tele%'
      
");
$result = $dql_query->getResult();
 $this->render('ProductoBundle:Default:index.html.twig', ['productos'=>$result]);
*/return;
    }
}
