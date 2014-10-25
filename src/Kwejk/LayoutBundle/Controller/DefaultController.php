<?php

namespace Kwejk\LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KwejkLayoutBundle:Default:index.html.twig', array());
    }
}
