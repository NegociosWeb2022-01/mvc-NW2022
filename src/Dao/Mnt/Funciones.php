<?php

/**
 * PHP Version 7
 * Modelo de Datos para modelo
 *
 * @category Data_Model
 * @package  Models${1:modelo}
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */

namespace Dao\Mnt;

use Exception;

use Dao\Table;

/**
 * Modelo de Datos para la tabla de Productos
 *
 * @category Data_Model
 * @package  Dao.Table
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @link http://url.com
 */
class Funciones extends Table
{
    /*
        `fncod` varchar(255) NOT NULL,
        `fndsc` varchar(45) DEFAULT NULL,
        `fnest` char(3) DEFAULT NULL,
         `fntyp` char(3) DEFAULT NULL,
    */
    /**
     * Obtiene todos los registros de roles
     *
     * @return array
     */
    public static function getAll()
    {
        $sqlstr = "Select * from funciones;";
        return self::obtenerRegistros($sqlstr, array());
    }
    /**
     * Get roless By Id
     *
     * @param int $usercod Codigo del roles
     *
     * @return array
     */
    public static function getById($fncod)
    {
        $sqlstr = "SELECT * from `funciones` where fncod=:fncod;";
        $sqlParams = array("fncod" => $fncod);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function insert(
        $fncod,
        $fndsc,
        $fnest,
        $fntyp
    ) {

        $sqlstr = "INSERT INTO `funciones` (`fncod`, `fndsc`, `fnest`,`fntyp`)
            VALUES
            (:fncod, :fndsc, :fnest, :fntyp);";
        $sqlParams = array(
            "fncod" => $fncod,
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }


    public static function update(
        $fndsc,
        $fnest,
        $fntyp,
        $fncod
    ) {
        $sqlstr = "UPDATE `funciones` set
        `fndsc`=:fndsc,
        `fnest`=:fnest,
        `fntyp`=:fntyp
        where `fncod`=:fncod;";
        $sqlParams = array(
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp,
            "fncod" => $fncod
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

    /**
     * Undocumented function
     *
     * @param [type] $pianoid description
     *
     * @return void
     */
    public static function delete($fncod)
    {
        $sqlstr = "DELETE from `funciones` where fncod = :fncod;";
        $sqlParams = array(
            "fncod" => $fncod
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
}
