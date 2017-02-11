<?php
namespace Guikifix\Core\Contract;

interface CommandInterface
{
	/**
	*  metodo getRequest devuelve un array con los parametros del command 
	*
	* @author Gabriel Camacho <kbo025@gmail.com>
	* @version 05-05-2015
	* @return  Array
	*/
    public function getRequest();
}