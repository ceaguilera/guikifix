<?php 
namespace Guikifix\ApiBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var La variable representa el container que permite hacer uso de los demás servicios
     */
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getUsernameForApiKey($apiKey)
    {
        // Look up the username based on the token in the database, via
        // an API call, or do something entirely different
        $rpUser = $this->container->get('repositoryFactory')->get('User');
        $user = $rpUser->findby(["api_key"=>$apiKey]);
        //dump(getType($user));
        $username = $user[0]->getUserName();

        return $username;
    }

    public function loadUserByUsername($username)
    {
        $rpUser = $this->container->get('repositoryFactory')->get('User');
        $user = $rpUser->findby(["username"=>$username]);

        $role =  $user[0]->getRoles();
        array_push($role, 'ROLE_API');

        return new User(
            $username,
            null,
            // the roles for the user - you may choose to determine
            // these dynamically somehow based on the user
            $role
        );
    }

    public function refreshUser(UserInterface $user)
    {
        // $user is the User that you set in the token inside authenticateToken()
        // after it has been deserialized from the session

        // you might use $user to query the database for a fresh user
        // $id = $user->getId();
        // use $id to make a query

        // if you are *not* reading from a database and are just creating
        // a User object (like in this example), you can just return it
        return $user;
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}