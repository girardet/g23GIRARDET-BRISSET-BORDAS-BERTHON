<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne implements UserInterface,UserLoaderInterface,EquatableInterface
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
	* @ORM\Column(type="text", length=255)
	*/
    private $email;

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $username;

    /**
	* @ORM\Column(type="text", length=50)
	*/
    private $password_personne;

	/**
    * @ORM\OneToMany(targetEntity="Statistique", mappedBy="personne")
    */
    private $statistique;

    /**
    * @ORM\OneToMany(targetEntity="Tickets", mappedBy="personne")
    */
    private $ticketsDeposes;

    /**
    * @ORM\OneToMany(targetEntity="Tickets",mappedBy="personneAssignee")
    */
    private $ticketsAssignee;
	
	 /**
    * @ORM\OneToMany(targetEntity="CommenteTicket", mappedBy="personne")
    */
    private $commentaires;
	
	/**
    * @ORM\OneToMany(targetEntity="PersonneATypeProbleme", mappedBy="personne")
    */
    private $competence;
	
	
	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
	
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

    public function getStatut()
	{
		return $this->statut;
	}

	public function setStatut($statut)
	{
		$this->statut = $statut;
	}

	public function getNomPersonne()
	{
		return $this->nom_personne;
	}

	public function setNomPersonne($nom_personne)
	{
		$this->nom_personne = $nom_personne;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getPasswordPersonne()
	{
		return $this->password_personne;
	}
	
	public function getPassword()
	{
		return $this->password_personne;
	}
	
	public function setPasswordPersonne($password_personne)
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
	
	    public function addRole($role) {
        $this->roles[] = $role;
    }
    
    public function removeRole($role) {
        $index = array_search($role, $this->roles, true);
        if ($index !== false) {
            array_splice($this->roles, $index, 1);
        }
    }
	public function getSalt(){
		return null;
	}
	
	public function eraseCredentials() {
        $this->password_personne=null;
    }
	public function loadUserByUsername($username){
    return $this->createQueryBuilder('u')
        ->where('u.username = :username OR u.email = :email')
        ->setParameter('username', $username)
        ->setParameter('email', $username)
        ->getQuery()
        ->getOneOrNullResult();
	}
	public function getRoles()
    {
        return array('ROLE_USER');
    }

	public function isEqualTo(UserInterface $user)
	    {
	        if ($this->password_personne !== $user->getPasswordPersonne()) {
	            return false;
	        }

	        if ($this->username !== $user->getUsername()) {
	            return false;
	        }

	        return true;
	    }

}
