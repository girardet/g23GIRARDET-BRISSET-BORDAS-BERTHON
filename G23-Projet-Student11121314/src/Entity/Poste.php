<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteRepository")
 */
class Poste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
	* @ORM\Column(type="text", length=20)
	*/
	private $code_poste;

	/**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="poste")
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

	public function getCode_postal()
	{
		return $this->code_poste;
	}

	public function setCode_postal($code_poste)
	{
		$this->code_poste = $code_poste;
	}


}
