<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Parameter
	 *
	 * @ORM\Table(name="user")
	 * @ORM\Entity
	 */


class Projet {
    
    /**
        * @ORM\Id
        * @ORM\Column(type="integer")
        * @ORM\GeneratedValue (strategy="AUTO")
    */
    private $id;
    
    /**
    * @ORM\Column(type="string", Lenght=30)
    */
    private $projet;
    
    /**
     * @var \Techno
     *
     * @ORM\ManyToOne(targetEntity="Techno")
     * @ORM\JoinColumns({
     *    @ORM\JoinColumn(name="idTechno", referencedColumnName="id")
     * })
     */
    private $techno;
    
    
}

?>
