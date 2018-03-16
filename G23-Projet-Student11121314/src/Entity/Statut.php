<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatutRepository")
 */
class Statut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $libelle_statut;

    /**
    * @ORM\OneToMany(targetEntity="Personne", mappedBy="statut")
    */
	private $personne;

	public function getPersonne()
	{
		return $this->personne;
	}

	public function setPersonne($personne)
	{
		$this->personne = $personne;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getLibelle_statut()
	{
		return $this->libelle_statut;
	}

	public function setLibelle_statut($libelle_statut)
	{
		$this->libelle_statut= $libelle_statut;
	}
}
