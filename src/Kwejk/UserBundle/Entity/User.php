<?php

namespace Kwejk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Mem", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $mems;
    
    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Comment", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Rating", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $ratings;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
