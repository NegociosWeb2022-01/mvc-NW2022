<?php 
namespace Controllers\NW202202;

use Controllers\PublicController;
use PhpParser\Node\Expr\FuncCall;
use Views\Renderer;

class PrimerForm extends PublicController {
    public function run() :void
    {
       $viewData = array();
       $viewData["txtNombre"]= "Sandra";
       $viewData["txtApellido"]= "Calderon";
       Renderer::render('nw202202/primerform', $viewData);


    }

}



?>