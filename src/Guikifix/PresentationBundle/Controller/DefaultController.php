<?php

namespace Guikifix\PresentationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Guikifix/index.html');
    }

    
    public function redirectAction()
    {
            return $this->redirect($this->generateUrl('guikifix_presentation_homepage'));
    }
}
