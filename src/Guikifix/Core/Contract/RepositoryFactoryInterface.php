<?php

namespace Guikifix\Core\Contract;

/**
*	Interface RepositoryFactory 
*	
*	Interfaz - Modelado del servicio de repositorio utilizado en el Caso de Uso (Handler)
*		
*	@author Freddy Contreras <freddycontreras3@gmail.com>
*	
*/
interface RepositoryFactoryInterface
{
	/**
	*	Devuelve el objeto del Repositorio a buscar
	*	
	*	@param String
	*	@return EntityRepository
	*/
	public function get($entity);
}