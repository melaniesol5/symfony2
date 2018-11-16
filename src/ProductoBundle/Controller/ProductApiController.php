<?php

namespace ProductoBundle\Controller;

use ProductoBundle\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
class ProductApiController extends Controller
{
	/**
     * @Route("/product/api/product/list", name="Product_api_product_list")
     */
    public function indexAction()
    {
    	$productos=$this->getDoctrine()
    	->getRepository('ProductoBundle:Producto')
    	->findAll();

		$response=new Response();
        $response->headers->add([
        			'Content-Type'=>'application/json'
		]);

        $response->setContent(json_encode($productos));

		return $response;
    }
     /**
     * Creates a new producto entity.
     *
     * @Route("/product/api/product/new", name="Product_api_product_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('ProductoBundle\Form\ProductoApiType', $producto);
        $form->handleRequest($request);

        $response=new Response();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            
        	$response->headers->add([
        			'Content-Type'=>'application/json'
			]);
            
            $response->setContent(json_encode($producto));
            return $response;

        }
        $response->headers->add([
        			'Content-Type'=>'application/json'
			]);
            
            $response->setContent(json_encode($producto));
            return $response;

        
    }

}
