<?php
namespace Guikifix\ApiBundle\Services;

use Guikifix\Core\Contract\RepositoryFactoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * RepositoryFactory
 *
 * Factory que permite obtener el repositorio de una entidad
 *
 * @author Freddy Contreras <freddycontreras3@gmail.com>
 * 
 */
class RepositoryFactory implements RepositoryFactoryInterface
{
	/**
	 * Entity Manager Symfony
	 * @var EntityManager
	 */
	private $em;

	/**
	 * Arreglo que contiene el conjunto de repositorios 
	 * @var array
	 */
	private $map = [
		'User' => [
            'repository'=>'Guikifix\ApiBundle\Repository\UserRepository',
            'entity'=>'Guikifix\ApiBundle\Entity\User'
        ],
        'JobTypeCategory' => [
            'repository'=>'Guikifix\ApiBundle\Repository\JobTypeCategoryRepository',
            'entity'=>'Guikifix\Core\Domain\JobTypeCategory'
        ]
	];

	/**
	 * Constructor de la clase
	 * @param EntityManager|null $em servicio que maneja la conexión los repositorios
	 */
	public function __construct(EntityManager $em = null)
	{
		$this->em = $em;
	}

	/**
	*	Devuelve el objecto repositorio de una clase
	*	
	*	@param string $entity nombre de la entidad a buscar
	*	@return EntityRepository
	*/
	public function get($entity)
	{
        $class = $this->map[$entity]['repository'];

		if(array_key_exists($entity, $this->map)) {
            if(isset($this->map[$entity]['entity'])) {
                return new $class($this->em, new ClassMetadata($this->map[$entity]['entity']));
			} else {
                return new $class($this->em);
			}
		}

        return null;
	}
}