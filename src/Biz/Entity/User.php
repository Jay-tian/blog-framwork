<?php
namespace Biz\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable,  \ArrayAccess
{
    private $data;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

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

    public function __set($name, $value)
    {
        if (in_array($name, array('id', 'roles'))) {
            return $this;
        }
        $this->data[$name] = $value;

        return $this;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function isLogin()
    {
        return empty($this->id) ? false : true;
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
        return $this->__get('password');
    }

    public function getRoles()
    {
        return $this->data['roles'];
    }

    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->__set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        return $this->__unset($offset);
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