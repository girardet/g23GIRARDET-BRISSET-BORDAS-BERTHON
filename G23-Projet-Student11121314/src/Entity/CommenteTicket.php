<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommenteTicketRepository")
 */
class CommenteTicket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
    * @ORM\ManyToOne(targetEntity="Personne", inversedBy="commentaires")
    */
    private $personne;

    /**
    * @ORM\ManyToOne(targetEntity="Tickets", inversedBy="commentaires")
    */
    private $tickets;

     /**
	* @ORM\Column(type="text", length=500)
	*/
    private $texte_commente;

    public function getId_personne()
	{
		return $this->personne;
	}

	public function setId_personne($personne)
	{
		$this->personne = $personne;
	}

	public function getId_tickets()
	{
		return $this->tickets;
	}

	public function setId_tickets($tickets)
	{
		$this->tickets = $tickets;
	}

	public function getTexte_commente()
	{
		return $this->texte_commente;
	}

	public function setTexte_commente($texte_commente)
	{
		$this->texte_commente = $texte_commente;
	}
}
