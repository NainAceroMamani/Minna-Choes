<?php
class compraModel extends Model
{
    public $id;
    public $state;
    public $id_cliente;
    public $link_photo;
    public $date;

    /**
     * Método para cargar todas las opcciones de la DB
     * @return void
     */
    public function all(){
        $sql = 'SELECT compra.link_photo, compra.total, compra.state, compra.id, compra.date, c.name,c.last_name,c.ruc, c.tipo_doc, c.num_doc, c.phone, c.email
                FROM compra INNER JOIN cliente as c ON compra.id_cliente = c.id 
                ORDER BY compra.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Actualizar stado de una compra
     * @return void
     */
    public function update()
    {
        $sql = 'UPDATE compra SET state=:state WHERE id=:id';
        try{
            return (parent::query($sql, ['id' => $this->id , 'state' => 2])) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Mostrar detalles de la compra
     * @return void
     */
    public function detail(){
        $sql = 'SELECT * FROM detalle_compra as dp INNER JOIN producto as p ON dp.id_producto = p.id 
                WHERE id_compra=:id ORDER BY dp.id DESC';
        try{
            return ($rows = parent::query($sql, ["id" => $this->id])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
}
