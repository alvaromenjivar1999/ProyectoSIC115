<?php

namespace App\Entity;

use App\Repository\EstadoDeResultadosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstadoDeResultadosRepository::class)
 */
class EstadoDeResultados
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ventas;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $costoDeVenta;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gananciaBruta;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gastosDeAdministracion;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gastosDeVenta;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $costosFinancieros;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $utilidadAntesDeReservaLegal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $reservaLegal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $utilidadAntesDeImpuestoSobreLaRenta;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gastosPorImpuestos;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gananciaDelAnho;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $diferenciaEnCambioDeConversion;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $perdidasOGananciasActuariales;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $otroResultadoIntegral;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $resultadoIntegralTotal;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $anho;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVentas(): ?float
    {
        return $this->ventas;
    }

    public function setVentas(?float $ventas): self
    {
        $this->ventas = $ventas;

        return $this;
    }

    public function getCostoDeVenta(): ?float
    {
        return $this->costoDeVenta;
    }

    public function setCostoDeVenta(?float $costoDeVenta): self
    {
        $this->costoDeVenta = $costoDeVenta;

        return $this;
    }

    public function getGananciaBruta(): ?float
    {
        return $this->gananciaBruta;
    }

    public function setGananciaBruta(?float $gananciaBruta): self
    {
        $this->gananciaBruta = $gananciaBruta;

        return $this;
    }

    public function getGastosDeAdministracion(): ?float
    {
        return $this->gastosDeAdministracion;
    }

    public function setGastosDeAdministracion(?float $gastosDeAdministracion): self
    {
        $this->gastosDeAdministracion = $gastosDeAdministracion;

        return $this;
    }

    public function getGastosDeVenta(): ?float
    {
        return $this->gastosDeVenta;
    }

    public function setGastosDeVenta(?float $gastosDeVenta): self
    {
        $this->gastosDeVenta = $gastosDeVenta;

        return $this;
    }

    public function getCostosFinancieros(): ?float
    {
        return $this->costosFinancieros;
    }

    public function setCostosFinancieros(?float $costosFinancieros): self
    {
        $this->costosFinancieros = $costosFinancieros;

        return $this;
    }

    public function getUtilidadAntesDeReservaLegal(): ?float
    {
        return $this->utilidadAntesDeReservaLegal;
    }

    public function setUtilidadAntesDeReservaLegal(?float $utilidadAntesDeReservaLegal): self
    {
        $this->utilidadAntesDeReservaLegal = $utilidadAntesDeReservaLegal;

        return $this;
    }

    public function getReservaLegal(): ?float
    {
        return $this->reservaLegal;
    }

    public function setReservaLegal(?float $reservaLegal): self
    {
        $this->reservaLegal = $reservaLegal;

        return $this;
    }

    public function getUtilidadAntesDeImpuestoSobreLaRenta(): ?float
    {
        return $this->utilidadAntesDeImpuestoSobreLaRenta;
    }

    public function setUtilidadAntesDeImpuestoSobreLaRenta(?float $utilidadAntesDeImpuestoSobreLaRenta): self
    {
        $this->utilidadAntesDeImpuestoSobreLaRenta = $utilidadAntesDeImpuestoSobreLaRenta;

        return $this;
    }

    public function getGastosPorImpuestos(): ?float
    {
        return $this->gastosPorImpuestos;
    }

    public function setGastosPorImpuestos(?float $gastosPorImpuestos): self
    {
        $this->gastosPorImpuestos = $gastosPorImpuestos;

        return $this;
    }

    public function getGananciaDelAnho(): ?float
    {
        return $this->gananciaDelAnho;
    }

    public function setGananciaDelAnho(?float $gananciaDelAnho): self
    {
        $this->gananciaDelAnho = $gananciaDelAnho;

        return $this;
    }

    public function getDiferenciaEnCambioDeConversion(): ?float
    {
        return $this->diferenciaEnCambioDeConversion;
    }

    public function setDiferenciaEnCambioDeConversion(?float $diferenciaEnCambioDeConversion): self
    {
        $this->diferenciaEnCambioDeConversion = $diferenciaEnCambioDeConversion;

        return $this;
    }

    public function getPerdidasOGananciasActuariales(): ?float
    {
        return $this->perdidasOGananciasActuariales;
    }

    public function setPerdidasOGananciasActuariales(?float $perdidasOGananciasActuariales): self
    {
        $this->perdidasOGananciasActuariales = $perdidasOGananciasActuariales;

        return $this;
    }

    public function getOtroResultadoIntegral(): ?float
    {
        return $this->otroResultadoIntegral;
    }

    public function setOtroResultadoIntegral(?float $otroResultadoIntegral): self
    {
        $this->otroResultadoIntegral = $otroResultadoIntegral;

        return $this;
    }

    public function getResultadoIntegralTotal(): ?float
    {
        return $this->resultadoIntegralTotal;
    }

    public function setResultadoIntegralTotal(?float $resultadoIntegralTotal): self
    {
        $this->resultadoIntegralTotal = $resultadoIntegralTotal;

        return $this;
    }

    public function getAnho(): ?float
    {
        return $this->anho;
    }

    public function setAnho(?float $anho): self
    {
        $this->anho = $anho;

        return $this;
    }
}
