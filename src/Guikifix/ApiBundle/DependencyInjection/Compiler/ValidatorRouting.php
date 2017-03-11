<?php
//Uso de la clase compiler
namespace Guikifix\ApiBundle\DependencyInjection\Compiler;

use Symfony\Component\Finder\Finder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\Config\Resource\DirectoryResource;

/**
 * Clase ValidatorRouting
 *
 * La clase define las archivos de validacion
 * de los casos de uso del sistema
 *
 * @author Freddy Contreras
 */
class ValidatorRouting implements CompilerPassInterface
{
    /**
     * Definición de archivos de validaciones del sistema
     *
     * @param \ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $validatorBuilder = $container->getDefinition('validator.builder');
        $validatorFiles = array();
        $finder = new Finder();

        foreach ($finder->files()->in(__DIR__ . '/../../../Core/Validator') as $file) {
            $validatorFiles[] = $file->getRealPath();
        }

        $validatorBuilder->addMethodCall('addYamlMappings', array($validatorFiles));
        $container->addResource(new DirectoryResource(__DIR__ . '/../../../Core/Validator/'));
    }
}
