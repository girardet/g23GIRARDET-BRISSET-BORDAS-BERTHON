<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
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
	private $libelle_etat;

	/**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="etat")
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

	public function getLibelle_etat()
	{
		return $this->libelle_etat;
	}

	public function setLibelle_etat($libelle_etat)
	{
		$this->libelle_etat = $libelle_etat;
	}

}
