<?php
/**
 * PHP Version 7.2
 * Mnt
 *
 * @category Controller
 * @package  Controllers\Mnt
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 * @version  CVS:1.0.0
 * @link     http://url.com
 */
 namespace Controllers\Mnt;

// ---------------------------------------------------------------
// Sección de imports
// ---------------------------------------------------------------
use Controllers\PublicController;
use Dao\Mnt\Usuarios as DaoUsuarios2;
use Views\Renderer;

/**
 * Pianos
 *
 * @category Public
 * @package  Controllers\Mnt;
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Usuarios2 extends PublicController
{
    /**
     * Runs the controller
     *
     * @return void
     */
    public function run():void
    {
        // code
        $viewData = array();
        $viewData["Usuarios"] = DaoUsuarios2::getAll();
        error_log(json_encode($viewData));
      
        Renderer::render('mnt/usuarios2', $viewData);
    }
}

?>