<?php
$desde = '1111-01-01';
$hasta = '9999-12-30';

$mostrarDesde = '__/__/____';
$mostrarHasta = '__/__/____';


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
// Cabecera de página
function Header()
{   
    $this->setFont('Helvetica','B',15);
    $this->Image('../../librerias/imagenes/zyro-image.png',45,4,30);
    $this->setXY(120,37);
    $this->Cell(60,8,'Grupo Metropolis de la Costa',0,0,'C',0);
    $this->Ln(15);
    $this->setFont('Helvetica','B',10);
    $this->setXY(120,40);
    $this->Cell(70,15, 'Desde: '.$this->getDesde().' hasta '. $this->getHasta(), 0,1);
    $this->setXY(46,44);
    $this->Cell(50,8,'NIT.: 900513041-9',0,1,'L',0);
    $this->setXY(170,47);
    $this->Cell(110,5,"Fecha: ".date("d/m/y"),0,1,"R");
    $this->setXY(46,49);
    $this->Cell(50,8,'Direccion.: Cra No 29S-12C5',0,1,'L',0);

    $this->setXY(120,50);
    $this->Cell(125, 8, ($_GET['tipo_conductor'] == 'conductor') ? "Reporte Conductores" : "Reporte Ayudantes", 0, 1, 'R');
    



}

// Pie de página
function Footer()
{
    $this->setY(-175);
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

include "../../Modelo/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $cod_almacen = $_GET['bodega'];
    $conductor = $_GET['tipo_conductor'];
    /* $sql="SELECT 	
                registros.cod_almacen AS bodega,
                conductores.nombre_conductor AS nombre_conductor,
                COUNT(registros.id_conductor) veces_conductor, zona2.valor_zona,carga.valor_clasificacion,
                
                
                
                COUNT(registros.id_conductor)*ROUND((zona2.valor_zona*(1+carga.valor_clasificacion))*conductores.bon_conductor,2)total_pagar_conductor,
                registros.fecha AS fecha_registro,
                registros.fecha_despacho AS fecha_salida
                
                FROM registros 
                INNER JOIN
                conductores conductores ON registros.id_conductor = conductores.id_conductor
                    INNER JOIN
                zona2 AS zona2 ON registros.id_zona = zona2.id_zona
                INNER JOIN
                carga AS carga ON registros.id_carga = carga.id_carga
                INNER JOIN 
                roles AS roles ON conductores.id_rol = roles.id_rol
	
    WHERE conductores.cod_almacen = '$cod_almacen' and  registros.fecha_despacho BETWEEN '$desde' AND '$hasta'
    AND nombre_rol = '$conductor'
    GROUP BY conductores.id_conductor, conductores.nombre_conductor, zona2.valor_zona";
    $respuesta = mysqli_query($conexion, $sql); */
    
    /*$cod_almacen = $_GET['bodega'];
    $conductor = $_GET['tipo_conductor'];*/
    
    if($conductor == 'conductor'|| $conductor == 'externo') { 

        $sql = "SELECT 	
            registros.cod_almacen AS bodega,
            conductores.nombre_conductor AS nombre,
            COUNT(registros.id_conductor) cantidad, 
            carga.clasificacion as carga,
            zona2.valor_zona,
            zona2.nombre_zona as zona,
            carga.valor_clasificacion,
            SUM(ROUND((zona2.valor_zona*( carga.valor_clasificacion))*conductores.bon_conductor,2)) total_pagar,
            registros.fecha AS fecha_registro,
            registros.fecha_despacho AS fecha_salida
            /*COUNT(registros.id_conductor)*ROUND((zona2.valor_zona*(1+carga.valor_clasificacion))*conductores.bon_conductor,2) total_pagar,*/
    
        FROM registros 
        INNER JOIN conductores conductores ON registros.id_conductor = conductores.id_conductor
        INNER JOIN zona2 AS zona2 ON registros.id_zona = zona2.id_zona
        INNER JOIN carga AS carga ON registros.id_carga = carga.id_carga
        INNER JOIN  roles AS roles ON conductores.id_rol = roles.id_rol
        WHERE conductores.cod_almacen = '$cod_almacen' and   registros.fecha BETWEEN '$desde' AND '$hasta'
        AND nombre_rol = '$conductor'
        AND estado = 'entregado'
        GROUP BY conductores.nombre_conductor";
        


    } else {
        $sql="SELECT 	
                registros.cod_almacen AS bodega,
                ayudantes.nombre_conductor AS nombre,
                COUNT(registros.id_ayudante) cantidad, 
                carga.clasificacion as carga,
                zona2.valor_zona,
                zona2.nombre_zona as zona,
                carga.valor_clasificacion,
                SUM(ROUND((zona2.valor_zona*( carga.valor_clasificacion))*ayudantes.bon_ayudante,2)) total_pagar,
                /*COUNT(registros.id_ayudante)*ROUND((zona2.valor_zona*(1+carga.valor_clasificacion))*ayudantes.bon_ayudante,2) total_pagar,*/
                registros.fecha AS fecha_registro,
                registros.fecha_despacho AS fecha_salida
        FROM registros 
        INNER JOIN conductores AS ayudantes ON registros.id_ayudante = ayudantes.id_conductor
        INNER JOIN zona2 AS zona2 ON registros.id_zona = zona2.id_zona
        INNER JOIN carga AS carga ON registros.id_carga = carga.id_carga
        INNER JOIN roles AS roles ON ayudantes.id_rol = roles.id_rol
        WHERE ayudantes.cod_almacen = '$cod_almacen'  and   registros.fecha BETWEEN '$desde' AND '$hasta'
            AND nombre_rol = '$conductor' and estado = 'entregado'
        GROUP BY  ayudantes.nombre_conductor";
        
    }
    
    $respuesta = mysqli_query($conexion, $sql);
    
// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A3');
$pdf->SetFont('Helvetica','B',16);
$pdf->Image('../../librerias/imagenes/marca.jpeg',55,57,180);
$pdf->SetXY(45,60);
$pdf->SetFillColor(233,229,235);
$pdf->SetDrawColor(61,61,61);
$pdf->SetFont('Helvetica','B',12);

$pdf->Cell(30,8,'cod_bodega',1,0,'C',1);
$pdf->Cell(30,8,'Conductor',1,0,'C',1);
$pdf->Cell(35,8,'Viajes',1,0,'C',1);
$pdf->Cell(35,8,'Zona',1,0,'C',1);
$pdf->Cell(35,8,'carga',1,0,'C',1);
$pdf->Cell(35,8,'Total Pagar',1,1,'C',1);





//colorear fondo
$contador = 1;

$pdf->Setfont('Arial','',9);
$pdf->SetWidths(array(30,30,35,35,35,35));
while($mostrar= mysqli_fetch_array($respuesta)){
    $pdf->SetX(45);
    $pdf->Row(array(
        $mostrar['bodega'],
        $mostrar['nombre'],
        $mostrar['cantidad'],
        $mostrar['zona'],
        $mostrar['carga'],
        number_format($mostrar['total_pagar'], 2)), 30);

        $contador++;
        if($contador >=66){
            $contador =1;
            $pdf->AddPage('p','A3');
            $pdf->SetXY(20,60);
            $pdf->SetFont('Helvetica','B',12);

            $pdf->Cell(30,8,'cod_bodega',1,0,'C',1);
            $pdf->Cell(30,8,'Conductor',1,0,'C',1);
            $pdf->Cell(35,8,'Viajes',1,0,'C',1);
            $pdf->Cell(35,8,'Zona',1,0,'C',1);
            $pdf->Cell(35,8,'carga',1,0,'C',1);
            $pdf->Cell(35,8,'Total Pagar',1,0,'C',1);
            $pdf->Cell(32,8,'fecha_registro',1,0,'C',1);
            $pdf->Cell(34,8,'fecha_despacho',1,1,'C',1);
            $pdf->Setfont('Arial','',9);
        }
}


$pdf->Output();