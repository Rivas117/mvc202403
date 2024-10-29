<?php

namespace Dao\Carros;

use Dao\Table;

class Carros extends Table
{
    public static function obtenerCarros()
    {
        $sqlstr = "SELECT * FROM carros;";
        $carros = self::obtenerRegistros($sqlstr, []);
        return $carros;
    }

    public static function obtenerCarroPorId($id)
    {
        $sqlstr = "SELECT * from carros where codigo=:codigo;";
        $carro = self::obtenerUnRegistro($sqlstr, ["codigo" => $id]);
        return $carro;
    }
}
