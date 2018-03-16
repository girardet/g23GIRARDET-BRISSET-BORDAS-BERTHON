<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeProblemeRepository")
 */
class TypeProbleme
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
	private $libelle_type;

	/**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="type")
    */
	private $tickets;
	
	
	/**
    * @ORM\OneToMany(targetEntity="PersonneATypeProbleme", mappedBy="type")
    */
	private $competence;
	
	
	public function getTickets()
	{
		return $this->tickets;
	}

	public function setTickets($tickets)
	{
		$this->tickets = $tickets;
	}

	private $qualification;

	public function getQualification()
	{
		return $this->qualification;
	}

	public function setQualification($qualification)
	{
		$this->qualification = $qualification;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getLibelle_type()
	{
		return $this->libelle_type;
	}

	public function setLibelle_type($libelle_type)
	{
		$this->libelle_type = $libelle_type;
	}

}
