<?php
namespace Guikifix\Core\UseCases\User\GetJobTypeCategories;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

/**
 * Class GetJobTypeCategoriesCommand
 * @package Guikifix\Core\UseCases\User\GetJobTypeCategories
 *
 * Obtener las categorias de un tipo 
 * trabajo dado el id 
 *
 * @author Freddy Contreras
 */
class GetJobTypeCategoriesCommand extends CommandBase implements CommandInterface 
{
	/**
	 * id del tipo de trabajo
	 * @var integer
	 */
	protected $id;
}