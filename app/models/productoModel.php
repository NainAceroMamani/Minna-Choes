<?php
class productoModel extends Model
{
    public $id;
    public $code;
    public $description;
    public $price;
    public $id_marca;
    public $id_subcategoria;
    public $id_color;
    public $stock;
    public $link_photo;
    public $banner;

    /**
     * Mostrar todos los Productos
     * @return void
     */
    public function all(){
        $sql = 'SELECT code,prod.id,price,prod.description as desc_prod, marca.name as name_marca 
                FROM producto as prod INNER JOIN marca ON marca.id = prod.id_marca ORDER BY prod.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Detalle Productos
     * @return void
     */
    public function detail($id){
        $sql = 'SELECT dt.banner, color.name, dt.id, dt.stock, dt.link_photo, p.code FROM detalle_producto as dt INNER JOIN color ON dt.id_color = color.id
                INNER JOIN producto as p ON p.id = dt.id_producto 
                WHERE dt.id_producto = '. $id .' ORDER BY dt.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Método agreagr un producto
     * @return void
     */
    public function add(){
        $sql = 'INSERT INTO producto (code,description,price,id_marca) VALUES (:code, :description,:price,:id_marca)';
        $data = [
            'code'          =>  $this->code,
            'description'   =>  $this->description,
            'price'         =>  $this->price,
            'id_marca'      =>  $this->id_marca,
        ];
        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Agregar subcategoria
     * @return void
     */
    public function add_subcategoria(){
        $sql = 'INSERT INTO producto_subcategoria(id_producto,id_subcategoria) VALUES (:id_producto, :id_subcategoria)';
        $data = [
            'id_producto'       =>  $this->id,
            'id_subcategoria'   =>  $this->id_subcategoria,
        ];

        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Agregar detalle al producto
     * @return void
     */
    public function add_detalle()
    {
        $sql = 'INSERT INTO detalle_producto(id_producto,link_photo,stock,id_color) 
                VALUES (:id_producto, :link_photo, :stock, :id_color)';
        $data = [
            'id_producto'       =>  $this->id,
            'id_color'          =>  $this->id_color,
            'link_photo'        =>  $this->link_photo,
            'stock'             =>  $this->stock
        ];
        try {
            return ($this->id = parent::query($sql, $data)) ? $this->id : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Datos de un producto
     * @return void
     */
    public function one(){
        $sql = 'SELECT * FROM producto WHERE id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Actualizar un Producto
     * @return void
     */
    public function update(){
        $sql = 'UPDATE producto SET description=:description, code=:code, price=:price WHERE id=:id';
        $data =
        [
            'id'            =>  $this->id,
            'description'   =>  $this->description,
            'code'          =>  $this->code,
            'price'         =>  $this->price
        ];
        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Mostrar detalles de un producto
     * @return void
     */
    public function one_detail(){
        $sql = 'SELECT * FROM detalle_producto INNER JOIN color on detalle_producto.id_color = color.id  
                INNER JOIN producto ON producto.id = detalle_producto.id_producto
                WHERE detalle_producto.id = :id LIMIT 1';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows[0] : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    public function one_detail_prod(){
        $sql = 'SELECT * FROM detalle_producto INNER JOIN color on detalle_producto.id_color = color.id  
                INNER JOIN producto ON producto.id = detalle_producto.id_producto
                WHERE detalle_producto.id_producto = :id ';
        try{
            return ($rows = parent::query($sql , ['id' => $this->id])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Actualizar un producto
     * @return void
     */
    public function update_detail_link(){
        $sql = 'UPDATE detalle_producto SET id_color=:id_color, stock=:stock, link_photo=:link_photo WHERE id=:id';
        $data =
        [
            'id'                  =>  $this->id,
            'id_color'            =>  $this->id_color,
            'stock'               =>  $this->stock,
            'link_photo'          =>  $this->link_photo,
        ];
        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Actualizar Porducto
     * @return void
     */
    public function update_detail(){
        $sql = 'UPDATE detalle_producto SET id_color=:id_color, stock=:stock WHERE id=:id';
        $data =
        [
            'id'                  =>  $this->id,
            'id_color'            =>  $this->id_color,
            'stock'               =>  $this->stock,
        ];
        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Eliminar un Producto
     * @return void
     */
    public function delete(){
        $sql = 'DELETE FROM detalle_producto WHERE id=:id LIMIT 1';
        try{
            return (parent::query($sql, ['id' => $this->id])) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Detalle un Producto
     * @return void
     */
    public function detail_productos(){
        $sql = 'SELECT color.name, dt.id, dt.stock, dt.link_photo, p.code , p.price , dt.id_producto FROM detalle_producto as dt INNER JOIN color ON dt.id_color = color.id
                INNER JOIN producto as p ON p.id = dt.id_producto 
                GROUP BY dt.id_producto
                ORDER BY dt.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    /**
     * Detalle Color de un Producto
     * @return void
     */
    public function detail_color($id){
        $sql = 'SELECT color.name, detalle_producto.id FROM detalle_producto INNER JOIN color ON  detalle_producto.id_color = color.id
                WHERE id_producto=:id ORDER BY id DESC';
        try{
            return ($rows = parent::query($sql , ['id' => $id])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     * Detalle Producto Paginación
     * @return void
     */
    public function detail_productos_paginate($inicio, $nproductos){
        $sql = 'SELECT color.name, dt.id, dt.stock, dt.link_photo, p.code , p.price , dt.id_producto FROM detalle_producto as dt INNER JOIN color ON dt.id_color = color.id
                INNER JOIN producto as p ON p.id = dt.id_producto 
                WHERE dt.stock > 0
                GROUP BY dt.id_producto ORDER BY dt.id DESC LIMIT '.$inicio.', '.$nproductos;
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    public function detail_productos_categoria($inicio, $nproductos, $id) {
        $sql = 'SELECT color.name, dt.id, dt.stock, dt.link_photo, p.code , p.price , dt.id_producto FROM detalle_producto as dt INNER JOIN color ON dt.id_color = color.id
                INNER JOIN producto as p ON p.id = dt.id_producto 
                INNER JOIN producto_subcategoria as ps ON p.id = ps.id_producto 
                WHERE ps.id_subcategoria=:id
                GROUP BY dt.id_producto ORDER BY dt.id DESC LIMIT '.$inicio.', '.$nproductos;
        try{
            return ($rows = parent::query($sql, ['id' => $id])) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
    /**
     * Productos en el banner
     * @return void
     */
    public function banner(){
        $sql = 'UPDATE detalle_producto SET banner=:banner WHERE id=:id';
        $data =
        [
            'id'                  =>  $this->id,
            'banner'              =>  $this->banner,
        ];
        try{
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Productos en el banner
     * @return void
     */
    public function banner_producto(){
        $sql = 'SELECT * from detalle_producto as dp INNER JOIN producto as p ON dp.id_producto = p.id 
                WHERE dp.banner = 2  ORDER BY dp.id DESC';
        try{
            return ($rows = parent::query($sql)) ? $rows : false;
        } catch(Exception $e) {
            throw $e;
        }
    }
}
