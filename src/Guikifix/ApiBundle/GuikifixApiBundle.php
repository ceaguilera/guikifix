<?php

namespace Guikifix\ApiBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Guikifix\ApiBundle\DependencyInjection\Compiler\ValidatorRouting;

class GuikifixApiBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ValidatorRouting());
    }
}
