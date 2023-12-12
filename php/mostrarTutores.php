<?php
header("Content-Type: text/html;charset=utf-8");
    include "conexion.php";
    $consultaSQL="Select *from tutor";
    $ejecutarConsulta=$conexion->query($consultaSQL);
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tablaTutor").DataTable();
    });
</script>

<?php
echo "<table id='tablaTutor'><thead><th>Id</th><th>Curp</th>
<th>Nombre</th><th>Apellido Paterno</th><th>Eliminar</th><th>Editar</th></thead>";
while($fila=$ejecutarConsulta->fetch_array()){
    echo "<tr>";
    echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>
    <p class= 'btn btn-warning' onclick='eliminar(".$fila[0].")'><i class='fas fa-trash-alt'></i> Eliminar</p>
    </td><td><p class='btn btn-primary' onclick=editar(".$fila[0].",'".$fila[1]."','".$fila[2]."','".$fila[3]."')><i class='far fa-edit'></i> Editar</p></td>";
    echo "</tr>";
}
echo "</table>"
?>

<div class='col-12' style='text-align: center; '>
    <button type='button' class='btn btn-info' id='btnImprimirTutor'>
       <i class='fas fa-file-pdf'></i>Imprimir Tutores 
    </button>
</div>
<script type ="text/javascript">
    $("#btnImprimirTutor").click(function(event){
        window.open("php/descargar_tutores.php","","fullscreen");
    });
</script>