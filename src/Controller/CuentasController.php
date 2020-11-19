<?php

namespace App\Controller;
use App\Repository\PartidaRepository;
use App\Repository\CuentaParcialRepository;
use App\Entity\CuentaParcial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


class CuentasController extends AbstractController
{
    /**
     * @Route("/cuentas/{id}", name="cuentas")
     */
    public function index($id): Response
    {
        
        return $this->render('cuentas/index.html.twig', [
            'controller_name' => 'CuentasController',
            'partidaId' => $id,
        ]);
    }
    /**
     * @Route("/registrarCuentas", options = { "expose" = true }, name="registrarCuentas")
     */
    public function registarCuentas(Request $request, LoggerInterface $logger){
        if($request->isXmlHttpRequest()){
            //$conn = $this->getEntityManager()->getConnection();
            $conn = $this->getDoctrine()->getManager();
            $sql = 'INSERT INTO cuenta_parcial (id,partidas_id,numero,nombre,debe,haber) VALUES ';
           
            $em = $this->getDoctrine()->getManager();
            $cuentas= $request->request->get('cuentas');
            $partidaId =$request->request->get('partidaId');
            $lastid =$em->getConnection()->prepare('SELECT MAX(id) FROM cuenta_parcial')->execute();
            $lastid= $lastid + 1;
            $logger->info("Que ondas:" . $lastid);
            for ($i=0; $i < count($cuentas) ; $i++) { 
                $cuentaA = $cuentas[$i];
                $logger->info($cuentaA["nombre"]);
                $nombre = strval( $cuentaA["nombre"]);
                $debe = strval( $cuentaA["debe"]);
                $haber = strval( $cuentaA["haber"]);
                $numeroDeCuenta = strval( $cuentaA["numeroDeCuenta"]);
                
                $sql = $sql . "($lastid, $partidaId ,  '$numeroDeCuenta' , '$nombre' , $debe , $haber)";
                if($i != count($cuentas)-1){
                    
                    $sql = $sql . ",";
                }
                $lastid= $lastid + 1;
            }
            $logger->info($sql);
           $stmt = $conn->getConnection()->prepare($sql);
           $stmt->execute();
            
            return new JsonResponse(['cuentas' => $cuentas,'partidaId' => $partidaId ]);
        }
        else{
            throw new Exception("Error Processing Request", 1);
            
        }
    }
}
