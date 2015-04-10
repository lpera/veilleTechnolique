<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liste
 *
 * @ORM\Table(name="liste", indexes={@ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class Liste
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;



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
     * Set name
     *
     * @param string $name
     *
     * @return Liste
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set iduser
     *
     * @param \veilleTechnologique\veilleBundle\Entity\User $iduser
     *
     * @return Liste
     */
    public function setIduser(\veilleTechnologique\veilleBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \veilleTechnologique\veilleBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
