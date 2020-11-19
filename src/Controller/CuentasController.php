<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


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
    /**
     * @Route("/registrarCuentas", options = { "expose" = true }, name="registrarCuentas")
     */
    public function registarCuentas(Request $request){
        if($request->isXmlHttpRequest()){
            //$em = $this->getDoctrine()->getManager();
            $cuentas= $request->request->get('cuentas');
            return new JsonResponse(['cuentas'=>$cuentas]);
        }
        else{
            throw new Exception("Error Processing Request", 1);
            
        }
    }
}
