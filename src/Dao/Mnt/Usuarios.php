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
class Usuarios extends Table
{
    /*
        `usercod` bigint(10) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(80) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `userpswd` varchar(128) DEFAULT NULL,
  `userfching` datetime DEFAULT NULL,
  `userpswdest` char(3) DEFAULT NULL,
  `userpswdexp` datetime DEFAULT NULL,
  `userest` char(3) DEFAULT NULL,
  `useractcod` varchar(128) DEFAULT NULL,
  `userpswdchg` varchar(128) DEFAULT NULL,
  `usertipo` char(3) DEFAULT NULL COMMENT 'Tipo de Usuario, Normal, Consultor o Cliente',
  PRIMARY KEY (`usercod`),
    */
    /**
     * Obtiene todos los registros de Usuarios
     *
     * @return array
     */
    public static function getAll()
    {
        $sqlstr = "Select * from usuario;";
        return self::obtenerRegistros($sqlstr, array());
    }
    /**
     * Get Usuarios By Id
     *
     * @param int $usercod Codigo del Usuarios
     *
     * @return array
     */
    public static function getById(int $usercod)
    {
        $sqlstr = "SELECT * from `usuario` where usercod=:usercod;";
        $sqlParams = array("usercod" => $usercod);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function insert(
        $useremail,
        $username,
        $userpswd,
        $userpswdest,
        $userpswdexp,
        $userest,
        $useractcod,
        $usertipo
    ) {
       
       
        $sqlstr = "INSERT INTO `usuario` (`useremail`, `username`, `userpswd`,
            `userfching`, `userpswdest`, `userpswdexp`, `userest`, `useractcod`,
            `userpswdchg`, `usertipo`)
            VALUES
            ( :useremail, :username, :userpswd,
            now(), :userpswdest, :userpswdexp, :userest, :useractcod,
            now(), :usertipo);";
        $sqlParams = array(
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "usertipo" => $usertipo
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }



    public static function update(
        $useremail,
        $username,
        $userpswd,
        $userpswdest,
        $userpswdexp,
        $userest,
        $useractcod,
        $usertipo,
        $usercod

    ) {
        $sqlstr = "UPDATE `usuario` set
`useremail`=:useremail, `username`=:username,
`userpswd`=:userpswd,  `userpswdest`=:userpswdest,
`userpswdexp`=:userpswdexp, `userest`=:userest, `useractcod`=:useractcod , `usertipo`=:usertipo
 where `usercod` = :usercod;";
        $sqlParams = array(
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "usertipo" => $usertipo,
            "usercod" => $usercod
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
    public static function delete($usercod)
    {
        $sqlstr = "DELETE from `usuario` where usercod = :usercod;";
        $sqlParams = array(
            "usercod" => $usercod
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
}
