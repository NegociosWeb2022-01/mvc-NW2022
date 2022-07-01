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
class Roles extends Table
{
    /*
        `rolescod` varchar(15) NOT NULL,
        `rolesdsc` varchar(45) DEFAULT NULL,
        `rolesest` char(3) DEFAULT NULL,
    */
    /**
     * Obtiene todos los registros de roles
     *
     * @return array
     */
    public static function getAll()
    {
        $sqlstr = "Select * from roles;";
        return self::obtenerRegistros($sqlstr, array());
    }
    /**
     * Get roless By Id
     *
     * @param int $usercod Codigo del roles
     *
     * @return array
     */
    public static function getById($rolescod)
    {
        $sqlstr = "SELECT * from `roles` where rolescod=:rolescod;";
        $sqlParams = array("rolescod" => $rolescod);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function insert(
        $rolescod,
        $rolesdsc,
        $rolesest
    ) {

        $sqlstr = "INSERT INTO `roles` (`rolescod`, `rolesdsc`, `rolesest`)
            VALUES
            (:rolescod, :rolesdsc, :rolesest);";
        $sqlParams = array(
            "rolescod" => $rolescod,
            "rolesdsc" => $rolesdsc,
            "rolesest" => $rolesest
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }



    public static function update(
        $rolesdsc,
        $rolesest,
        $rolescod
    ) {
        $sqlstr = "UPDATE `roles` set
        `rolesdsc`=:rolesdsc,
        `rolesest`=:rolesest
        where `rolescod`=:rolescod;";
        $sqlParams = array(
            "rolesdsc" => $rolesdsc,
            "rolesest" => $rolesest,
            "rolescod" => $rolescod
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
    public static function delete($rolescod)
    {
        $sqlstr = "DELETE from `roles` where rolescod = :rolescod;";
        $sqlParams = array(
            "rolescod" => $rolescod
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
}
