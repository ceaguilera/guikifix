<?php
namespace Guikifix\Core\UseCases;

use Guikifix\Core\Contract\CommandBase;
use Guikifix\Core\Contract\CommandInterface;

class TestCommand extends CommandBase implements CommandInterface
{
	protected $username;
}