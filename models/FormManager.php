<?php

declare(strict_types = 1);

class FormManager{

    private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }


    public function getUsers()
    {
        // Array declaration
        $arrayOfUsers = [];

        $query = $this->getDB()->prepare('SELECT * FROM users');
        $query->execute();
        $dataUsers = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new user object wich is stocked in our array $arrayOfUsers
        foreach ($dataUsers as $dataUser) {
            $arrayOfUsers[] = new User($dataUser);
            
        }

        // Return of the array on which we could loop to list all users
        return $arrayOfUsers;
    }


    public function getUsersByCountry()
    {
                // Array declaration
        $arrayOfUsers = [];

        $query = $this->getDB()->prepare('SELECT * FROM users WHERE admin = :admin ORDER BY country');
        $query->bindValue('admin', 0, PDO::PARAM_INT);
        $query->execute();
        $dataUsers = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new user object wich is stocked in our array $arrayOfUsers
        foreach ($dataUsers as $dataUser) {
            $arrayOfUsers[] = new User($dataUser);
            
        }

        // Return of the array on which we could loop to list all users
        return $arrayOfUsers;
    }
    


    public function getUser($id)
    {
        $user;
        $query = $this->getDB()->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
        

        // $dataCharacter is an associative array which contains informations of a user
        $dataUser = $query->fetch(PDO::FETCH_ASSOC);

        // We create a new User object with the associative array $dataCharacter and we return it
        $user = new User($dataUser);
        return $user;
        
    }

        /**
     * Add user into DB
     *
     * @param User $user
     */
    public function addUser(User $user)
    {
        $query = $this->getDb()->prepare('INSERT INTO users(firstname, lastname, birthdate, email, gender, country, profession, admin) VALUES (:firstname, :lastname, :birthdate, :email, :gender, :country, :profession, :admin)');
        $query->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
        $query->bindValue(':birthdate', $user->getBirthdate(), PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':gender', $user->getGender(), PDO::PARAM_STR);
        $query->bindValue(':country', $user->getCountry(), PDO::PARAM_STR);
        $query->bindValue(':profession', $user->getProfession(), PDO::PARAM_STR);
        $query->bindValue(':admin', $user->getAdmin(), PDO::PARAM_INT);
        $query->execute();
    }


        /**
     * Check if user exists or not
     *
     * @param string $name
     * @return boolean
     */
    public function checkIfExist(string $firstname, $lastname)
    {
        $query = $this->getDb()->prepare('SELECT * FROM users WHERE firstname = :firstname AND lastname = :lastname');
        $query->bindValue('firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue('lastname', $lastname, PDO::PARAM_STR);
        $query->execute();

        // If there's an entry with that name, that's it exists
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
            return new User($user);
        }
            

    }

        /**
     * Update user's data 
     *
     * @param User $user
     */
    public function updateUser(User $user)
    {   
  
        $query = $this->getDb()->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, birthdate = :birthdate, email = :email, gender = :gender, country = :country, profession = :profession WHERE id = :id');
        $query->bindValue('id', $user->getId(), PDO::PARAM_INT);
        $query->bindValue('firstname', $user->getFirstname(), PDO::PARAM_STR);
        $query->bindValue('lastname', $user->getLastname(), PDO::PARAM_STR);
        $query->bindValue('birthdate', $user->getBirthdate(), PDO::PARAM_STR);
        $query->bindValue('email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue('gender', $user->getGender(), PDO::PARAM_STR);
        $query->bindValue('country', $user->getCountry(), PDO::PARAM_STR);
        $query->bindValue('profession', $user->getProfession(), PDO::PARAM_STR);
        $query->execute();
    }


        /**
     * Delete account from DB
     *
     * @param User $User
     */
    public function deleteUser($id)
    {
        $id = (int)$id;
        $query = $this->getDb()->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}

?>