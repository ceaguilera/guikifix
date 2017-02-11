<?php

namespace Guikifix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guikifix\Core\UseCases\TestCommand;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$command = new TestCommand(['username' => 'asdas']);
    	$response = $this->get('CommandBus')->execute($command);
    	var_dump(json_encode($response->getData()));
    	return $this->render('GuikifixApiBundle:Default:index.html.twig');
    }
}
