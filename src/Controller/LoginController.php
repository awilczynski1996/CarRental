<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Users;

class LoginController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
//        return new Response('<html><body>Test</body></html>');
        return $this->render('login.html.twig');
    }

//    /**
//     * @Route("/user/save")
//     */
//    public function save()
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $date = \DateTime::createFromFormat('Y-m-d', 'h:i:s');
//        $user = new Users();
//
//        $user->setFirstname('Arek');
//        $user->setSurname('Wilczynski');
//        $user->setEmail('test@test.pl');
//        $user->setPassword('Test123');
//        $user->setStatus(0);
//
//        $entityManager->persist($user);
//        $entityManager->flush();
//
//        return new Response('Saved user '. $user->getFirstname());
//    }
}