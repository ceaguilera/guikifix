<?php
namespace Guikifix\Core\Repository;

/**
 * JobTypeCategoryRepositoryInterface
 * Implementa las operaciones de manipulacion de los datos
 * de la clase JobTypeRepository definidas en la interfaz JobTypeCategoryRepositoryInterface
 *
 * @author Freddy Contreras
 */
interface JobTypeCategoryRepositoryInterface
{
	/**
	 * La función retorna el listado tipo de trabajos del sistema
	 * @return array listado de las categorias 
	 */
	public function findAllJob();
}