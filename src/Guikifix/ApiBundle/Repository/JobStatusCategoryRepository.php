<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\JobStatusCategoryRepositoryInterface;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * JobStatusCategory
 * Implementa las operaciones de manipulacion de los datos
 * de la clase User definidas en la interfaz JobStatusCategoryRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class JobStatusCategoryRepository extends BaseRepository implements JobStatusCategoryRepositoryInterface {}