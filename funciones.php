<?php


function getPromedioGeneral($pregunta) {

    echo '<div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                <b>Estadística General</b>
                </h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div><div class="box-body">';


    echo '<table class="table table-bordered table-hover" style="margin-bottom: 45px;">
            <tr>
            <th class="text-center">No. de encuestados</th>
            <th class="text-center">Promedio</th>
          </tr>';

    $sql = "SELECT COUNT(*), AVG($pregunta) FROM encuesta";
    $result = mysql_query($sql);

    while( $row = mysql_fetch_assoc($result) ) {
        echo '<tr>
                <td class="text-center">'.$row['COUNT(*)'].'</td>
                <td class="text-center">'.number_format( $row[ 'AVG('.$pregunta.')' ] , 2).'</td>
              </tr>';
    }
    echo "</table></div></div>";
}



function getPromedio($campo, $pregunta) {

    echo '<div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                Estadística de la '.$pregunta.' sobre la medición de: <b>'.$campo.'
                </b></h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div><div class="box-body">';


    echo '<table class="table table-bordered table-hover" style="margin-bottom: 45px;">
            <tr>
            <th class="text-center">No. de encuestados</th>
            <th class="text-center">'.$campo.'</th>
            <th class="text-center">Promedio</th>
          </tr>';

    $sql = "SELECT COUNT(*), $campo, AVG($pregunta) FROM encuesta GROUP BY $campo";
    $result = mysql_query($sql);

    while( $row = mysql_fetch_assoc($result) ) {
        echo '<tr>
                <td class="text-center">'.$row['COUNT(*)'].'</td>
                <td class="text-center">'.$row[$campo].'</td>
                <td class="text-center">'.number_format( $row[ 'AVG('.$pregunta.')' ] , 2).'</td>
              </tr>';
    }
    echo "</table></div></div>";
}








function getPorcentajes($campo, $pregunta, $opciones) {

    echo '<div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                Estadística de la '.$pregunta.' sobre la medición de: <b>'.$campo.'
                </b></h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div><div class="box-body">';

    echo '<table class="table table-bordered table-hover" style="margin-bottom: 45px;">
            <tr>
            <th class="text-center">No. de encuestados</th>
            <th class="text-center">'.$campo.'</th>';

            foreach ($opciones as $variable) {
                echo '<th class="text-center">'.$variable.'</th>';
            }
            
    echo  '</tr>';


    $sql = "";
    

    $sql .= "SELECT COUNT(*) as total, $campo, ";
    $longitudArray = sizeof($opciones);
    $i = 1;
    
    foreach ($opciones as $variable) {
        if($longitudArray > $i) {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i, ";
        }
        else {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i ";
        }
        
        $i++;
    }

    $sql .= "from encuesta GROUP BY $campo";

    $result = mysql_query($sql);

    while( $row = mysql_fetch_assoc($result) ) {
        echo '<tr>
                <td class="text-center">'.$row['total'].'</td>
                <td class="text-center">'.$row[$campo].'</td>';

        $d = 1; 

        foreach ($opciones as $variable) {
                $eltotal = $row['total'];
                $elcampo = $row['campo'.$d];
                $porcentaje = number_format( ($elcampo * 100)/$eltotal , 1);
                echo '<td class="text-center">'.$porcentaje.'%</td>';
                $d++;
            }

        echo  '</tr>';
    }
    echo "</table></div></div>";
}







function getPorcentajesGenerales($pregunta, $opciones) {

    echo '<div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                <b>Estadística General</b>
                </h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div><div class="box-body">';

    echo '<table class="table table-bordered table-hover" style="margin-bottom: 45px;">
            <tr>
            <th class="text-center">No. de encuestados</th>';

            foreach ($opciones as $variable) {
                echo '<th class="text-center">'.$variable.'</th>';
            }
            
    echo  '</tr>';


    $sql = "";
    

    $sql .= "SELECT COUNT(*) as total, ";
    $longitudArray = sizeof($opciones);
    $i = 1;
    
    foreach ($opciones as $variable) {
        if($longitudArray > $i) {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i, ";
        }
        else {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i ";
        }
        
        $i++;
    }

    $sql .= "from encuesta";

    $result = mysql_query($sql);

    while( $row = mysql_fetch_assoc($result) ) {
        echo '<tr>
                <td class="text-center">'.$row['total'].'</td>';

        $d = 1; 

        foreach ($opciones as $variable) {
                $eltotal = $row['total'];
                $elcampo = $row['campo'.$d];
                $porcentaje = number_format( ($elcampo * 100)/$eltotal , 1);
                echo '<td class="text-center">'.$porcentaje.'%</td>';
                $d++;
            }

        echo  '</tr>';
    }
    echo "</table></div></div>";
}






function getOpciones($campo, $pregunta, $opciones) {

    echo '<div class="box"><div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-sort-numeric-desc"></i>
                Estadística de la '.$pregunta.' sobre la medición de: <b>'.$campo.'
                </b></h3>
                
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>

                </div><div class="box-body">';

    echo '<table class="table table-bordered table-hover" style="margin-bottom: 45px;">
            <tr>
            <th class="text-center">No. de encuestados</th>
            <th class="text-center">'.$campo.'</th>';

            foreach ($opciones as $variable) {
                echo '<th class="text-center">'.$variable.'</th>';
            }
            
    echo  '</tr>';


    $sql = "";
    

    $sql .= "SELECT COUNT(*) as total, $campo, ";
    $longitudArray = sizeof($opciones);
    $i = 1;
    
    foreach ($opciones as $variable) {
        if($longitudArray > $i) {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i, ";
        }
        else {
            $sql .= "sum(case when $pregunta = '$variable' then 1 else 0 end) campo$i ";
        }
        
        $i++;
    }

    $sql .= "from encuesta GROUP BY $campo";

    $result = mysql_query($sql);

    while( $row = mysql_fetch_assoc($result) ) {
        echo '<tr>
                <td class="text-center">'.$row['total'].'</td>
                <td class="text-center">'.$row[$campo].'</td>';

        $d = 1; 

        foreach ($opciones as $variable) {
                echo '<td class="text-center">'.$row['campo'.$d].'</td>';
                $d++;
            }

        echo  '</tr>';
    }
    echo "</table></div></div>";
}

?>