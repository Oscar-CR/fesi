<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documento PDF</title>
</head>
<body>
    <div class="container">
        <div class="flex">
            <p style="font-weight: bold; font-size: 16px;">
                CRITERIOS PARA EL EXAMEN EXTRAORDINARIO DEL {{ strtoupper($period->name) }}
            </p>
        </div>
        
        <table border="1" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td  style="width: 30%; text-align: center;"><label for="sinodal1" style="padding: 4px; font-weight: bold; font-size: 14px;">Asignatura:</label></td>
                <td  style="width: 70%; text-align: center;" ><p  style="padding: 4px; font-weight: bold; font-size: 14px;">{{ $course->name }} ({{ $course->themeHasCourse->theme->name }})</p> </td>
            </tr>
            <tr>
                <td  style="width: 30%; padding: 10px; font-weight: bold; font-size: 12px;"><label for="sinodal1" >1. SINODAL(ES): (NOMBRE COMPLETO)</label></td>
                <td  style="width: 70%; padding: 10px; font-size: 14px;">
                    <p>{{ isset($course->sinodal1)? $course->sinodal1 : ''  }}</p>
                    <p>{{ isset($course->sinodal2)? $course->sinodal2 : ''  }}</p>
                    <p>{{ isset($course->sinodal3)? $course->sinodal3 : ''  }}</p>
                </td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="sinodal2" class="font-bold" >2. CORREO ELECTRÓNICO:</label></td>
                <td  style="padding: 10px; font-size: 14px;">
                    <p>{{ isset($course->sinodal1email)? $course->sinodal1email : '' }}</p>
                    <p>{{ isset($course->sinodal2email)? $course->sinodal2email : '' }}</p>
                    <p>{{ isset($course->sinodal3email)? $course->sinodal3email : '' }}</p>
                </td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="date_test" class="font-bold" >3. FECHA DEL EXÁMEN</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->date_test }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="school_shift" >4. TURNO DEL EXAMEN:</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->school_shift }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="school_shift">5. BREVE INTRODUCCIÓN: (OPCIONAL)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->introduction }}</td>
            </tr>

            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="classroom">6. AULA EN DONDE SE LLEVARÁ A CABO EL EXAMEN:</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->classroom }}</td>
            </tr>

            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="general_criteria" >7. CRITERIOS GENERALES PARA DERECHO A EXAMEN:</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->general_criteria }}</td>
            </tr>

            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="start">8. HORARIO INICIO: </label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ \Carbon\Carbon::parse($course->start)->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="end" >HORARIO FIN:</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ \Carbon\Carbon::parse($course->end)->format('Y-m-d H:i') }}</td>
            </tr>
        
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="documents">9. DOCUMENTOS A ENTREGAR: (COMPROBANTE DE INSCRIPCIÓN, IDENTIFICACIÓN OFICIAL, OTROS)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->documents }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="works" class="font-bold">10. TRABAJOS PREVIOS A ENTREGAR: (OPCIONAL)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->works }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="work_criteria" >11. CRITERIOS DE TRABAJOS PREVIOS A ENTREGAR: (OPCIONAL EN RELACIÓN CON EL PUNTO ANTERIOR)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->work_criteria }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="work_requeriment">12. ESPECIFICAR LA FORMA DE ENTREGAR LOS TRABAJOS PREVIOS: (OPCIONAL EN RELACIÓN CON EL PUNTO ANTERIOR: POR CORREO O EN FÍSICO EL DÍA DEL EXAMEN)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->work_requeriment }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="evaluation_criteria" >13. CRITERIOS DE EVALUACIÓN DEL EXAMEN EXTRAORDINARIO A PRESENTAR</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->evaluation_criteria }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="theme_references">14. TEMAS Y REFERENCIAS A CONSULTAR PARA PREPARAR LA PRESENTACIÓN DEL EXAMEN EXTRAORDINARIO</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->theme_references }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="suggestion" >15. SUGERENCIAS PARA LA PRESENTACIÓN DEL EXAMEN EXTRAORDINARIO: (OPCIONAL)</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->suggestion }}</td>
            </tr>
            <tr>
                <td  style="padding: 10px; font-weight: bold; font-size: 12px;"><label for="other">16.OTROS ELEMENTOS QUE SE CONSIDEREN IMPORTANTES PARA QUE EL ALUMNADO PRESENTE EL EXTRAORDINARIO</label></td>
                <td  style="padding: 10px; font-size: 14px;">{{ $course->other }}</td>
            </tr>
        </tbody>
    </table>

    </div>
</body>
</html>