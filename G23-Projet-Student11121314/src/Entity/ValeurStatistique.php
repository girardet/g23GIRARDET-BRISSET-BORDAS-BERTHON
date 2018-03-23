<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValeurStatistiqueRepository")
 */
class ValeurStatistique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
    * @ORM\ManyToOne(targetEntity="Tickets", inversedBy="valeurStatistique")
    */
    private $tickets;

    /**
    * @ORM\ManyToOne(targetEntity="Statistique",inversedBy="valeurStatistique")
    */
    private $statistique;

        /**
    * @ORM\ManyToOne(targetEntity="Champs",inversedBy="valeurStatistique1")
    */
    private $champ1;
        
        /**
    * @ORM\ManyToOne(targetEntity="Champs", inversedBy="valeurStatistique2")
    */
    private $champ2;


    /**
    * @ORM\Column(type="integer")
    */
        
    private $valeur_stat;
        
        
    public function getId()
        {
                return $this->id;
        }

    public function getId_ticket()
        {
                return $this->ticket;
        }

        public function setId_ticket($ticket)
        {
                $this->ticket = $ticket;
        }

        public function getId_statistique()
        {
                return $this->statistique;
        }

        public function setId_statistique($statistique)
        {
                $this->statistique = $statistique;
        }

        public function getId_TS__id_champ()
        {
                return $this->champ1;
        }

        public function setId_TS__id_champ($champ1)
        {
                $this->champ1 = $champ1;
        }

                
        public function getId_champ()
        {
                return $this->champ2;
        }

        public function setId_champ($champ2)
        {
                $this->champ2 = $champ2;
        }
                
                public function getvaleurStat()
        {
                return $this->valeur_stat;
        }

        public function setvaleurStat($valeur_stat)
        {
                $this->valeur_stat = $valeur_stat;
        }

}
