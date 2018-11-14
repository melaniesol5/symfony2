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
		
		
		$this->get('app.cart');
		$product=$this->getDoctrine()
		->getRepository('ProductoBundle:Producto')
		->find($id);
		
		//echo json_encode($product);
		//die();
		return $this->render('ProductoBundle:Producto:view.html.twig',
		[
		'producto'=>$product
		]
		);
	}
	/**
     * @Route("/product/cart/add/{id}/quantity/{quantity}", name="Product_add_cart")
     */
	public function addToCartAction($id, $quantity)
	{
		$product=$this->getDoctrine()
		->getRepository('ProductoBundle:Producto')
		->find($id);
		if (null===$product) {
			throw new \Exception("Product not found");
			
		}
		
		 $cartService = $this->get('app.cart');
        $cartService->add($product);
        
		die();
			
	}
	/**
     * @Route("/product/cart/view", name="Product_view_cart")
     */
	public function viewCartAction()
	{
		
		$cartService=$this->get('app.cart');
		$products=$cartService->getAll();
		return $this->render('ProductoBundle:Producto:cart.html.twig',
				[
				'productos'=>$products
				]
        	);	
		
	
		
	}
}
