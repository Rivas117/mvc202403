<?php

namespace Controllers\Sales;

use Controllers\PublicController;
use Views\Renderer;

class TopTen extends PublicController
{
    public function run(): void
    {
        $viewData = [
            "nombre_programador" => "Luis F Rivas",
            "clases" => [
                "Programacion de Portales Web 1",
                "Programacion de Portales Web 2",
                "Programacion de Negocios Web",
            ],
            "contactos" => [
                [
                    "nombre" => "Fulanito de Tal",
                    "telefono" => "090909"
                ],
                [
                    "nombre" => "Menganito de Tal",
                    "telefono" => "69696969"
                ],
                [
                    "nombre" => "Sutanita de Tal",
                    "telefono" => "999999"
                ]
            ]
        ];

        if ($this->isPostBack()) {
            $txtNombre = $_POST["txtNombre"];
            $rsltMessage = strtoupper($txtNombre) . " Procesado!!!!";
            $viewData["txtNombre"] = $txtNombre;
            $viewData["rsltMessage"] = $rsltMessage;
        }
        Renderer::render("Sales/Top10", $viewData);
    }
}
