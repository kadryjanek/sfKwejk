<?php

namespace Kwejk\MemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KwejkMemsBundle:Default:index.html.twig', array('name' => $name));
    }
}
