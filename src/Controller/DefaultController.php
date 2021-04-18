<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;


class DefaultController extends AbstractController
{
	/**
    * @Route("/", name="app_home")
    */
    public function home(): Response
    {
        

        return $this->render('public/home.html.twig');
    }

    /**
    * @Route("/coiffeurs", name="app_coiffeurs")
    */
    public function coiffeurs(Request $request): Response
    {
        
        return $this->render('public/coiffeurs.html.twig');
    } 

    /**
    * @Route("/about", name="app_about")
    */
    public function about(): Response
    {
        $number = random_int(0, 100);

        return $this->render('public/about.html.twig');
    }
}

