<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
	
	/**
	 * Parameter
	 *
	 * @ORM\Table(name="user")
	 * @ORM\Entity
	 */

class User {
    /**
        * @ORM\Id
        * @ORM\Column(type="integer")
        * @ORM\GeneratedValue (strategy="AUTO")
    */
    private $id;

    /**
    * @ORM\Column(type="string", length=30)
    */
    private $login;

    /**
    * @ORM\Column(type="string", length=16)
    */
    private $pass;

    /**
    * @ORM\Column(type="string", length=50)
    */
    private $email;




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
     * Get pass
     *
     * @return string 
     */
    public function getLogin()
    {
            return $this->login;
    }

     /**
     * Set login
     *
     * @param string $login
     * @return Parameter
     */
    public function setLogin($login)
    {
            $this->login = $login;

    }
    
    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
            return $this->pass;
    }

     /**
     * Set pass
     *
     * @param string $pass
     * @return Parameter
     */
    public function setPass($pass)
    {
            $this->pass = $pass;

    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
            return $this->email;
    }

     /**
     * Set email
     *
     * @param string $email
     * @return Parameter
     */
    public function setEmail($email)
    {
            $this->email = $email;
    }
	
}

?>
