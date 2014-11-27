<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($page)
    {
	    $repository = $this->getDoctrine() -> getRepository('BloggerBlogBundle:CallUsers'); 
		
		/*
		$us= $repository -> createQueryBuilder('p')
		    ->leftJoin("p.longCall", "u" )
			->where('u.userName <= :userName')
			->setParameter('userName', 100*$page)
			->orderBy('p.id', 'ASC')
			->getQuery();   
      
      */
    /*
		$us= $repository -> createQueryBuilder('p')
			->where('p.longCall <= :longCall_d')
			->setParameter('longCall_d', 60*$page)
			->orderBy('p.id', 'ASC')
			->getQuery();
		print_r (  	$us->getSQL()   );
		/
		 */
    //$product = $us->getResult();
	//	$product = $us->getArrayResult();
		
		
      
		//echo "<pre>";
   // print_r (  $us->getSql() );
		//print_r (  $product	   );
	//	echo "</pre>"; 
    
    
		//echo $product -> getId();  
    /*
		foreach ( $product  as $key => $value ){
				//print_r (  $value -> getId() ); echo "<br/>";
		}
	  */    
    //print_r ( $this -> getUser() -> getIsActive()  );
        return $this->render('BloggerBlogBundle:Default:index.html.twig', array('name' => $page));
    }
}
