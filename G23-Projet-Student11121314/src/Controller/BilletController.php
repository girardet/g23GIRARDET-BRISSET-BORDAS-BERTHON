<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Personne;
use App\Entity\Tickets;
use App\Entity\Urgence;
use App\Entity\Poste;
use App\Entity\Etat;
use App\Entity\TypeProbleme;
use App\Entity\Qualification;
use App\Entity\Statut;
	/**
    * @Route("/billet") //add this comment to annotations
	*/

class BilletController extends Controller
{
	

	
	/**
     * @Route("/addPoste", name="billet.postage") 
     */
	 public function addPoste()
    {
    	$em = $this->getDoctrine()->getManager();
    	$urgence = new Statut();
		$urgence->setLibelle_statut("Client");
		
		$urgence1 = new Statut();
		$urgence1->setLibelle_statut("Opérateur");
		
		$urgence2 = new Statut();
		$urgence2->setLibelle_statut("Chef de Service");
		
         $em->persist($urgence);
		 $em->persist($urgence1);
		 $em->persist($urgence2);
         $em->flush();
    }
	
    /**
     * @Route("/accueil/{id}", name="billet.accueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirMesBillets(Personne $personne,Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Tickets::class)->where('id_personne = $personne->id');
				$etats = $em->getRepository(Etat::class)->findAll();
    	$urgences = $em->getRepository(Urgence::class)->findAll();

    	$form = $this->createFormBuilder()
    	->add("name", TextType::class)
    	 ->add("date1", DateType::class, [
        "widget" => "single_text"
    	])
    	 ->add("date2", DateType::class, [
        "widget" => "single_text"
    	])
		
    	->add("etat", EntityType::class, array(
    		'class' => Etat::class,
			'choice_label' => 'libelle_etat',
    	))
    	->add("urgence", EntityType::class, array(
    		'class' => Urgence::class,
			'choice_label' => 'libelle_urgence',
    	))
    	->add("recherche", SubmitType::class, ["label" => "Changer urgence"])
    	->getForm();
		
	  $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();

	  }
        return ["form" => $form->createView(),"billets" => $billets];
    }

    /**
     * @Route("/tous/lesbillets", name="billet.tousbilletsaccueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirTousLesBillets(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Tickets::class)->findAll();
		$etats = $em->getRepository(Etat::class)->findAll();
    	$urgences = $em->getRepository(Urgence::class)->findAll();

    	$form = $this->createFormBuilder()
    	->add("name", TextType::class)
    	 ->add("date1", DateType::class, [
        "widget" => "single_text"
    	])
    	 ->add("date2", DateType::class, [
        "widget" => "single_text"
    	])
		
		->add("nomoperateur", TextType::class)
		
    	->add("etat", EntityType::class, array(
    		'class' => Etat::class,
			'choice_label' => 'libelle_etat',
    	))
    	->add("urgence", EntityType::class, array(
    		'class' => Urgence::class,
			'choice_label' => 'libelle_urgence',
    	))
    	->add("recherche", SubmitType::class, ["label" => "Changer urgence"])
    	->getForm();
		
	  $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
	  }
        return ["form" => $form->createView(),"billets" => $billets];
    }

    public function rechercher($name,$date1,$date2,$etat,$urgence)
    {
    	if($name != "")
    	{
    		$query += "id = ". name;
    	}
    	if($date1 != null && date2 !=null)
    	{
    		$query += "date_traitement_prevu_ticket between ". date1 ." and ". date2; 
    	}
    	else if($date1 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". date1;
    	}
    	else if($date2 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". date2;
    	}
    	if($etat != null)
    	{
    		$query += "id_etat = ". etat;
    	}
    	if($urgence != null)
    	{
    		$query += "id_urgence = ". urgence;
    	}
    	/*if(nomoperateur != "")
    	{
    		$query += "id = ". nomoperateur;
    	}*/

    	$em = $this->getDoctrine()->getManager();
    	if($query != "")
    		$billets = $em->getRepository(Tickets::class)->where($query);
    	else
    		$billets = $em->getRepository(Tickets::class)->findAll(); // A CHANGER////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }


     /**
     * @Route("/vueUrgence/{id}", name="billet.vueurgence") 
	 * @Template("billets/changerUrgenceBillet.html.twig")
     */

    public function chargerVueUrgence(Tickets $ticket, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$urgences = $em->getRepository(Urgence::class)->findAll();

   	    $form = $this->createFormBuilder()
    	->add("urgence", EntityType::class, array(
    		'class' => Urgence::class,
			'choice_label' => 'libelle_urgence',
    	))
    	->add("changeUrgence", SubmitType::class, ["label" => "Changer urgence"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $em = $this->getDoctrine()->getManager();
    	  $ticket = $em->getRepository(Tickets::class)->find($id);
          $ticket->setetat($result['urgence']);
 		  $em->persist($ticket);
		  $em->flush();
		  return $this->redirecToRoute("billet.accueil");
      }
      return ["form" => $form->createView(), "result" => $result];
    }

    /**
     * @Route("/vueAssigner/{id}", name="billet.vueurgence") 
	 * @Template("billets/assigner.html.twig")
     */

    public function chargerVueAssigner(Tickets $ticket, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$operateurs = $em->getRepository(Operateur::class)->findAll();

   	    $form = $this->createFormBuilder()
    	->add("personne", EntityType::class, array(
    		'classe' => Personne::class,
			'choice_label' => 'nom_personne'
    	))
    	->add("save", SubmitType::class, ["label" => "Changer personne"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $em = $this->getDoctrine()->getManager();
    	  $ticket = $em->getRepository(Tickets::class)->find($id);
          $ticket->setPersonne_Assignee($result['personne']);
 		  $em->persist($ticket);
		  $em->flush();
		  return $this->redirecToRoute("billet.accueil");
      }
      return ["form" => $form->createView(), "result" => $result];
    }

    /**
     * @Route("/vueCommentaire/{id}", name="billet.vueurgence")
	 * @Template("billets/commentaire.html.twig")
     */

    public function chargerVueCommentaire(Tickets $ticket, Request $request)
    {
   	    $form = $this->createFormBuilder()
    	->add('body', TextareaType::class, array(
    	'attr' => array('class' => 'textarea'),
		))
    	->add("save", SubmitType::class, ["label" => "Commenter"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $em = $this->getDoctrine()->getManager();
    	  $ticket = $em->getRepository(Tickets::class)->find($id);
          $ticket->commentaires->add($result['body']);
 		  $em->persist($ticket);
		  $em->flush();
		  return $this->redirecToRoute("billet.accueil");
      }
      return ["form" => $form->createView(), "result" => $result];
    }

    /**
     * @Route("/vueDate/{id}", name="billet.vuedate")
	 * @Template("billets/date.html.twig")
     */

    public function chargerVuePrevoirDate(Tickets $ticket, Request $request)
    {
   	    $form = $this->createFormBuilder()
    	 ->add("date", DateType::class, [
        "widget" => "single_text"
    	])
    	->add("changeDateResolution", SubmitType::class, ["label" => "Prévoir une date"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $em = $this->getDoctrine()->getManager();
    	  $ticket = $em->getRepository(Tickets::class)->find($id);
          $ticket->setdate($result['date']);
 		  $em->persist($ticket);
		  $em->flush();
		  return $this->redirecToRoute("billet.accueil");
      }
      return ["form" => $form->createView(), "result" => $result];
    }

    /**
     * @Route("/vueDateIntervention/{id}", name="billet.vuedate")
	 * @Template("billets/intervention.html.twig")
     */

    public function chargerVuePrevoirDateIntervention(Tickets $ticket, Request $request)
    {
   	    $form = $this->createFormBuilder()
    	 ->add("date", DateType::class, [
        "widget" => "single_text"
    	])
    	->add("save", SubmitType::class, ["label" => "Prévoir une intervention"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $em = $this->getDoctrine()->getManager();
    	  $ticket = $em->getRepository(Tickets::class)->find($id);
          $ticket->setdate($result['date']);
 		  $em->persist($ticket);
		  $em->flush();
		  return $this->redirecToRoute("billet.accueil");
      }
      return ["form" => $form->createView(), "result" => $result];
    }
	
    /**
     * @Route("/vueDeposer", name="billet.deposer")
	 * @Template("billets/deposer.html.twig")
     */

    public function deposer(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$postes = $em->getRepository(Poste::class)->findAll();
    	$urgences = $em->getRepository(Urgence::class)->findAll();
    	$typesproblemes = $em->getRepository(TypeProbleme::class)->findAll();
    	$prequalifications = $em->getRepository(Qualification::class)->findAll();

   	    $form = $this->createFormBuilder()
    	->add("poste", EntityType::class, array(
    		'class' => Poste::class,
			'choice_label' => 'code_poste',
    	))
    	->add("urgence", EntityType::class, array(
    		'class' => Urgence::class,
			'choice_label' => 'libelle_urgence',
    	))

		->add("typeProbleme", EntityType::class, array(
    		'class' => TypeProbleme::class,
			'choice_label' => 'libelle_type',
    	))
    	->add("prequalification", EntityType::class, array(
    		'class' => Qualification::class,
			'choice_label' => 'libelle_qualification',
    	))

		->add('body', TextareaType::class, array(
    	'attr' => array('class' => 'textarea'),
		))

		->add('attachment', FileType::class, array(
		 'multiple' => 'true',
		))
		->add("deposer", SubmitType::class, ["label" => "Deposer"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
          $ticket = new Tickets();
          $ticket->setPoste($result['poste']);
          $ticket->setUrgence($result['Urgence']);
          $ticket->settypeProbleme($result['typeProbleme']);
          $ticket->setqualification($result['Qualification']);
          $ticket->setCommentaire($result['body']);
          $ticket->setattachment($result['attachment']);
          $ticket->setpersonnedepose($this->getUser());
          $em->persist($ticket);
		  $em->flush();
      }
      return ["form" => $form->createView(), "result" => $result];
    }
}