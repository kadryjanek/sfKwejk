<?php

namespace Kwejk\MemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentController extends Controller
{
    public function newAction()
    {
        return $this->render('KwejkMemsBundle:Comment:new.html.twig', array(
                // ...
            ));    }

    public function editAction($id)
    {
        return $this->render('KwejkMemsBundle:Comment:edit.html.twig', array(
                // ...
            ));    }

}
