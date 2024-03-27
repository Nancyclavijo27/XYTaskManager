<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task; // Asegúrate de importar el modelo Task si no lo has hecho ya
use Dompdf\Dompdf;


class ReportController extends Controller
{
    public function generateReport(Request $request)
    {
        // Lógica para obtener los datos necesarios para el informe
        $data = [
            'title' => 'Informe de Tareas',
            'tasks' => Task::all(), // Suponiendo que tienes un modelo Task y deseas incluir todas las tareas en el informe
        ];

        // Cargar la vista que contendrá el diseño del informe
        $html = view('admin.tasks.generate', $data)->render();

        // Crear una nueva instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML generado en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el archivo PDF con un nombre específico
        return $dompdf->stream('informe.pdf');

        return view('reports.generate', $data);
    }
}
