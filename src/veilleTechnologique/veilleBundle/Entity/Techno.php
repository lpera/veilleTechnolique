<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Parameter
	 *
	 * @ORM\Table(name="user")
	 * @ORM\Entity
	 */

class Techno {
    
    /**
        * @ORM\Id
        * @ORM\Column(type="integer")
        * @ORM\GeneratedValue (strategy="AUTO")
    */
    private $id;
    
    /**
        * @ORM\Column(type="string", Lenght=30)
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
