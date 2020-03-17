<?php
class usuarioModel extends Model{
    public $id;
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $date;

    /**
     * Método para cargar todas las opcciones de la DB
     * @return void
     */
    public function all(){
        $sql = 'SELECT * FROM user ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método agreagr un Usuario
     * @return void
     */
    public function add(){
        $sql = 'INSERT INTO user (name,last_name,email,password,date) VALUES (:name, :last_name, :email, :password, :date)';
        $data = [
            'name'          =>  $this->name,
            'last_name'     =>  $this->last_name,
            'email'         =>  $this->email,
            'password'      =>  $this->password,
            'date'          =>  now(),
        ];
        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar un Usuario
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM user WHERE id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar actualizar un Usuario
     * @return void
     */
    public function update(){
        $sql = 'UPDATE user SET name=:name, last_name=:last_name, email=:email  WHERE id=:id';
        $data =
        [
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'last_name'     =>  $this->last_name,
            'email'         =>  $this->email
        ];
        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Validaciones
     * @return void
     */
    public function comparar(){
        $sql = 'SELECT * from user where email=:email limit 1';
        try{
            return ($rows = parent::query($sql, ['email' =>  $this->email])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
}
