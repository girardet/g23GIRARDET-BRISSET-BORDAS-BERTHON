<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

	/**
    * @ORM\ManyToOne(targetEntity="Etat",inversedBy="tickets")
    */
    private $etat;

    /**
    * @ORM\ManyToOne(targetEntity="TypeProbleme", inversedBy="tickets")
    */
    private $typeProbleme;

    /**
    * @ORM\ManyToOne(targetEntity="Personne", inversedBy="tickets")
    */
    private $personne;

    /**
    * @ORM\ManyToOne(targetEntity="Poste", inversedBy="tickets")
    */
    private $poste;

    /**
    * @ORM\ManyToOne(targetEntity="Personne", inversedBy="ticketsAssignee")
    */
    private $personneAssignee;

    /**
    * @ORM\ManyToOne(targetEntity="Urgence", inversedBy="tickets")
    */
    private $urgence;
	

    /**
    * @ORM\Column(type="datetime")
    */
    private $date_traitement_prevu_ticket;

    /**
	* @ORM\Column(type="text", length=500)
	*/
    private $chemin_piece_jointe_ticket;

    /**
	* @ORM\Column(type="text", length=5000)
	*/
    private $texte_probleme_ticket;

    /**
	* @ORM\Column(type="datetime")
	*/
    private $date_resolution;

    /**
	* @ORM\Column(type="datetime")
	*/
    private $date_creation;


	/**
	* @var Intervention
    * @ORM\OneToMany(targetEntity="Intervention", mappedBy="tickets")
    */
    private $intervention;

	/**
    * @ORM\OneToMany(targetEntity="ValeurStatistique", mappedBy="tickets")
    */
    private $valeurStatistique;

     /**
    * @ORM\OneToMany(targetEntity="CommenteTicket", mappedBy="tickets")
    */
    private $commente_Ticket;

	
	public function getCommente_Ticket()
	{
		return $this->commente_Ticket;
	}

	public function setCommente_Ticket($commente_Ticket)
	{
		$this->commente_Ticket = $commente_Ticket;
	}
	
	public function getValeurStatistique()
	{
		return $this->valeurStatistique;
	}

	public function setIntervention($intervention)
	{
		$this->intervention = $intervention;
	}
	
	
	public function getIntervention()
	{
		return $this->intervention;
	}

	public function setValeurStatistique($valeurStatistique)
	{
		$this->valeurStatistique = $valeurStatistique;
	}
	
    public function getId()
	{
		return $this->id;
	}

    public function getId_etat()
	{
		return $this->etat;
	}

	public function setId_etat($etat)
	{
		$this->etat = $etat;
	}

	public function getId_typeProbleme()
	{
		return $this->typeProbleme;
	}

	public function setId_typeProbleme($typeProbleme)
	{
		$this->typeProbleme = $typeProbleme;
	}

	public function getId_personne()
	{
		return $this->personne;
	}

	public function setId_personne($personne)
	{
		$this->personne = $personne;
	}

	public function getId_poste()
	{
		return $this->poste;
	}

	public function setId_poste($poste)
	{
		$this->poste = $poste;
	}

	public function getId_personneAssignée()
	{
		return $this->personneAssignée;
	}

	public function setId_personneAssignée($personneAssignée)
	{
		$this->personneAssignée = $personneAssignée;
	}

	public function getId_urgence()
	{
		return $this->urgence;
	}

	public function setId_urgence($urgence)
	{
		$this->urgence = $urgence;
	}

	public function getDate_traitement_prevu_ticket()
	{
		return $this->date_traitement_prevu_ticket;
	}

	public function setDate_traitement_prevu_ticket($date_traitement_prevu_ticket)
	{
		$this->date_traitement_prevu_ticket = $date_traitement_prevu_ticket;
	}

	public function getChemin_piece_jointe_ticket()
	{
		return $this->chemin_piece_jointe_ticket;
	}

	public function setChemin_piece_jointe_ticket($chemin_piece_jointe_ticket)
	{
		$this->chemin_piece_jointe_ticket = $chemin_piece_jointe_ticket;
	}

	public function getTexte_probleme_ticket()
	{
		return $this->texte_probleme_ticket;
	}

	public function setTexte_probleme_ticket($texte_probleme_ticket)
	{
		$this->texte_probleme_ticket = $texte_probleme_ticket;
	}

	public function getDate_resolution()
	{
		return $this->date_resolution;
	}

	public function setDate_resolution($date_resolution)
	{
		$this->date_resolution = $date_resolution;
	}

	public function getDate_creation()
	{
		return $this->date_creation;
	}

	public function setDate_creation($date_creation)
	{
		$this->date_creation = $date_creation;
	}
	
	


}
