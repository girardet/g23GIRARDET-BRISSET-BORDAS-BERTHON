<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneATypeProblemeRepository")
 */
class PersonneATypeProbleme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

	/**
    * @ORM\ManyToOne(targetEntity="TypeProbleme", inversedBy="competence")
    */
    private $typeProbleme;

    /**
    * @ORM\ManyToOne(targetEntity="Personne", inversedBy="competence")
    */
    private $personne;

	public function getId()
	{
		return $this->id;
	}

	public function getType_probleme()
	{
		return $this->typeProbleme;
	}

	public function setType_probleme($typeProbleme)
	{
		$this->typeProbleme = $typeProbleme;
	}

	public function getPersonne()
	{
		return $this->personne;
	}

	public function setPersonne($personne)
	{
		$this->personne = $personne;
	}

}
