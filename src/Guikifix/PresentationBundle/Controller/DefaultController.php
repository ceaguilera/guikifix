<?php

namespace Guikifix\PresentationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuikifixPresentationBundle:Default:index.html.twig');
    }
}
