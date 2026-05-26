<?php 
    /* Modelo pra realizar CRUD a cualquier tabla de la base de datos */

    class Procesos
    {
        public function isdu($query,$tipo)
        {
            $rows = null;
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $stm = $conexion->prepare($query);

            if($tipo == "s" || $tipo == "S")
            {
                $stm->execute();
                while($result = $stm->fetch())
                {
                    $rows[]=$result;
                }
                return $rows;
            }
            else{
                if(!$stm)
                {
                    return 0;
                }
                else{
                    $stm->execute();
                    return 1;
                }
            }
        }

        public function GetDataUser($user,$tabla,$campo)
        {
            $rows = NULL;
            $modelo = new ConexionBD();
            $arg = ":".$campo;
            $conexion = $modelo->get_conexion();
            $sql = "SELECT * FROM $tabla WHERE $campo = $arg";
            $stm = $conexion->prepare($sql);
            $stm->bindParam($arg,$user);
            $stm->execute();

            while($result = $stm->fetch())
            {
                $rows[]=$result;
            }
            return $rows;
        }

        public function BuscaValor($tabla,$campo,$condicion)
        {
            $rows = null;
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $query = "SELECT $campo FROM $tabla WHERE $condicion";
            $stm = $conexion->prepare($query);
            $stm->execute();

            while($result = $stm->fetch())
            {
                $rows[]=$result;
            }
            return $rows;
        }

        public function row_data($query) 
        {
            
            $modelo = new ConexionBD();
            $conexion = $modelo->get_conexion();
            $stm = $conexion->query($query);
            $num_rows = $stm->rowCount();
            return $num_rows;
        }
    }
?>