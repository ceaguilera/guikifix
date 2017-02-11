<?php
namespace Guikifix\Core\UseCases;

use Guikifix\Core\Contract\RepositoryFactoryInterface;
use Guikifix\Core\Services\ResponseCommandBus;
use Guikifix\Core\Contract\CommandInterface;
use Guikifix\Core\Contract\HandlerInterface;
/**
 * Class EditClientProfileHandler
 * @package Navicu\Core\Application\UseCases\EditClientProfile
 */
class TestHandler implements HandlerInterface
{
    /**
     * @param Command $command
     * @param RepositoryFactoryInterface $rf
     * @return ResponseCommandBus
     */
    public function handle(CommandInterface $command, RepositoryFactoryInterface $rf)
    {
    	$users = $rf->get('User')->findAll();
    	$response = [];
    	foreach ($users as $currentUser) {
    		$response[] = [
    		'id' => $currentUser->getId(),
    		'username' => $currentUser->getUsername()
    		];
    	}
    	return new ResponseCommandBus(200,$response);
    }
}