<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:56
 */

class View
{
    public static function carregar($pagina, $dados = null){

        include $pagina;
    }

} 