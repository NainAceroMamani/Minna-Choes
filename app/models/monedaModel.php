<?php
class monedaModel extends Model
{
    public $id;
    public $price;

    /**
     * Mostrar todas las monedas
     * @return void
     */
    public function all(){
        $sql = 'SELECT * FROM moneda ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar una moneda
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM moneda WHERE id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método para cargar actualizar un moneda
     * @return void
     */
    public function update(){
        $sql = 'UPDATE moneda SET price=:price WHERE id=:id';
        $data =
        [
            'id'            =>  $this->id,
            'price'   =>  $this->price
        ];

        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
