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
		['producto'=>$product]
		
		);
	}
	/**
     * @Route("/product/cart/add/{id}", name="Product_add_cart")
     */
	public function addToCartAction($id)
	{
		$product=$this->getDoctrine()
		->getRepository('ProductoBundle:Producto')
		->find($id);
		if (null===$product) {
			throw new \Exception("Product not found");
			
		}
		
		$this->get('app.cart')->add($product);
		
		return $this->render('ProductoBundle:Producto:view.html.twig',
		['producto'=>$product]);
		
			
	}
	/**
     * @Route("/product/cart/view", name="Product_view_cart")
     */
	public function viewCartAction()
	{
		
		$products=$this->get('app.cart')->all();
			
		 return $this->render('ProductoBundle:Default:index.html.twig',
		['productos'=>$products]
		
		);   
		
	}
}
