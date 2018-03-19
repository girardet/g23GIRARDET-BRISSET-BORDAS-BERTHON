<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields


     /**
    * @ORM\Column(type="integer")
    * @ORM\ManyToOne(targetEntity="ManuelProcedure",inversedBy="intervention")
    */
    private $procedure;

    /**
    * @ORM\Column(type="integer")
    * @ORM\ManyToOne(targetEntity="Tickets",inversedBy="intervention")
    */
    private $tickets;


	/**
	* @ORM\Column(type="datetime")
	*/
    private $date_intervention;

    public function getId()
	{
		return $this->id;
	}

    public function getId_procedure()
	{
		return $this->id_procedure;
	}

	public function setId_procedure($id_procedure)
	{
		$this->id_procedure = $id_procedure;
	}

	public function getId_ticket()
	{
		return $this->id_ticket;
	}

	public function setId_ticket($id_ticket)
	{
		$this->id_ticket = $id_ticket;
	}

	public function getType_probleme()
	{
		return $this->typeProbleme;
	}

	public function setType_probleme($typeProbleme)
	{
		$this->typeProbleme = $typeProbleme;
	}

	public function getDate_intervention()
	{
		return $this->date_intervention;
	}

	public function setDate_intervention($date_intervention)
	{
		$this->date_intervention = $date_intervention;
	}

    


}
