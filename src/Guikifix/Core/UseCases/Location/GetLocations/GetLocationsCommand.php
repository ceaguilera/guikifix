<?php
namespace Guikifix\Core\UseCases\Location\GetLocations;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

class GetLocationsCommand extends CommandBase implements CommandInterface 
{
	/**
	 * id de la localidad a buscar
	 * @var integer
	 */
	protected $locationId;
}