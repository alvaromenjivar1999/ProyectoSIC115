<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuentasController extends AbstractController
{
    /**
     * @Route("/cuentas", name="cuentas")
     */
    public function index(): Response
    {
        
        return $this->render('cuentas/index.html.twig', [
            'controller_name' => 'CuentasController',
        ]);
    }
}
