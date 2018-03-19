<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UrgenceRepository")
 */
class Urgence
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
    private $libelle_urgence;

    /**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="urgence")
    */
	private $tickets;

	public function getTickets()
	{
		return $this->tickets;
	}

	public function setTickets($tickets)
	{
		$this->tickets = $tickets;
	}


	public function getId()
	{
		return $this->id;
	}

	public function getLibelle_urgence()
	{
		return $this->libelle_urgence;
	}

	public function setLibelle_urgence($libelle_urgence)
	{
		$this->libelle_urgence= $libelle_urgence;
	}

}
