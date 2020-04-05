<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = DB::select('select id from users where username = ?', ['jperez']);
        // dd($usuarios);

        // Usando el constructor de consultas de Laravel
        $categorias = DB::table('categorias')->select('id')->take(1)->get();
        //dd($categorias);

        DB::table('articulos')->insert([
            'titulo' => 'El argentino que le dijo “no” a los Juegos',
            'cuerpo' => 'Mientras crecen los casos de coronavirus en el mundo, que ya ascienden a los casi 316 mil infectados y más de 13 mil muertos, Japón está decidido a realizar los Juegos Olímpicos de Tokio 2020 en la fecha prevista, del 24 de julio al 9 de agosto. Distintas federaciones y deportistas ya se manifestaron en contra de la celebración del evento y ahora fue el turno de Eulalio Muñoz. el primer argentino que le dijo "no" a los Juegos.
            En sus redes sociales, el maratonista de 24 años aseguró que en este momento sólo hay que pensar en la salud de la gente y pidió la postergación: “Con mi entrenador hemos estado hablando sobre los Juegos Olímpicos y creemos que hoy por hoy lo ideal sería la suspensión de los mismos, ya que lo más importante actualmente es la salud de todo el mundo”.',
            'user_id' =>  $usuarios[0]->id,
            'categoria_id' => $categorias->first()->id
        ]);

        $usuario = DB::table('users')->select('id')->where('username', '=', 'pchacon')->first();
        //$usuario = DB::table('users')->select('id')->first();
        // dd($usuarios);
        $categoria = DB::table('categorias')->select('id')->where('nombre', '=', 'Espectaculos')->first();
        //dd($categorias);

        DB::table('articulos')->insert([
            'titulo' => 'Más de 100 mil personas vieron el “show en casa” de Fito Páez',
            'cuerpo' => 'En el primer día de aislamiento obligatorio ante la pandemia de coronavirus, Fito Páez ofreció un concierto por streaming, desde su casa, en el que mostró algunas canciones de su nuevo disco “La conquista del espacio”, varios de sus clásicos interpretó versiones de autores a los que admira.
            A modo de consuelo por la cancelación del concierto que el pasado viernes 13 de marzo iba a realizar en el Hipódromo de Rosario para presentar su flamante álbum, el músico optó por un relajado formato que fue seguido por más de 100 mil personas.
            Con su piano, una vitrola como único decorado de fondo y varias partituras desparramadas sobre su instrumento, Fito Páez fue eligiendo sobre la marcha el material a tocar durante los 73 minutos de música.
            Fito se dio el gusto de homenajear a grandes autores latinoamericanos como Caetano Veloso, Gilberto Gil, Violeta Parra y Armando Manzanero; además de Bob Dylan; y de lamentar que quedaban fuera Charly García y Luis Alberto Spinetta.
            Fito Páez interpretó 15 canciones entre las que incluyó las novedosas “Resucitar”, “La canción de las bestias” y “La conquista del espacio”.',
            'user_id' =>  $usuario->id,
            'categoria_id' => $categoria->id
        ]);

        $usuario = DB::table('users')->where(['username' => 'lucham'])->first();
        //dd($usuario);
        //$categoriaId = DB::table('categorias')->where(['nombre' => 'Tecnologia'])->value('id');
        $categoriaId = DB::table('categorias')->whereNombre('Tecnologia')->value('id');
        //dd($categorias);

        DB::table('articulos')->insert([
            'titulo' => 'Coronavirus: cómo es el juego para adivinar películas de WhatsApp, ideal para distraerse en cuarentena',
            'cuerpo' => 'Debido a la cuarentena total y obligatoria , todas las personas deben quedarse en sus casas para prevenir contagios de coronavirus Covid-19 . Gracias a la Internet, al streaming de contenidos audiovisuales y las redes sociales el "aislamiento social, preventivo y obligatorio" puede ser más llevadero. Un ejemplo es el juego para adivinar películas con emojis que se viralizó por WhatsApp.
            Si bien el acertijo no es nuevo, en estos días de confinamiento hogareño debido a la pandemia de coronavirus, volvió a viralizarse por la aplicación de chats más usada.
            El juego es sencillo. A un usuario o grupo le comparten un listado con 60 items. Cada punto incluye una serie de emojis y el desafío es adivinar la película codificada en esas imágenes .
            Una especie de "dígalo con emojis" . Ideal para jugar con las personas que se comparte la cuarentena o en línea con todos los contactos de su agenda.',
            'user_id' =>  $usuario->id,
            'categoria_id' => $categoriaId
        ]);

    }
}
