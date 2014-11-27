<?php

namespace User\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
   public function indexAction($name)
{
    die;
    $response = $this->forward('UserPostBundle:Default:index', array(
        'name'  => $name
    ));

    // ... further modify the response or return it directly

    return $response;
}
}