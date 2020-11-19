<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BalanceGeneralController extends AbstractController
{
    /**
     * @Route("/balance/general", name="balance_general")
     */
    public function index(): Response
    {
        return $this->render('balance_general/index.html.twig', [
            'controller_name' => 'BalanceGeneralController',
        ]);
    }
}
