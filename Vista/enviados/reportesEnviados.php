<?php

include "../../Modelo/Conexion.php";

$orden = $_GET['orden'];

$desde = '1111-01-01';
$hasta = '9999-12-30';

$mostrarDesde = '__/__/____';
$mostrarHasta = '__/__/____';


if ($orden == 'generar') {
    $con = new Conexion();

    $conexion = $con->conectar();
    $sql = "SELECT MAX(consecutivo) consecutivo 
            FROM registros";
    $consecutivo;

    if ($resultado = $conexion->query($sql)) {
        /* obtener el array de objetos */
        while ($fila = $resultado->fetch_row()) {
            $consecutivo = $fila[0] + 1;
            //printf ("%s (%s)\n", $fila[0], $consecutivo);


            // UPDATE DE LOS DOCUMENTOS SIN ORDEN DE DESPACHO

            $sql_update="UPDATE registros SET consecutivo = ?                        
                            WHERE estado = 'enviado' AND consecutivo > 0";

            $query = $conexion->prepare($sql_update);
            $query->bind_param('i', $consecutivo);
            $respuesta = $query->execute();
            $query->close();

        }
        /* liberar el conjunto de resultados */
        $resultado->close();
    }
}

if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];

    $mostrarDesde = date('d/m/Y', strtotime($desde));
    $mostrarHasta = date('d/m/Y', strtotime($hasta));
}

require('../../librerias/fpdf/fpdf.php');
class PDF extends FPDF
{

    function getDesde() {
        $desde = '1111-01-01';
        $mostrarDesde = '__/__/____';

        if(strlen($_GET['desde'])>0){
            $desde = $_GET['desde'];

            $mostrarDesde = date('d/m/Y', strtotime($desde));
        }

        return $mostrarDesde;
    }

    function getHasta() {
        $hasta = '9999-12-30';
        $mostrarHasta = '__/__/____';


        if(strlen($_GET['hasta'])>0){
            $hasta = $_GET['hasta'];
            $mostrarHasta = date('d/m/Y', strtotime($hasta));
        }

        return $mostrarHasta;
    }

    function getconsecutivo(){
        $con = new Conexion();
        $conexion = $con->conectar();
 
        $orden = $_GET['orden'];
        $consecutivo = 0;
        if ($orden == 'generar') {
            $sql_consecutivo = "SELECT MAX(consecutivo) consecutivo 
                    FROM registros";
            $consecutivo;
    
            if ($resultado = $conexion->query($sql_consecutivo)) {
            /* obtener el array de objetos */
            while ($fila = $resultado->fetch_row()) {
                $consecutivo = $fila[0];
            }
            /* liberar el conjunto de resultados */
            $resultado->close();
            }
        } else {
            $consecutivo = $orden; 
        }
        return $consecutivo;
}
    // Cabecera de página
function Header()
{   
    $this->setFont('Helvetica','B',15);
    $this->Image('../../librerias/imagenes/zyro-image.png',8,8,30);
    $this->setXY(120,37);
    $this->Cell(50,8,'Grupo Metropolis de la Costa',0,0,'C',0);
    $this->Ln(17);
    $this->setFont('Helvetica','B',10);
    $this->setXY(110,40);
    $this->Cell(70,15, 'Desde: '.$this->getDesde().' hasta '. $this->getHasta(), 0,1);
    $this->setXY(50,44);
    $this->Cell(50,8,'NIT.: 900513041-9',0,1,'L',0);
    $this->setXY(50,49);
    $this->Cell(50,8,'Direccion.: Cra No 29S-12C5',0,1,'L',0);
    $this->setXY(225,52);
    $this->Cell(25,5,"fecha:".date("d/m/y"),0,1,"C");
    $this->setXY(225,47);
    $this->Cell(25,5,"consecutivo:" .$this->getconsecutivo(),0,1);
    

}

// Pie de página
function Footer()
{
    $this->setY(-90);
    $this->setFont('Helvetica','B',15);
    $this->setX(40);
    $this->Cell(30,8,'Auditoria','T',0,'C',0);

}
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data,$setX)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
    }
}

    session_start();
    $con = new Conexion();
    $conexion = $con->conectar();
    $bodega = $_SESSION['usuarios']['almacen']; 
    $orden = $_GET['orden'];
    $consecutivo = 0;
    if ($orden == 'generar') {
        $sql_consecutivo = "SELECT MAX(consecutivo) consecutivo
                FROM registros ";
        $consecutivo;

        if ($resultado = $conexion->query($sql_consecutivo)) {
        /* obtener el array de objetos */
        while ($fila = $resultado->fetch_row()) {
            $consecutivo = $fila[0];
        }
        /* liberar el conjunto de resultados */
        $resultado->close();
        }
    } else {
        $consecutivo = $orden; 
    }

    $sql="SELECT
            
                registros.id_registro AS idRegistro,
                conductores.nombre_conductor AS nombre_conductor,
                registros.id_ayudante AS id_ayudante,
                ayudantes.nombre_conductor AS nombre_ayudante,
                zona2.nombre_zona AS nombre_zona,
                carga.clasificacion AS clasificacion,
                registros.cod_almacen AS almacen,
                registros.fecha AS fecha,
                registros.prefijo AS prefijo,
                registros.factura AS factura,
                registros.valor_factura AS valor,
                registros.cedula AS cedula,
                registros.nombre AS nombre,
                registros.direccion AS direccion,
                registros.telefono AS telefono,
                registros.zona AS zona,
                registros.fecha_despacho AS fechad,
                registros.canal AS canal,
                registros.estado AS estado
            FROM
                registros AS registros
                    INNER JOIN
                conductores AS conductores ON registros.id_conductor = conductores.id_conductor
                    LEFT JOIN
                conductores AS ayudantes ON registros.id_ayudante = ayudantes.id_conductor
                    INNER JOIN
                zona2 AS zona2 ON registros.id_zona = zona2.id_zona
                    INNER JOIN
                carga AS carga ON registros.id_carga = carga.id_carga
                    WHERE registros.consecutivo = $consecutivo and registros.cod_almacen ='$bodega'";
    $respuesta = mysqli_query($conexion, $sql);
    


// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('p','A3');
$pdf->SetAutoPageBreak(true,20);
$pdf->Image('../../librerias/imagenes/marca.jpeg',60,57,180);
$pdf->SetXY(50,60);
$pdf->SetFillColor(233,229,235);
$pdf->SetDrawColor(61,61,61);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(30,8,'Cod_almacen',1,0,'C',1);
$pdf->Cell(20,8,'Fecha',1,0,'C',1);
$pdf->Cell(30,8,'Conductor',1,0,'C',1);
$pdf->Cell(30,8,'Ayudante',1,0,'C',1);
$pdf->Cell(20,8,'Prefijo',1,0,'C',1);
$pdf->Cell(20,8,'Factura',1,0,'C',1);
$pdf->Cell(30,8,'Vr Factura',1,0,'C',1);
$pdf->Cell(30,8,'Cliente',1,0,'C',1);
$pdf->Cell(20,8,'Zona',1,1,'C',1);

//$pdf->Multicell(0,8,$sql);


//colorear fondo

$pdf->Setfont('Arial','',9);
$pdf->SetWidths(array(30,20,30,30,20,20,30,30,20,30));
while($mostrar= mysqli_fetch_array($respuesta)){
    $pdf->SetX(50);
    $pdf->Row(array($mostrar['almacen'],$mostrar['fecha'],$mostrar['nombre_conductor'],$mostrar['nombre_ayudante'],utf8_decode($mostrar['prefijo']),$mostrar['factura'],$mostrar['valor'],$mostrar['nombre'],$mostrar['zona']),30);
    
}


$pdf->Output();