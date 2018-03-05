<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.

class BilletController extends Controller
{

    /**
     * @Route("/Billet/", name="app_hello") //add this comment to annotations
     * @Template("hello/hello.html.twig")
     */
    public function hello($name="World")
    {

        return ["name" => $name];
    }

}