<?php
namespace Guikifix\Core\UseCases\User\GetJobTypeCategory;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

class GetJobTypeCategoryCommand extends CommandBase implements CommandInterface 
{
	/**
	 * Id de la localidad a buscar
	 * @var integer
	 */
	protected $locationId;
}