<?php

namespace Kwejk\MemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MemsController extends Controller
{
    public function listAction()
    {
        $mems = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findBy([
                'isAccepted' => true,
            ]);
        
        return $this->render('KwejkMemsBundle:Mems:list.html.twig', array(
            'mems' => $mems,
        ));    
    }

    public function showAction($slug)
    {
        $mem = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findOneBy([
                'slug' => $slug,
            ]);
         
        if (!$mem) {
            throw $this->createNotFoundException('Mem nie istnieje');
        }
            
        return $this->render('KwejkMemsBundle:Mems:show.html.twig', array(
            'mem' => $mem,
        ));    
    }

}
