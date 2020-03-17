<?php

    class ProductoController extends Controller{
        public function __construct(){
            middleware();
        }
        
        /**
         * Vista Principal
         * @return vista
         */
        public function index(){
                $producto = new productoModel();
                $data = $producto->all();

                View::render('index', $data);
        }
        
        public function detalle_prodC(){
            $producto = new productoModel();
            return $producto->detail_productos();
        }

        /**
         * detalle de un Producto
         * @return $data
         */
        public function detail($id){
            $producto = new productoModel();
            return $producto->detail($id);
        }

        /**
         * Crear Producto
         * @return vista
         */
        public function create($request){
            if(!empty($request['id_marca'])):
                $producto                =   new productoModel();
                $producto->code          =   $request['code'];
                $producto->price         =   $request['price'];
                $producto->id_marca      =   $request['id_marca'];
                $producto->description   =   $request['description'];

                if(!$id = $producto->add()):
                    $message = "Hubo un error";
                else :
                    $producto->id = $id;
                    $message = "Se creo la producto Correctamente";
                endif;
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

        /**
         * Asignar subcategoria a un producto
         * @return $data
         */
        public function subcategoria($id_subcategoria, $id) {
            if(!empty($id_subcategoria) && !empty($id)) :
                $producto                   =   new productoModel();
                $producto->id_subcategoria  =   $id_subcategoria;
                $producto->id               = $id;
                
                if(!$id = $producto->add_subcategoria()):
                    $message = "Hubo un error";
                else :
                    $message = "Se creo la producto Correctamente";
                endif;
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }
        
        /**
         * Agregar detalle producto
         * @return $data
         */
        public function detail_product($request, $id, $code) {
            $target_path = "./assets/images/Productos/";
            if (!file_exists($target_path.$code))   mkdir($target_path.$code, 0777, true);

            $name = date("YmdHis")."." . basename( $_FILES['uploadedfile']['name']);
            $target_path = $target_path . $code . '/' . $name;
            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) :
                $producto                   =   new productoModel();
                $producto->id_color         =   $request["id_color"];
                $producto->stock            =   $request["stock"]; 
                $producto->id               =   $id;
                $producto->link_photo       =   $name;
                if(!$id = $producto->add_detalle()):
                    $message = "Hubo un error";
                else :
                    $message = "Se creo la producto Correctamente";
                endif;
            else :
                $message = "Hubo un error";
            endif;
            echo "<script>window.location = '".URL."producto?register=".$message."&id=".$id."&code=".$code."&action=4';</script>";
        }

        /**
         * Detalle Producto
         * @return $data
         */
        public function one($id){
            if(!empty($id)):
                $producto = new productoModel();
                $producto->id = $id;
                return $producto->one();
            endif;
        }

        /**
         * Actualizar Producto
         * @return $data
         */
        public function update_producto($request, $id){
            if(!is_null($id) && !empty($request['code']) && !empty($request['price'])):
                $producto                =   new productoModel();
                $producto->code          =   $request['code'];
                $producto->price         =   $request['price'];
                $producto->description   =   $request['description'];
                $producto->id            =   $id;
                $message = ($producto->update())? "Se actualizó la  producto Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

        /**
         * Deatalle de un Producto
         * @return $data
         */
        public function one_detalle($id){
            if(!empty($id)):
                $producto = new productoModel();
                $producto->id = $id;
                return $producto->one_detail();
            endif;
        }

        /**
         * Actualizar Un Detalle Producto
         * @return $data
         */
        public function update_detalle($request, $id){
            if(!is_null($id) && !empty($request['stock']) && !empty($request['id_color']) && !empty($request['code'])):
                
                $target_path = "./assets/images/Productos/";
                $carpeta = '/ruta/a/mi/carpeta';
                if (!file_exists($target_path.$request["code"])) {
                    mkdir($target_path.$request["code"], 0777, true);
                }
                $name = date("YmdHis")."." . basename( $_FILES['uploadedfile']['name']);
                $target_path = $target_path . $request["code"] . '/' . $name;
                if(isset($_FILES['uploadedfile']['name'])) {
                    move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
                }
                $producto                =   new productoModel();
                $producto->link_photo    =   $name;
                $producto->id_color      =   $request['id_color'];
                $producto->stock         =   $request['stock'];
                $producto->id            =   $id;

                $message = (!empty($_FILES['uploadedfile']['name']))?
                    ($producto->update_detail_link())? "Se actualizó la  producto Correctamente" : "Hubo un error":
                    $message = ($producto->update_detail())? "Se actualizó Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

        /**
         * Eliminar un Producto
         * @return $data
         */
        public function delete($id){
            if(!empty($id)):
                try{
                    $producto = new productoModel();
                    $producto->id = $id;
                    $message = ($producto->delete())? "Se Elimino con exito" : "Hubo un error";
                }catch(Exeption $e){
                    $message = $e->getMessage();
                }
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

        /**
         * Banner true
         * @return $data
         */
        public function check($id){
            if(!is_null($id)):
                $producto                =   new productoModel();
                $producto->banner        =   2;
                $producto->id            =   $id;
                $message = ($producto->banner())? "Se actualizó la  producto Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

        /**
         * Banner false
         * @return $data
         */
        public function times($id){
            if(!is_null($id)):
                $producto                =   new productoModel();
                $producto->banner        =   1;
                $producto->id            =   $id;
                $message = ($producto->banner())? "Se actualizó la  producto Correctamente" : "Hubo un error";
                echo "<script>window.location = '".URL."producto?register=".$message."';</script>";
            endif;
        }

    }
