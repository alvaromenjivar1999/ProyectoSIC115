<?php

namespace App\Controller;

use App\Entity\CuentaParcial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroMayorController extends AbstractController
{
    /**
     * @Route("/libro/mayor", name="libro_mayor")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $cuentas = $em -> getRepository(CuentaParcial::class)->findAll();
        return $this->render('libro_mayor/index.html.twig', [
            'cuentas' => $cuentas
        ]);
    }
}
