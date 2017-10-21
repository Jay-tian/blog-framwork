<?php
namespace Biz\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    private $data;
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct($data)
    {
        $this->isActive = true;
        $this->data = $data;
    }

    public function __get($name)
    {
        return empty($this->data[$name]) ? '' : $this->data[$name];
    }

    public function getUsername()
    {
        return $this->__get('username');
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {

    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize($this->data);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        $this->data = unserialize($serialized);
    }
}