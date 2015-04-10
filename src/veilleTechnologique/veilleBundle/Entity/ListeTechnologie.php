<?php

namespace veilleTechnologique\veilleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListeTechnologie
 *
 * @ORM\Table(name="liste_technologie", indexes={@ORM\Index(name="idListe", columns={"idListe"}), @ORM\Index(name="idTechno", columns={"idTechno"})})
 * @ORM\Entity
 */
class ListeTechnologie
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
     * @var integer
     *
     * @ORM\Column(name="idListe", type="integer", nullable=false)
     */
    private $idliste;

    /**
     * @var integer
     *
     * @ORM\Column(name="idTechno", type="integer", nullable=false)
     */
    private $idtechno;



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
     * Set idliste
     *
     * @param integer $idliste
     *
     * @return ListeTechnologie
     */
    public function setIdliste($idliste)
    {
        $this->idliste = $idliste;

        return $this;
    }

    /**
     * Get idliste
     *
     * @return integer
     */
    public function getIdliste()
    {
        return $this->idliste;
    }

    /**
     * Set idtechno
     *
     * @param integer $idtechno
     *
     * @return ListeTechnologie
     */
    public function setIdtechno($idtechno)
    {
        $this->idtechno = $idtechno;

        return $this;
    }

    /**
     * Get idtechno
     *
     * @return integer
     */
    public function getIdtechno()
    {
        return $this->idtechno;
    }
}
