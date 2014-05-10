<?php

namespace Apex\Application;

/**
 * typical CRUD operations for Mapper classes:
 * - fetchAll, fetchById, etc.
 * - persist
 * - delete
 */

abstract class Mapper
{
    protected $pdo;
    
    function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
	
	//function fetchAll() {}
	
	//function fetchById() {}
	
	//function persist() {}
	
	//function delete() {}
}

/**
 * typical CRUD operations for Repository classes
 * - getAll, getById, etc.
 * - save
 * - delete
 */

abstract class Repository
{
    protected $mapper;
    
	//function getById($id) {}
    
    //function getAll() {}
	
	//function save() {}
	
	//function delete() {}
}

/**
 *
 */

class UserMapper extends Mapper
{
    function fetchById($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM `users`
            WHERE `id` = :id
            LIMIT 1");
        $stmt->execute(array('id' => $id));
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
		$user = new \Apex\Domain\User;
        if ($result) {
            $user->setId($result['id'])
                 ->setEmail($result['email'])
				 ->setPassword($result['password'])
				 ->addRole('IS_AUTHENTICATED');
        }
		else {
			$user->addRole('IS_ANONYMOUS');
		}
        return $user;
    }
	
	function fetchByEmail($email)
	{
		$stmt = $this->pdo->prepare('
			SELECT `id`
			FROM `users`
			WHERE `email` = :email
			LIMIT 1
		');
		$stmt->execute(array('email' => $email));
		$result = $stmt->fetch(\PDO::FETCH_ASSOC);
		return $this->fetchById($result['id']);
	}
	
	function updateActivity($id)
	{
		$stmt = $this->pdo->prepare('
			UPDATE `users`
			SET `activity` = :activity
			WHERE id = :id
			LIMIT 1
		');
		return $stmt->execute(array(
			'activity' => date('Y-m-d H:i:s', time()),
			'id' => $id
		));
	}
}

class UserRepository extends Repository
{
    function __construct(\PDO $pdo)
    {
        $this->mapper = new UserMapper($pdo);
    }
    
    function getById($id)
    {
        $user = $this->mapper->fetchById($id);
		return $user;
    }
	
	function getByEmail($email)
	{
		$user = $this->mapper->fetchByEmail($email);
		return $user;
	}
    
    function getAll()
    {
        
    }
	
	function triggerActivity(\Apex\Domain\User $user)
	{
		return $this->mapper->updateActivity($user->getId());
	}
}