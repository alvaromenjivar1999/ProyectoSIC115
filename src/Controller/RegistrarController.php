<?php

namespace App\Controller;

use App\Entity\Partida;
//use App\Entity\CuentaParcial;
use App\Form\TipoPartidaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RegistrarController extends AbstractController
{
    /**
     * @Route("/registrar", name="registrar")
     */
    public function index(Request $request): Response
    {
        $partida = new Partida();
        $form = $this->createForm(TipoPartidaType::class, $partida);
        $form -> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($partida);
            $em->flush();
            return $this->redirectToRoute('registrar');
        }

        return $this->render('registrar/index.html.twig', [
            'controller_name' => 'RegistrarController',
            'form' => $form->createView(),
        ]);
    }
  
}
