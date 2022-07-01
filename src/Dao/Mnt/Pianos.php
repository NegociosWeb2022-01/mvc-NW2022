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
class Pianos extends Table
{
    /*
         `pianoid` BIGINT(18) NOT NULL AUTO_INCREMENT,
        `pianodsc` VARCHAR(60) NULL,
        `pianobio` VARCHAR(5000) NULL,
         `pianosales` INT NULL,
         `pianoimguri` VARCHAR(128) NULL,
         `pianoimgthb` VARCHAR(128) NULL,
         `pianoprice` DECIMAL(13,2) NULL,
         `pianoest` CHAR(3) NULL,
    */
    /**
     * Obtiene todos los registros de Pianos
     *
     * @return array
     */
    public static function getAll()
    {
        $sqlstr = "Select * from pianos;";
        return self::obtenerRegistros($sqlstr, array());
    }
    /**
     * Get pianos By Id
     *
     * @param int $pianoid Codigo del Pianos
     *
     * @return array
     */
    public static function getById(int $pianoid)
    {
        $sqlstr = "SELECT * from `pianos` where pianoid=:pianoid;";
        $sqlParams = array("pianoid" => $pianoid);
        return self::obtenerUnRegistro($sqlstr, $sqlParams);
    }

    public static function insert(
        $pianodsc,
        $pianobio,
        $pianosales,
        $pianoimguri,
        $pianoimgthb,
        $pianoprice,
        $pianoest
    ) {
        $sqlstr = "INSERT INTO `pianos`
(`pianodsc`, `pianobio`,
`pianosales`, `pianoimguri`, `pianoimgthb`,
`pianoprice`, `pianoest`)
VALUES
(:pianodsc, :pianobio,
:pianosales, :pianoimguri, :pianoimgthb,
:pianoprice, :pianoest);
";
        $sqlParams = [
            "pianodsc" => $pianodsc ,
            "pianobio" => $pianobio ,
            "pianosales" => $pianosales ,
            "pianoimguri" => $pianoimguri ,
            "pianoimgthb" => $pianoimgthb ,
            "pianoprice" => $pianoprice ,
            "pianoest" =>  $pianoest 
        ];
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
    

    public static function update(
        $pianodsc,
        $pianobio,
        $pianosales,
        $pianoimguri,
        $pianoimgthb,
        $pianoprice,
        $pianoest,
        $pianoid

    ) {
        $sqlstr = "UPDATE `pianos` set
`pianodsc`=:pianodsc, `pianobio`=:pianobio,
`pianosales`=:pianosales, `pianoimguri`=:pianoimguri, `pianoimgthb`=:pianoimgthb,
`pianoprice`=:pianoprice, `pianoest`=:pianoest
 where `pianoid` = :pianoid;";
        $sqlParams = array(
            "pianodsc" => $pianodsc,
            "pianobio" => $pianobio,
            "pianosales" => $pianosales,
            "pianoimguri" => $pianoimguri,
            "pianoimgthb" => $pianoimgthb,
            "pianoprice" => $pianoprice,
            "pianoest" => $pianoest,
            "pianoid" => $pianoid
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
    public static function delete($pianoid)
    {
        $sqlstr = "DELETE from `pianos` where pianoid = :pianoid;";
        $sqlParams = array(
            "pianoid" => $pianoid
        );
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
}
