<?php
class colorModel extends Model
{
    public $id;
    public $name;
    public $description;

    /**
     * Método para cargar todos los Colores
     * @return void
     */
    public function all(){
        $sql = 'SELECT * FROM color ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método agreagr un Color
     * @return void
     */
    public function add(){
        $sql = 'INSERT INTO color (name,description) VALUES (:name, :description)';
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
     * Método para cargar un Color
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM color WHERE id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar actualizar un Color
     * @return void
     */
    public function update(){
        $sql = 'UPDATE color SET description=:description, name=:name WHERE id=:id';
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
