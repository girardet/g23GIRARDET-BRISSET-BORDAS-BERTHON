<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChampsRepository")
 */
class Champs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
	* @ORM\Column(type="text", length=200)
	*/
    private $nom_champ;

    /**
    * @ORM\OneToMany(targetEntity="ValeurStatistique", mappedBy="champ1")
    */
    private $valeurStatistique1;

    /**
    * @ORM\OneToMany(targetEntity="ValeurStatistique", mappedBy="champ2")
    */
    private $valeurStatistique2;

    
	public function getValeurStatistique()
	{
		return $this->valeurStatistique1;
	}

	public function setValeurStatistique($valeurStatistique1)
	{
		$this->valeurStatistique1 = $valeurStatistique1;
	}

    
	public function getValeurStatistiqueTS()
	{
		return $this->valeurStatistiqueTS;
	}

	public function setValeurStatistiqueTS($valeurStatistique2)
	{
		$this->valeurStatistique2 = $valeurStatistique2;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getNom_champ()
	{
		return $this->nom_champ;
	}

	public function setNom_champ($nom_champ)
	{
		$this->nom_champ= $nom_champ;
	}


}
