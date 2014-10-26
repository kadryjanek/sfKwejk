<?php

namespace Kwejk\MemsBundle\Controller;

use Kwejk\MemsBundle\Form\CommentType;
use Kwejk\MemsBundle\Form\AddCommentType;
use Kwejk\MemsBundle\Entity\Comment;
use Kwejk\MemsBundle\Form\AddMemType;
use Kwejk\MemsBundle\Entity\Mem;
use Symfony\Component\HttpFoundation\Request;
use Kwejk\CoreBundle\Controller\Controller;

class MemsController extends Controller
{
    public function listAction($page)
    {
        $mems = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findBy(
                ['isAccepted' => true],
                ['createdAt' => 'desc']
            );
            
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
        $request = $this->getRequest();
        $user = $this->getUser();
        
        $mem = $this->getDoctrine()
            ->getRepository('KwejkMemsBundle:Mem')
            ->findOneBy([
                'slug'          => $slug
            ]);
         
        if (!$mem) {
            throw $this->createNotFoundException('Mem nie istnieje');
        }
        
        $comment = new Comment();
        $form = $this->createForm(new AddCommentType(), $comment);
        
        if ($user && $user->hasRole('ROLE_USER')) {

            $comment->setMem($mem);
            $comment->setCreatedBy($user);
            // TODO: homework
            // $comment->setHost($host);
            // ...
            
            $form->handleRequest($request);
            
            if ($form->isValid()) {
            
                // save data
                $this->persist($comment);
            
                $this->addFlash('notice', "Komentarz został pomyślnie zapisany.");
            
                return $this->redirect($this->generateUrl('kwejk_mems_show', array(
                    'slug' => $mem->getSlug())
                ));
            }
        }
        
        return $this->render('KwejkMemsBundle:Mems:show.html.twig', array(
            'mem'   => $mem,
            'form'  => $form->createView()
        ));    
    }
    
    public function addAction(Request $request)
    {
        $user = $this->getUser();
        
        if (!$user || !$user->hasRole('ROLE_USER')) {
            throw $this->createAccessDeniedException("Nie posiadasz odpowiednich uprawnień!");
        }
        
        $mem = new Mem();
        $mem->setCreatedBy($user);
        
        $form = $this->createForm(new AddMemType(), $mem);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            
            // save data
            $this->persist($mem);
            
            $this->addFlash('notice', "Mem został pomyślnie dodane i oczekuje w poczekalni.");
            
            return $this->redirect($this->generateUrl('kwejk_mems_list'));
        }
        
        
        return $this->render('KwejkMemsBundle:Mems:add.html.twig', array(
            'form'  => $form->createView()
        ));
    }

}
