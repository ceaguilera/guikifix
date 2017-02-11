<?php
namespace Guikifix\ApiBundle\Services;

use Guikifix\Core\Contract\Translator;

/**
 * CoreTranslator
 *
 * La siguiente clase se encarga de traducir los textos 
 * del sistema utilizando el traductor de Symfony
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 */
class CoreTranslator implements Translator
{
    /**
     * Contenedor de Symfony
     * 
     * @var ContainerInterface
     */
    private $container;

    /**
     * Constructor de la clase
     * 
     * @param  ContainerInterface $container contenedor de servicios de symfony
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Metodo que hace uso del trans del bundle de translator
     * @param  string $code código de la translator
     * @param  string $file tipo de archivo implementado en la traducción
     * @return string       texto de la traducción
     */
    public static function getTranslator($code, $file = 'messages')
    {
        $this->container->get('session')->get('_locale');
        return $this->container>get('translator')->trans($code, array(), $file, $locale);
    }
    
    /**
     * Metodo que hace uso del TransChoice del bundle de translator
     * @param  string $code     Codigo de translator
     * @param  interger $n        Identificador de la clave de traducción  '{0} or {1} or {n}
     * @param  array  $paramter Parametros manejados dentro de la traducción
     * @param  string $file     Tipo de archivo implementado en la traducción
     * @return string           texto de la traducción
     */
    public static function getTransChoice($code, $n, $paramter = [], $file = 'messages')
    {
        $locale = $this->container->get('session')->get('_locale');
        return $kernel->getContainer()->get('translator')->transChoice($code, $n, $paramter, $file, $locale);
    }
}