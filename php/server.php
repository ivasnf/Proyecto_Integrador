<?php
include "conexion.php";
$accion = $_GET["accion"];

switch ($accion) {
    case 'agregarTutor':
        $curp = $_GET["CurpTutor"];
        $nombre = $_GET["NombreTutor"];
        $ap = $_GET["APTutor"];

        $sql ="insert into tutor values (0, '$curp','$nombre','$ap')";
        $ejecutarSql=$conexion->query($sql);

        if ($ejecutarSql) {
            echo "agregado";
        } else {
            echo "0";
        }
        break;
        
        case 'editarTutor':
            //recibe los datos enviados por el js
            $id=$_GET["id"];
            $curp=$_GET["curp"];
            $nombre=$_GET["nombre"];
            $ap=$_GET["ap"];
            //prepara la sentencia sql
            $sql="update tutor set curp='$curp',nombre='$nombre', apellidopat='$ap' where id='$id'";
            //se ejecuta el sql
            $ejecutarSql=$conexion->query($sql);

            if($ejecutarSql){//en caso de que la ejecucion se realiza con exito
                echo "1";
            }else{
                echo "0";
            }
            break;

            case 'eliminarTutor':
                //recibe los datos enviados por el js
                $id=$_GET["id"];
                //prepara la sentencia sql
                $sql="delete from tutor where id='$id'";
                //se ejecuta el sql
                $ejecutarSql=$conexion->query($sql);
    
                if($ejecutarSql){//en caso de que la ejecucion se realiza con exito
                    echo "1";
                }else{
                    echo "0";
                }
                break;

            
        }
?>