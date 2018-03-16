<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ManuelProcedureRepository")
 */
class ManuelProcedure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
	* @ORM\Column(type="text", length=100)
	*/
    private $nom_procedure;

    /**
	* @var Intervention
    * @ORM\OneToMany(targetEntity="Intervention",mappedBy="procedure")
    */
    private $intervention;

	public function getId()
	{
		return $this->id;
	}

	public function getNom_procedure()
	{
		return $this->nom_procedure;
	}

	public function setNom_procedure($nom_procedure)
	{
		$this->nom_procedure= $nom_procedure;
	}

	public function getIntervention()
	{
		return $this->intervention;
	}

	public function setIntervention($intervention)
	{
		$this->intervention= $intervention;
	}

}
