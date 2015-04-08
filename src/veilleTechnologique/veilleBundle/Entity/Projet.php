<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Parameter
	 *
	 * @ORM\Table(name="projet")
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
    * @ORM\Column(type="string", length=30)
    */
    private $projet;
    
    /**
     * @var \Techno
     *
     * @ORM\ManyToOne(targetEntity="Technologie")
     * @ORM\JoinColumns({
     *    @ORM\JoinColumn(name="idTechno", referencedColumnName="id")
     * })
     */
    private $techno;
    
    
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get projet
     *
     * @return string 
     */
    public function getProjet()
    {
        return $this->projet;
    }
    
    /**
     * Set projet
     *
     * @param string $projet
     * @return Parameter
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    }
    
    /**
     * Get techno
     *
     * @return string 
     */
    public function getTechno()
    {
        return $this->techno ;
    }
    
    /**
     * Set techno
     *
     * @param string $techno
     * @return Parameter
     */
    public function setTechno($techno)
    {
        $this->techno = $techno;
    }
    
    
    
    
}

?>
