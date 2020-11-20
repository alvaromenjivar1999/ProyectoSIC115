<?php

namespace App\Controller;

use App\Entity\EstadoDeResultados;
use App\Entity\Partida;
use App\Form\EstadoDeResultadosType;
use App\Form\TipoPartidaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrarEstadoDeResultadosController extends AbstractController
{
    /**
     * @Route("estado/", name="registrar_estado_de_resultados")
     */
    public function index(Request $request): Response
    {
        $estado = new EstadoDeResultados();
        $form = $this->createForm(EstadoDeResultadosType::class, $estado);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($estado);
            $em->flush();
            $url = "estado/"; //redirige a cuentas/ para agregar sus cuentas parciales
            return $this->redirect($url);
        }

        return $this->render('registrar_estado_de_resultados/index.html.twig', [
            'controller_name' => 'RegistrarEstadoDeResultadosController',
            'form' => $form->createView(),
        ]);
    }
}
