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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
     * @Route("/billet") //add this comment to annotations

 */

class BilletController extends Controller
{

    /**
     * @Route("/{id}", name="billet.accueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirMesBillets(Personne $personne)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Billet::class)->where('id_personne = $personne->id');
		$form = formulaireRecherche();
        return ["form" => $form.form->createView(),"billets" => $billets];
    }

    /**
     * @Route("/tous/lesbillets", name="billet.tousbilletsaccueil") 
     * @Template("billets/afficherBillets.html.twig")
     */

    public function voirTousLesBillets()
    {
    	$em = $this->getDoctrine()->getManager();
    	$billets = $em->getRepository(Billet::class)->findAll();
		
		$form = formulaireRecherche(1);
        return ["form" => $form.form->createView(),"billets" => $billets];
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
		
		if($chef != 0)
		{
			->add("nomoperateur", TextType::class)
		}
		
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
    	if(a la con1 != null && a la con2 !=null)
    	{
    		$query += "date_traitement_prevu_ticket between ". a la con1 ." and ". a la con2; 
    	}
    	else if(a la con1 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". a la con1;
    	}
    	else if(a la con2 != null)
    	{
    		$query += "date_traitement_prevu_ticket = ". a la con2;
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
    		$billets = $em->getRepository(Billet::class)->where($query);
    	else
    		$billets = $em->getRepository(Billet::class)->findAll(); // A CHANGER////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }

    /**
     * @Route("/changerUrgence/{id}", name="billet.urgence")
	 
     */


    public function changeUrgence(Billet $Billet, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billet = $em->getRepository(Billet::class)->find($id);
        $billet->etatbillet = $request[truc];
        return $this->redirecToRoute("billet.accueil");
    }

     /**
     * @Route("/changerdateresolution/{id}", name="billet.date") 
     */

    public function changeDateResolution(Billet $Billet, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$billet = $em->getRepository(Billet::class)->find($id);
        $billet->dateresolution = $request[truc];
        return $this->redirecToRoute("billet.accueil");
    }

     /**
     * @Route("/vueUrgence/{id}", name="billet.vueurgence") 
	 * @Template("billets/changerUrgenceBillet.html.twig")
     */

    public function chargerVueUrgence(Billet $Billet, Request $request)
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

    public function chargerVueAssigner(Billet $Billet, Request $request)
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

    public function chargerVueCommentaire(Billet $Billet, Request $request)
    {
   	    $form = $this->createFormBuilder()
    	->add('body', TextareaType::class, array(
    	'attr' => array('class' => 'textarea'),
		));
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

    public function chargerVuePrevoirDate(Billet $Billet, Request $request)
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

    public function chargerVuePrevoirDateIntervention(Billet $Billet, Request $request)
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

    public function deposer(Billet $Billet, Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$postes = $em->getRepository(Poste::class)->findAll();
    	$urgences = $em->getRepository(Urgence::class)->findAll();
    	$typesproblemes = $em->getRepository(TypeProbleme::class)->findAll();
    	$prequalifications = $em->getRepository(Prequalification::class)->findAll();

   	    $form = $this->createFormBuilder()
    	-->add("poste", EntityType::class, array(
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
    		'class' => Prequalification::class,
			'choice_label' => 'libelle_prequalification',
    	))

		->add('body', TextareaType::class, array(
    	'attr' => array('class' => 'textarea'),
		));

		->add('attachment', FileType::class, array(
		 'multiple' => 'true',
		));
    	->getForm();

      $result = [];
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $result = $form->getData();
      }
      return ["form" => $form->createView(), "result" => $result];
    }
}