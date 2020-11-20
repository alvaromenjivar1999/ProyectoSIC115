<?php

namespace App\Controller;

use App\Entity\CuentaParcial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibroMayorController extends AbstractController
{
    /**
     * @Route("/mayor", name="libro_mayor")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        /*$query = "SELECT partida.fecha, partida.concepto, cuenta_parcial.debe, cuenta_parcial.haber
FROM cuenta_parcial
INNER JOIN partida ON cuenta_parcial.partidas_id=partida.id WHERE cuenta_parcial.numero='12';
";*/
        $query = "SELECT DISTINCT nombre from cuenta_parcial";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);

        $numerosDeCuenta = $stmt->fetchAll();

        $cuentas = array();

        $nombresDeCuenta = array();

        if (is_array($numerosDeCuenta) || is_object($numerosDeCuenta)){
            foreach ( $numerosDeCuenta as $numero ){
                foreach ($numero as $valor) {
                    $numString = strval($valor);
                    $query2 = "SELECT partida.fecha, partida.concepto, cuenta_parcial.debe, cuenta_parcial.haber
        FROM cuenta_parcial
        INNER JOIN partida ON cuenta_parcial.partidas_id=partida.id WHERE cuenta_parcial.nombre='$numString';";
                    $stmt2 = $db->prepare($query2);
                    $params2 = array();
                    $stmt2->execute($params2);

                    $cuenta = $stmt2->fetchAll();

                    array_push($cuentas, $cuenta);
                    array_push($nombresDeCuenta, $numString);
                }
            }
        }


        //$cuentas = $stmt->fetchAll();

        return $this->render('libro_mayor/index.html.twig', [
            'cuentas' => $cuentas,
            'numeros' => $numerosDeCuenta,
            'nombres' => $nombresDeCuenta
        ]);
    }
    /*
    public function sqlNativo(){
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM cuenta_parcial";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);

        $cuentas = $stmt->fetchAll();

        foreach($cuentas as $cuenta){
            each $cuenta["nombre"]."<br/>";
        }

        die();
    }*/
}
