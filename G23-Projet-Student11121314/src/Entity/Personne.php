<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
    * @ORM\ManyToOne(targetEntity="Statut", inversedBy="personne")
    */
    private $statut;

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $nom_personne;

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $login_personne;

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $password_personne;

	/**
    * @ORM\OneToMany(targetEntity="Statistique", mappedBy="personne")
    */
    private $statistique;

    /**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="tickets")
    */
    private $ticketsDeposes;

    /**
    * @ORM\OneToMany(targetEntity="Tickets",mappedBy="ticketsAssignee")
    */
    private $ticketsAssignes;
	
	 /**
    * @ORM\OneToMany(targetEntity="CommenteTicket", mappedBy="personne")
    */
    private $commentaires;
	
	/**
    * @ORM\OneToMany(targetEntity="PersonneATypeProbleme", mappedBy="personne")
    */
    private $competence;
	
	public function getCompetence()
	{
		return $this->competence;
	}

	public function setCompetence($competence)
	{
		$this->competence = $competence;
	}
	
	public function getCommentaires()
	{
		return $this->commentaires;
	}

	public function setCommentaires($commentaires)
	{
		$this->commentaires = $commentaires;
	}

	public function getStatistique()
	{
		return $this->statistique;
	}

	public function setStatistique($statistique)
	{
		$this->statistique = $statistique;
	}

    public function getId()
	{
		return $this->id;
	}

    public function getId_statut()
	{
		return $this->statut;
	}

	public function setId_statut($statut)
	{
		$this->statut = $statut;
	}

	public function getNom_personne()
	{
		return $this->nom_personne;
	}

	public function setNom_personne($nom_personne)
	{
		$this->nom_personne = $nom_personne;
	}

	public function getLogin_personne()
	{
		return $this->login_personne;
	}

	public function setLogin_personne($login_personne)
	{
		$this->login_personne = $login_personne;
	}

	public function getPassword_personne()
	{
		return $this->password_personne;
	}

	public function setPassword_personne($password_personne)
	{
		$this->password_personne = $password_personne;
	}

	public function getTicketsDeposes()
	{
		return $this->ticketsDeposes;
	}

	public function setTicketsDeposes($ticketsDeposes)
	{
		$this->ticketsDeposes = $ticketsDeposes;
	}

	public function getTicketsAssignes()
	{
		return $this->ticketsAssignes;
	}

	public function setTicketsAssignes($ticketsAssignes)
	{
		$this->ticketsAssignes = $ticketsAssignes;
	}

}
