@extends('admin.template.main')
@section('titulo', 'Admin :: Blog La Salle La Paz')

@section('contenido')
<center>
    <img src="{{ asset('img/logo-lasalle.svg') }}" width="110px" alt="Logo La Salle">
</center>
<div class="container fondo-blanco border margin-top20">
    <div class="row">
        <div class="col-xs-12 col-sm-8 text-justify">
            <h2 class="text-primary">Administración - Blog La Salle La Paz</h2>
            <h3>Hola, 
                <?php
                    $nombre = Auth::user()->name; 
                    $nombre = explode(" ",$nombre);
                    $apellido = Auth::user()->apellido; 
                    $apellido = explode(" ",$apellido);
                    echo ucwords($nombre[0] . "  " . Auth::user()->apellido); 
                ?>
            </h3>
            <p>Ingresaste al Panel de Administración del Blog La Salle La Paz.</p>
            <p><strong>El Blog es un sitio donde podrás publicar de forma cronológica artículos de diversa temática.</strong></p>
            <p>Un blog se puede adaptar a casi cualquier uso concebible en educación, tanto para el trabajo de los profesores como para el de los alumnos, debido al hecho de que su práctica moviliza procesos de aprendizaje avanzados, tales como la compresion de lectura, integración de diversas fuentes de información, práctica de escritura en diferentes contextos sociales y distintos géneros y formato, integración de textos junto a elementos gráficos y multimedia.</p>
            <h4 class="text-info">Los Profesores</h4>
            <p>Los docentes pueden utilizar los Blogs para acercarse a los estudiantes de nuevas maneras, sin tener que limitar su interacción exclusivamente al aula. Por ejemplo, publicando materiales de manera inmediata y permitiendo el acceso a información o a recursos necesarios para realizar proyectos y Actividades de aula, optimizando así el tiempo.</p>
            <h4 class="text-info">Los Alumnos</h4>
            <p>Los Blogs ofrecen muchas posibilidades de uso en procesos educativos. Por ejemplo, para estimular a los alumnos en: escribir, intercambiar  ideas, trabajar en equipo, diseñar, visualizar de manera instantánea de lo que producen, etc. La creación de Blogs por parte de estudiantes ofrece a los docentes la posibilidad de exigirles realizar procesos de síntesis, ya que al escribir en Internet deben ser puntuales y precisos, en los temas que tratan.</p>
            <h4 class="text-info">Comentarios</h4>
            <p>Tus comentarios serán bien recibidos siempre y cuando siga las siguientes reglas.</p>
            <ul>
                <li>No se aceptan comentarios insultantes, palabras obscenas, ni críticas destructivas.</li>
                <li>Respeta las opiniones de los demás.</li>
                <li>Evita las faltas ortográficas.</li>
                <li>No escrivas palabras con mayusculas, recuerda que segun las normas "netiqueta" estas represntan gritos.</li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-4 border-left">
            <h3 class="text-danger">Cambios / Mejoras</h3>
                <p>En esta seccion te informaremos de los cambios, mejoras y/o actualizaciones del panel de administración.</p>
            <h3 class="text-danger">Contacto</h3>
                <p>¿Tienes algún problema? puedes escribirnos a <span class="text-danger">admin@lasalle.edu.bo</span> </p>
        </div>
    </div>
</div>

@endsection