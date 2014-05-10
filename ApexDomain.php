<?php

namespace Apex\Domain;

/**
 *
 */

abstract class Entity
{
	protected $id;
	
	function __construct($id = null)
	{
	    $this->setId($id);
	    return $this;
	}
	
	function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	function isEmpty()
	{
	    if (empty($this->id)) return true;  // "" and "0" evaluate as true
	    else return false;
	}
}

/**
 *
 */

abstract class NamedEntity extends Entity
{
	protected $name;
	
	function __construct($id = null, $name = null)
	{
	    $this->setId($id);
	    $this->setName($name);
	    return $this;
	}
	
	function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	function getName()
	{
		return $this->name;
	}
}

class User extends NamedEntity
{
	protected $email;
	protected $password;
	protected $roles = array();
	
	function setEmail($email)
	{
	    $this->email = $email;
	    return $this;
	}
	
	function getEmail()
	{
	    return $this->email;
	}
	
	function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	
	function getPassword()
	{
		return $this->password;
	}
	
	function addRole($role)
	{
		$this->roles[] = $role;
		return $this;
	}
	
	function getRoles()
	{
		return $this->roles;
	}
	
	function hasRole($name)
	{
		foreach($this->roles as $role) {
			if ($role == $name) return true;
		}
		return false;
	}
}

class UserCollection
{
    private $users;
    
    function add(User $user)
    {
        $this->users[$user->getId()] = $user;
    }
    
    function toArray()
    {
        return $this->users;
    }
}