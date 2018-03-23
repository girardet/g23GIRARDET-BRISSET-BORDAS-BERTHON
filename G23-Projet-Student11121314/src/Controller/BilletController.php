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
use App\Entity\TypeProbleme;
use App\Entity\Qualification;
	/**
    * @Route("/billet") //add this comment to annotations
	*/

class BilletController extends Controller
{

    /**
     * @Route("/accueil/{id}", name="billet.accueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirMesBillets(Personne $personne)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Tickets::class)->where('id_personne = $personne->id');
		$form = formulaireRecherche();
        return ["form" => $form->createView(),"billets" => $billets];
    }

    /**
     * @Route("/tous/lesbillets", name="billet.tousbilletsaccueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirTousLesBillets()
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Tickets::class)->findAll();
		
		$form = formulaireRecherche(1);
        return ["form" => $form->createView(),"billets" => $billets];
    }

    public function formulaireRecherche($chef = 0)
    {
    	$em = $this->getDoctrine()->getManager();
    	$etats = $em->getRepository(Etat::class)->findAll();
    	$urgences = $em->getRepository(Urgence::class)->findAll();

    	$form = $this->createFormBuilder()
    	->add("name", TextType::class)
    	 ->add("a la con1", DateType::class, [
        "widget" => "single_text"
    	])
    	 ->add("a la con2", DateType::class, [
        "widget" => "single_text"
    	])
		
		/*if($chef != 0)
		{*/
			->add("nomoperateur", TextType::class)
		/*}*/
		
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
      return ["form" => $form->createView(), "result" => $result];
    }

    public function rechercher()
    {
    	$query = "";
    	if(name != "")
    	{
    		$query += "id = ". name;
    	}
    	if(date1 != null && date2 !=null)
    	{
    		$query += "date_traitement_prevu_ticket between ". date1 ." and ". date2; 
    	}
    	else if(date1 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". date1;
    	}
    	else if(date2 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". date2;
    	}
    	if(etat != null)
    	{
    		$query += "id_etat = ". etat;
    	}
    	if(urgence != null)
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
     * @Route("/changerUrgence/{id}", name="billet.urgence")
	 
     */


    public function changeUrgence(Tickets $ticket, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$ticket = $em->getRepository(Tickets::class)->find($id);
        $ticket->etatbillet = $request[truc];
        return $this->redirecToRoute("billet.accueil");
    }

     /**
     * @Route("/changerdateresolution/{id}", name="billet.date") 
     */

    public function changeDateResolution(Tickets $ticket, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$ticket = $em->getRepository(Billet::class)->find($id);
        $ticket->dateresolution = $request[truc];
        return $this->redirecToRoute("billet.accueil");
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
    	 ->add("a la con", DateType::class, [
        "widget" => "single_text"
    	])
    	->add("changeDateResolution", SubmitType::class, ["label" => "Prévoir une date"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
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
    	 ->add("a la con", DateType::class, [
        "widget" => "single_text"
    	])
    	->add("save", SubmitType::class, ["label" => "Prévoir une intervention"])
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
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
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
      }
      return ["form" => $form->createView(), "result" => $result];
    }
}