<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{
	/**
     * @Route("/product/view/{id}", name="Product_view")
     */
	public function viewAction($id)
	{
		$product=$this->getDoctrine()
		->getRepository('ProductoBundle:Producto')
		->find($id);
		return $this->render('ProductoBundle:Producto:view.html.twig',
		['producto'=>$product]
		
		);
	}
}
