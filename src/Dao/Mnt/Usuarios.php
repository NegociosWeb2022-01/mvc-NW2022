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
        $userest,
        $usertipo
    ) {

        
        //Tratamiento de la Contraseña
        $hashedPassword = self::_hashPassword($userpswd);
        $pswpswdexp = date('Y-m-d', time() + 7776000);
        $actcod= hash("sha256", $useremail.time());

    

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
            "userpswd" => $hashedPassword,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $pswpswdexp,
            "userest" => $userest,
            "useractcod" => $actcod,
            "usertipo" => $usertipo,
        );
       
        return self::executeNonQuery($sqlstr, $sqlParams);
    }

    static private function _saltPassword($userpswd)
    {
        return hash_hmac(
            "sha256",
            $userpswd,
            \Utilities\Context::getContextByKey("PWD_HASH")
        );
    }

    static private function _hashPassword($userpswd)
    {
        return password_hash(self::_saltPassword($userpswd), PASSWORD_ALGORITHM);
    }



    public static function update(
        $useremail,
        $username,
        $userpswd,
        $userfching,
        $userpswdest,
        $userpswdexp,
        $userest,
        $useractcod,
        $userpswdchg,
        $usertipo,
        $usercod

    ) {
        $sqlstr = "UPDATE `usuario` set
`useremail`=:useremail, `username`=:username,
`userpswd`=:userpswd, `userfching`=:userfching, `userpswdest`=:userpswdest,
`userpswdexp`=:userpswdexp, `userest`=:userest, `useractcod`=:useractcod ,
`userpswdchg`=:userpswdchg, `usertipo`=:usertipo
 where `usercod` = :usercod;";
        $sqlParams = array(
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userfching" => $userfching,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "userpswdchg" => $userpswdchg,
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
