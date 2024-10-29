<?php

namespace Controllers\Carros;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Carros\Carros;

class CarrosForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nuevo Carro",
        "UPD" => "Editando %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)",
    ];
    private $mode = "";

    private $carro = [
        "codigo" => 0,
        "modelo" => "",
        "marca" => "",
        "anio" => 0,
        "kilometraje" => 0,
        "chasis" => "",
        "color" => "",
        "registro" => "",
        "cilindraje" => 0,
        "notas" => "",
        "rodaje" => "",
        "estado" => "",
        "creado" => "",
        "precioventa" => 0,
        "preciominio" => 0,
        "actualizado" => null
    ];

    public function run(): void
    {
        $this->inicializarForm();
        $this->generarViewData();
        Renderer::render("carros/carros_form", $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr[$_GET["mode"]])) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Carros-CarrosList", "Algo sucedio mal. intentelo De nuevo");
            die();
        }
        if ($this->mode !== "INS" && isset($_GET["codigo"])) {
            $this->carro["codigo"] = $_GET["codigo"];
            $this->cargarDatosCarro();
        }
    }
    private function cargarDatosCarro()
    {
        $tmpCarro = Carros::obtenerCarroPorId($this->carro["codigo"]);
        $this->carro = $tmpCarro;
    }

    private function generarViewData()
    {
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->carro["modelo"],
            $this->carro["codigo"]
        );
        $this->viewData["carro"] = $this->carro;
    }
}
