<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QualificationRepository")
 */
class Qualification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
    * @ORM\ManyToOne(targetEntity="TypeProbleme", inversedBy="qualification")
    */
    private $type;

    /**
	* @ORM\Column(type="text", length=20)
	*/
    private $nom_prequalification;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleQualification()
    {
        return $this->nom_prequalification;
    }

    public function setLibelleQualification($nom_prequalification)
    {
        $this->nom_prequalification= $nom_prequalification;
    }
	
	public function get_Type()
    {
        return $this->type;
    }

    public function set_type($type)
    {
        $this->type= $type;
    }
	
}
