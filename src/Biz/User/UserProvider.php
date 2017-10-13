<?php

namespace Biz\User;

use AppBundle\Handler\AuthenticationHelper;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Biz\Entity\User;

class UserProvider implements UserProviderInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->getUserService()->getUserByUserName($username);
        
        return new User($user);
    }

    public function refreshUser(UserInterface $user)
    {

    }

    public function supportsClass($class)
    {

    }

    /**
     * @return UserService
     */
    protected function getUserService()
    {
        return $this->container->get('biz')->service('User:UserService');
    }
}
