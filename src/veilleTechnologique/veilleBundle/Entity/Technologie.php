<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Parameter
	 *
	 * @ORM\Table(name="technologie")
	 * @ORM\Entity
	 */

class Technologie {
    
    /**
        * @ORM\Id
        * @ORM\Column(type="integer")
        * @ORM\GeneratedValue (strategy="AUTO")
    */
    private $id;
    
    /**
        * @ORM\Column(type="string", length=30)
    */
    private $technologie;
    
    
    
    
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
     * Get technologie
     *
     * @return string 
     */
    public function getTechnologie()
    {
            return $this->technologie;
    }

     /**
     * Set technologie
     *
     * @param string $technologie
     * @return Parameter
     */
    public function setTechnologie($technologie)
    {
            $this->technologie = $technologie;

    }
    
    
}

?>
