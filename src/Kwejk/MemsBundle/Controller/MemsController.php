<?php

namespace Kwejk\MemsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kwejk\MemsBundle\Form\CommentType;
use Kwejk\MemsBundle\Form\AddCommentType;
use Kwejk\MemsBundle\Entity\Comment;

class MemsController extends Controller
{
    public function listAction($page)
    {
        $mems = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findBy([
                'isAccepted' => true,
            ]);
            
        $paginator  = $this->get('knp_paginator');
        $pages = $paginator->paginate(
                $mems,
                $page,
                5
        );
        
        return $this->render('KwejkMemsBundle:Mems:list.html.twig', array(
            'pages' => $pages,
        ));
    }

    public function showAction($slug)
    {
        $mem = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findOneBy([
                'slug'          => $slug,
                // 'isAccepted'    => true
            ]);
         
        if (!$mem) {
            throw $this->createNotFoundException('Mem nie istnieje');
        }
        
        $comment = new Comment();
        $form = $this->createForm(new AddCommentType(), $comment);
            
        return $this->render('KwejkMemsBundle:Mems:show.html.twig', array(
            'mem'   => $mem,
            'form'  => $form->createView()
        ));    
    }

}
