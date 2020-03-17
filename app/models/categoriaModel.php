<?php
class categoriaModel extends Model
{
    public $id;
    public $name;
    public $description;

    /**
     * Método para cargar todas las opcciones de la DB
     * @return void
     */
    public function all(){
        $sql = 'SELECT * FROM categoria ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Método agreagr un Categoria
     * @return void
     */
    public function add(){
        $sql = 'INSERT INTO categoria (name,description) VALUES (:name, :description)';
        $data = [
            'name'          =>  $this->name,
            'description'   =>  $this->description
        ];

        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar una Categoria
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM categoria WHERE id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar actualizar un Categoria
     * @return void
     */
    public function update(){
        $sql = 'UPDATE categoria SET description=:description, name=:name WHERE id=:id';
        $data =
        [
            'id'            =>  $this->id,
            'description'   =>  $this->description,
            'name'        =>    $this->name,
        ];

        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
