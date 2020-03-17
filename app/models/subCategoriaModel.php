<?php
class subCategoriaModel extends Model
{
    public $id;
    public $name;
    public $description;
    public $id_categoria;

    /**
     * Método para cargar todas las opcciones de la DB
     * @return void
     */
    public function all()
    {
        $sql = 'SELECT sub_cat.id, sub_cat.name as name_sub_cat, sub_cat.description as des_sub_cat, cat.name as name_cat
                FROM sub_categoria as sub_cat INNER JOIN categoria as cat ON sub_cat.id_categoria = cat.id 
                ORDER BY sub_cat.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Método agreagr un subcategoria
     * @return void
     */
    public function add()
    {
        $sql = 'INSERT INTO sub_categoria (name,description,id_categoria) VALUES (:name, :description,:id_categoria)';
        $data = [
            'name'          =>  $this->name,
            'description'   =>  $this->description,
            'id_categoria'  =>  $this->id_categoria
        ];
        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar una subcategoria
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM sub_categoria as sub_cat INNER JOIN categoria as cat ON sub_cat.id_categoria = cat.id 
                WHERE sub_cat.id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar actualizar un subcategoria
     * @return void
     */
    public function update(){
        $sql = 'UPDATE sub_categoria SET description=:description, name=:name, id_categoria=:id_categoria WHERE id=:id';
        $data =
        [
            'id'            =>  $this->id,
            'description'   =>  $this->description,
            'name'        =>    $this->name,
            'id_categoria'  =>  $this->id_categoria
        ];

        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function all_subcat($id)
    {
        $sql = 'SELECT sub_categoria.id, sub_categoria.name FROM sub_categoria WHERE id_categoria=:id ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql , ['id' => $id])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
}
