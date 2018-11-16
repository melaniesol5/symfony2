<?php

namespace ProductoBundle\Controller;

use ProductoBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class CategoryApiController extends Controller
{
	/**
     * Lists all category entities.
     *
     * @Route("/category/api/category/list", name="category_api_category_list")
     * @Method("GET")
     */
    public function indexAction()
    {
        $categories=$this->getDoctrine()
    	->getRepository('ProductoBundle:Category')
    	->findAll();

       $response=new Response();
        $response->headers->add([
        			'Content-Type'=>'application/json'
		]);

        $response->setContent(json_encode($categories));


		return $response;
    }
    /**
     * Creates a new producto entity.
     *
     * @Route("/category/api/category/new", name="category_api_category_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
    	
        $category = new Category();
        $form = $this->createForm('ProductoBundle\Form\CategoryApiType', $category);
        $form->handleRequest($request);

        $response=new Response();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            
        	$response->headers->add([
        			'Content-Type'=>'application/json'
			]);
            
            $response->setContent(json_encode($category));
            return $response;

        }
        $response->setStatusCode(403);
        $errors=[];
        foreach($form->getErrors() as $error) {
        	$errors[]=$error->getMessage();
        }
        
        
    }

}
