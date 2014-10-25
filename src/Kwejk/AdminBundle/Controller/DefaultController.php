<?php

namespace Kwejk\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KwejkAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
