<?php
class clienteModel extends Model
{
    public $id;
    public $name;
    public $description;

    /**
     * Método para cargar todas las opcciones de la DB
     * @return void
     */
    public function all(){
        $sql = 'SELECT id,email,phone,ruc,name,last_name,tipo_doc,num_doc, count(*) as count FROM cliente GROUP BY ruc ORDER BY id DESC';

        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    
    /**
     * Método para cargar un Usuario
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM cliente WHERE ruc = :ruc';
        try{
            return ($rows = parent::query($sql , ['ruc' => $this->ruc])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
}
