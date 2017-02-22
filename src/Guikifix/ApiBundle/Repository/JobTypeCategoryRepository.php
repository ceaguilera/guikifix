<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\JobTypeCategoryRepositoryInterface;

/**
 * UserRepository
 * Implementa las operaciones de manipulacion de los datos
 * de la clase User definidas en la interfaz UserRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class JobTypeCategoryRepository extends BaseRepository implements JobTypeCategoryRepositoryInterface {}