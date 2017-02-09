<?php

namespace Guikifix\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuikifixApiBundle:Default:index.html.twig');
    }
}
