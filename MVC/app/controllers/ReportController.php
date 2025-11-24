<?php

    include_once "app/models/ReportModel.php";
    include_once "config/db_connection.php";
    include_once "public/libraries/fpdf/fpdf.php";
    include_once "public/libraries/phplot/phplot.php";

    class ReportController{
        
        private $model;

        public function __construct($connectio){
            $this -> model = new ReportModel($connectio);
        }

        public function generarPDF(){

            $usuarios = $this -> model -> consultarUsuarios();
            // Crear la instancia y crear el archivo
            $pdf = new FPDF();
            $pdf -> AddPage(); // Añadir una pagina

            // Titulo del Archivo
            $pdf -> SetFont('Arial', 'B', 16);
            $pdf -> Cell(0, 10, "Usuarios en la base de datos", 0, 1, 'C');
            $pdf -> Ln(10); // Salto de linea

            // CABECERRA DE LA TABLA
            $pdf -> SetFont('Arial', 'B', 12);
            $pdf -> SetFillColor(80, 0, 180); // Agregar un relleno con color
            $pdf -> SetTextColor(255,255,255); // Cambiar el calor de la letra

            $pdf -> Cell(20,10,'ID',1,0,'C',true);
            $pdf -> Cell(40,10,'Nombre',1,0,'C',true);
            $pdf -> Cell(40,10,'Apellido Paterno',1,0,'C',true);
            $pdf -> Cell(40,10,'Apellido Materno',1,0,'C',true);
            $pdf -> Cell(40,10,'Genero',1,0,'C',true);
            $pdf -> ln();


            $pdf -> SetFont('Arial', 'B', 12);
            $pdf -> SetTextColor(0,0,0);

            // todo lo que esta en comentarios no me sirve aun
            $hombres = 0;
            $mujeres = 0;
            $otros = 0;
            $i = 0;

            foreach($usuarios as $u){
                $pdf -> Cell(20,10,$u['idAlumno'],1,0,'C');
                $pdf -> Cell(40,10,$u['nombre'],1,0,'C');
                $pdf -> Cell(40,10,$u['apellidoP'],1,0,'C');
                $pdf -> Cell(40,10,$u['apellidoM'],1,0,'C');
                $pdf -> Cell(40,10,$u['genero'],1,0,'C');
                $pdf -> ln();
                
                $i++;
                //sumar los valores de todas las edades y aumentar el contador
                if(strtolower($u['genero']) == "masculino"){
                    $hombres++;
                }elseif(strtolower($u['genero']) == "femenino"){
                    $mujeres++;
                }else{
                    $otros++;
                }
            }

            if($i > 0){
                $porcentajeH = ($hombres / $i) * 100;
                $porcentajeM = ($mujeres / $i) * 100;
                $porcentajeO = ($otros / $i) * 100;

                $pdf -> Ln(10);
                $pdf->Cell(0,10,"Porcentaje de Hombres: " . number_format($porcentajeH, 2) . "%",0,1);
                $pdf->Cell(0,10,"Porcentaje de Mujeres: " . number_format($porcentajeM, 2) . "%",0,1);
                $pdf->Cell(0,10,"Porcentaje de Otros: " . number_format($porcentajeO, 2) . "%",0,1);
            }else{
                $pdf->Ln(10);
                $pdf->Cell(0,10,"No hay usuarios para calcular estadísticas.",0,1);
            }
            $pdf -> OutPut('I', 'Reporte_usuarios.pdf');
        }

        public function generarPastel(){

            $data = $this -> model -> consultarGenero();

            // GERERAR GRAFICA
            $plot = new PHPlot(600, 400);

            $plot -> SetDataValues($data); // Añadir los datos de la grafica
            $plot -> SetPlotType('pie'); // Grafica de pastel
            $plot -> SetDataType('text-data-single');

            $plot -> SetTitle('Porcentaje de productos por marca');

            $plot -> SetLegend(array_column($data,0));

            $filename = 'public/media/graphs/grafica_pastel.png';

            $plot -> SetOutputFile($filename);
            $plot -> SetIsInline(true);
            $plot -> DrawGraph();

            // Generar PDF
            $pdf = new FPDF();
            $pdf -> AddPage();

            $pdf -> SetFont('Arial', 'B', 16);
            $pdf -> Cell(0, 10, 'Reporte de marcas', 0, 1, 'C');
            $pdf -> Image($filename, 30, 40, 150, 100);
            $pdf -> Ln(100);

            $pdf -> Output();
        }


        public function generarPDF_Top3() {

            $top3 = $this->model->top3Materiales();

            $pdf = new FPDF();
            $pdf->AddPage();

            // TÍTULO
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, "Top 3 Materiales Mejor Calificados", 0, 1, 'C');
            $pdf->Ln(10);

            // CABECERA
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetFillColor(80, 0, 180); // morado
            $pdf->SetTextColor(255,255,255);

            $pdf->Cell(120, 10, 'Nombre del Material', 1, 0, 'C', true);
            $pdf->Cell(40, 10, 'Puntaje', 1, 1, 'C', true);

            // CUERPO
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetTextColor(0,0,0);

            foreach ($top3 as $row) {
                $pdf->Cell(120, 10, $row['nombreMaterial'], 1, 0, 'C');
                $pdf->Cell(40, 10, $row['puntaje'], 1, 1, 'C');
            }

            $pdf->Output('I', 'Reporte_Top3_Materiales.pdf');
        }

        public function generarReporteCategorias() {
            $categorias = $this->model->obtenerCategorias();
            $total = $this->model->contarCategorias();

            $pdf = new FPDF();
            $pdf->AddPage();

            // TÍTULO
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, "Reporte de Categorias", 0, 1, 'C');
            $pdf->Ln(5);

            // TOTAL
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(0, 10, "Total de categorias registradas: " . $total, 0, 1, 'L');
            $pdf->Ln(5);

            // CABECERA DE TABLA
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->SetFillColor(80, 0, 180); // morado UPEMOR
            $pdf->SetTextColor(255,255,255);

            $pdf->Cell(40, 10, 'ID', 1, 0, 'C', true);
            $pdf->Cell(140, 10, 'Nombre de la Categoria', 1, 1, 'C', true);

            // CUERPO
            $pdf->SetFont('Arial', '', 12);
            $pdf->SetTextColor(0, 0, 0);

            while ($row = $categorias->fetch_assoc()) {
                $pdf->Cell(40, 10, $row['idCategoria'], 1, 0, 'C');
                $pdf->Cell(140, 10, $row['nombreCategoria'], 1, 1, 'C');
            }

            $pdf->Output('I', 'Reporte_Categorias.pdf');
        }


    }