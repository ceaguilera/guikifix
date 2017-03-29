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
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

  /**
   * Busca dentro de la BD a un usuario por su userName o
   * por su Email.
   *
   * @author Joel D. Requena P. <Joel.2005.2@gmail.com>
   * @param  String $data
   * @return Object
   */
  public function findByUserNameOrEmail($data)
  {
    return $this->createQueryBuilder('u')
      ->where('
        LOWER(u.username) = LOWER(:data) or
        LOWER(u.email) = LOWER(:data)
      ')
      ->setParameters(
        [
          'data' => $data
        ]
   )->getQuery()->getOneOrNullResult();
  }
}