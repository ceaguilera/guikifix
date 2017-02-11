<?php
namespace Guikifix\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Guikifix\ApiBundle\Repository\BaseRepository;
use Guikifix\Core\Repository\UserRepositoryInterface;

/**
 * UserRepository 
 * Implementa las operaciones de manipulacion de los datos 
 * de la clase User definidas en la interfaz UserRepositoryInterface del dominio
 *
 * @author Freddy Contreras
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface {}