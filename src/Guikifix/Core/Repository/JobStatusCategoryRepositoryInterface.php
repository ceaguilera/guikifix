<?php
namespace Guikifix\Core\Repository;

/**
 * JobStatusCategoryRepositoryInterface
 * Implementa las operaciones de manipulacion de los datos
 * de la clase JobTypeRepository definidas en la interfaz JobStatusCategoryRepositoryInterface
 *
 * @author Freddy Contreras
 */
interface JobStatusCategoryRepositoryInterface
{
    /**
    * La función retorna el listado de los tipos de
    * trabajo en el sistama
    * @return array listado de las categorias
    */
    public function findAllStatus();
}