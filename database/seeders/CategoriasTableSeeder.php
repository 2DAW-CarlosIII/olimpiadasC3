<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Categoria::truncate();
        foreach (self::$categorias as $categoria) {
            \App\Models\Categoria::create([
                'id' => $categoria['id'],
                'nombre' => $categoria['nombre'],
                'descripcion' => self::$descripciones[$categoria['id'] - 1],
            ]);
        }
    }

    private static $categorias = array(
        array('id' => 1, 'nombre' => 'Olimpiada Informática de Grado Medio'),
        array('id' => 2, 'nombre' => 'Olimpiada Informática de Grado Superior'),
        array('id' => 3, 'nombre' => 'Concurso Regional de Modding'),
        array('id' => 4, 'nombre' => 'Concurso Regional de C3Gamer'),
    );

    private static $descripciones = [
        '<p>La <strong>Olimpiada Inform&aacute;tica de Grado Medio</strong> es un evento que ayuda a incrementar el inter&eacute;s de las alumnas y los alumnos por sus estudios.</p>
<p>Los participantes compiten en una serie de desaf&iacute;os sobre:</p>
<ul>
<li>hardware</li>
<li>sistemas inform&aacute;ticos</li>
<li>redes</li>
<li>ofim&aacute;tica</li>
</ul>
<p>La competici&oacute;n se lleva a cabo en un <strong>ambiente amigable y colaborativo</strong>, donde los equipos pueden aprender unos de otros y mejorar sus habilidades.</p>
<p>Estos equipos estar&aacute;n formados por hasta tres estudiantes, matriculados en ciclos de Grado Medio de la familia profesional de Inform&aacute;tica y Comunicaciones.</p>',
        '<p>La <strong>Olimpiada Inform&aacute;tica de Grado Superior</strong> es un evento que ayuda a incrementar el inter&eacute;s de las alumnas y los alumnos por sus estudios.</p>
<p>Los participantes compiten en una serie de desaf&iacute;os sobre:</p>
<ul>
<li>sistemas inform&aacute;ticos</li>
<li>programaci&oacute;n</li>
<li>redes</li>
<li>bases de datos</li>
<li>lenguajes de marcas</li>
</ul>
<p>La competici&oacute;n se lleva a cabo en un <strong>ambiente amigable y colaborativo</strong>, donde los equipos pueden aprender unos de otros y mejorar sus habilidades.</p>
<p>Estos equipos estar&aacute;n formados por hasta tres estudiantes, matriculados en ciclos de Grado Medio o Superior de la familia profesional de Inform&aacute;tica y Comunicaciones.</p>',
'<p>El <strong>Modding</strong> consiste en personalizar los ordenadores PC mediante varias t&eacute;cnicas, como por ejemplo a&ntilde;adir luces, modificar la estructura del chasis, instalar componentes y/o modificar la forma de &eacute;stos. Su finalidad es obtener un dise&ntilde;o m&aacute;s atractivo y espectacular. En definitiva, es el arte de dar forma y color a un PC, invirtiendo en ello toda la imaginaci&oacute;n posible.</p>
<p>A los equipos participantes se les reta a presentar moddings sorprendentes relacionados con la tem&aacute;tica elegida para cada edici&oacute;n.&nbsp;</p>',
'<p>Los <strong>videojuegos</strong> han dejado de ser simplemente una forma de entretenimiento. Hoy en d&iacute;a, son una poderosa herramienta <strong>educativa y creativa</strong>.</p>
<p>Detr&aacute;s de cada juego hay un equipo de <em>desarrolladores</em>, <em>artistas</em>, <em>programadores</em> y <em>dise&ntilde;adores</em> que trabajan arduamente para dar vida a mundos virtuales.</p>
<p>Nuestros alumnos de FP no solo juegan videojuegos, sino que tambi&eacute;n los crean. Este campeonato es una oportunidad para que muestren sus habilidades y su talento.</p>'
    ];
}
