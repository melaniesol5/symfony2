<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/add", name="Product_add_cart" )
     */
	public function addToCartAction(Request $r)
	{
		 $id=$r->get('id');
        $quantity=$r->get('quantity');
        $producto= $this->getDoctrine()
        ->getRepository('ProductoBundle:Producto')
        ->find($id);
        if(null===$producto){
            throw new \Exception("Product not found");
        }
        $cartService = $this->get('app.cart');
        $cartService->add($producto); 
            
    }
	/**
     * @Route("/product/cart/view", name="Product_view_cart")
     */
	public function viewCartAction()
	{
		
		$cartService=$this->get('app.cart');
		$items=$cartService->getAll();

		return $this->render('ProductoBundle:Producto:cart.html.twig',
				[
				'cart'=>$items
				]
        	);	
		
	
		
	}

}
