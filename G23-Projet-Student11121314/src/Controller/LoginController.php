<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\UserType;
use App\Entity\Personne;
use App\Entity\Statut;
	 /**
     * @Route("/public")
	 */
class LoginController extends Controller
{
    
    /**
     * @Route("/", name="login")
     *@Template("login/login.html.twig")
     */
   public function login(Request $request)
	{
		$authenticationUtils = $this->get('security.authentication_utils');
		// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();

		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		return [
			'last_username' => $lastUsername,
			'error'         => $error];
	} 
	
	
		 /**
     * @Route("/accueil", name="accueil")
     *@Template("login/accueil.html.twig")
     */
	public function accueilLogin()
    {
		$personne = $this->getUser();
		$personne->getId();
		if($personne->getStatut()->getId() == 0)
		{
			$form = $this->createFormBuilder()
			->add("deposer", SubmitType::class, ["label" => "Deposer un billet"])
			->add("voirMesBillets", SubmitType::class, ["label" => "Voir mes billets"])
			->getForm();
		}

        return ["form" => $form->createView()];
    }	

	 /**
     * @Route("/register", name="register")
     *@Template("login/register.html.twig")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
		$em = $this->getDoctrine()->getManager();
    	$statut = $em->getRepository(Statut::class)->find(0);
        $user = new Personne();
        $form = $this->createForm(UserType::class, $user);
		$form->add("registerAction", SubmitType::class, ["label" => "Enregistrer"]);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPasswordPersonne());
            $user->setPasswordPersonne($password);

            // 4) save the User!
			$user->setStatut($statut);
			$user->setEmail("");
			$em = $this->getDoctrine()->getManager();
            $em->persist($user);
			$em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('login');
        }

        return ["form" => $form->createView()];
    }
}
?>