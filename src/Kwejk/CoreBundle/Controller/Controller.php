<?php

namespace Kwejk\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class Controller extends BaseController
{
    protected function findOr404($repository, $id, $message = "Entity not found")
    {
        $entity = $this->getDoctrine()
            ->getRepository($repository)
            ->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException($message);
        }
        
        return $entity;
    }
    
    protected function addFlash($name, $message)
    {
        $this->get('session')->getFlashBag()
            ->add($name, $message);
    }
    
    protected function persist($entity, $andFlush = true)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        
        if ($andFlush) {
            $em->flush();
        }
    }
    
    protected function remove($entity, $andFlush = true)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        
        if ($andFlush) {
            $em->flush();
        }
    }
}

