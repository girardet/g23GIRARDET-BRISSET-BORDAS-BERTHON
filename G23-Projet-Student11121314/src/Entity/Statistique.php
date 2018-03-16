<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatistiqueRepository")
 */
class Statistique
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
    * @ORM\ManyToOne(targetEntity="Personne", inversedBy="statistique")
    */
    private $personne;

    /**
	* @ORM\Column(type="integer")
	*/
    private $forme_statistique;

    /**
	* @ORM\Column(type="text", length=500)
	*/
    private $nom_statistique;

    /**
    * @ORM\OneToMany(targetEntity="ValeurStatistique", mappedBy="statistique")
    */
    private $valeurStatistique;

    
	public function getValeurStatistique()
	{
		return $this->valeurStatistique;
	}

	public function setValeurStatistique($valeurStatistique)
	{
		$this->valeurStatistique = $valeurStatistique;
	}

     public function getId()
	{
		return $this->id;
	}

    public function getId_personne()
	{
		return $this->personne;
	}

	public function setId_personne($personne)
	{
		$this->personne = $personne;
	}

	public function getForme_statistique()
	{
		return $this->forme_statistique;
	}

	public function setForme_statistique($forme_statistique)
	{
		$this->forme_statistique = $forme_statistique;
	}

	public function getNom_statistique()
	{
		return $this->nom_statistique;
	}

	public function setNom_statistique($nom_statistique)
	{
		$this->nom_statistique = $nom_statistique;
	}
}
