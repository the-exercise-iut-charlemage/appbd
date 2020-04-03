<?php
require_once 'vendor/autoload.php';

use appdb\models\Character;
use appdb\models\Game;
use appdb\models\Company;
use appdb\models\Platform;
use appdb\models\User;
use \Illuminate\Database\Capsule\Manager as DB;
use Slim\Slim;
use appdb\models\Genre;

$db = new DB();

$db->addConnection(parse_ini_file('db.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$app = new Slim();

$app->get('/', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('tp1-exo1');
    $url2 = $slim->urlFor('tp1-exo2');
    $url3 = $slim->urlFor('tp1-exo3');
    $url4 = $slim->urlFor('tp1-exo4');
    $url5 = $slim->urlFor('tp1-exo5');

    $url6 = $slim->urlFor('tp2-exo1');
    $url7 = $slim->urlFor('tp2-exo2');
    $url8 = $slim->urlFor('tp2-exo3');
    $url9 = $slim->urlFor('tp2-exo4');
    $url10 = $slim->urlFor('tp2-exo5');
    $url11 = $slim->urlFor('tp2-exo6');
    $url12 = $slim->urlFor('tp2-exo7');

    $url13 = $slim->urlFor('tp3-exo1');
    $url14 = $slim->urlFor('tp3-exo2');
    $url15 = $slim->urlFor('tp3-exo3');
    $url16 = $slim->urlFor('tp3-exo4');

    $url17 = $slim->urlFor('tp3-p2-exo1');
    $url18 = $slim->urlFor('tp3-p2-exo2');
    $url19 = $slim->urlFor('tp3-p2-exo3');
    $url20 = $slim->urlFor('tp3-p2-exo4');

    $url21 = $slim->urlFor('tp4-exo1');
    echo <<<html
<div>
    <h1>TP 1:</h1>
    <a href='$url1'>Exo1</a>
    <a href='$url2'>Exo2</a>
    <a href='$url3'>Exo3</a>
    <a href='$url4'>Exo4</a>
    <a href='$url5'>Exo5</a>
</div>
<hr>
<div>
    <h1>TP 2:</h1>
    <a href='$url6'>Exo1</a>
    <a href='$url7'>Exo2</a>
    <a href='$url8'>Exo3</a>
    <a href='$url9'>Exo4</a>
    <a href='$url10'>Exo5</a>
    <a href='$url11'>Exo6</a>
    <a href='$url12'>Exo7</a>
</div>
<hr>
<div>
    <h1>TP 3 Partie 1:</h1>
    <a href='$url13'>Exo1</a>
    <a href='$url14'>Exo2</a>
    <a href='$url15'>Exo3</a>
    <a href='$url16'>Exo4</a>
</div>
<hr>
<div>
    <h1>TP 3 Partie 2:</h1>
    <a href='$url17'>Exo1</a>
    <a href='$url18'>Exo2</a>
    <a href='$url19'>Exo3</a>
    <a href='$url20'>Exo4</a>
</div>
<hr>
<div>
    <h1>TP 4:</h1>
    <a href='$url21'>Exo1</a>
</div>
<hr>
html;
})->name('home');

$app->get('/tp1/exo1', function () {
    $exo1 = Game::select('name', 'description')->where('name', 'like', '%mario%')->get();
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP1-Exo 1<br>
html;
    foreach ($exo1 as $values)
    {
        echo '<h1>' . $values->name . '</h1><br><p>' . $values->description . '</p><br><hr><br>';
    }
})->name('tp1-exo1');


$app->get('/tp1/exo2', function () {
    $exo2 = Company::select('name', 'description')->where('location_country', '=', 'japan')->get();
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP1-Exo 2<br>
html;
    foreach ($exo2 as $values)
    {
        echo '<h1>' . $values->name . '</h1><br><p>' . $values->description . '</p><br><hr><br>';
    }
})->name('tp1-exo2');


$app->get('/tp1/exo3', function () {
    $exo3 = Platform::select('name', 'description')->where('install_base', '>=', '10000000')->get();
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP1-Exo 3<br>
html;
    foreach ($exo3 as $values)
    {
        echo '<h1>' . $values->name . '</h1><br><p>' . $values->description . '</p><br><hr><br>';
    }
})->name('tp1-exo3');

$app->get('/tp1/exo4', function () {
    $exo4 = Game::select('name', 'description')->whereBetween('id', ['21173', '21614'])->get();
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP1-Exo 4<br>
html;
    foreach ($exo4 as $values)
    {
        echo '<h1>' . $values->name . '</h1><br><p>' . $values->description . '</p><br><hr><br>';
    }
})->name('tp1-exo4');

$app->get('/tp1/exo5', function () {
    $start = 0;
    $end = 500;
    $page = 0;
    $prev = 0;
    $next = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $next = $page + 1;
        $prev = $page - 1;
        if ($prev < 0) $prev = 0;
        $start = 0 + 500 * $page;
        $end = 500 + 500 * $page;
    }
    $exo5 = Game::select('name', 'deck')->whereBetween('id', [$start, $end])->get();
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    $url2 = $slim->urlFor('tp1-exo5');
    echo <<<html
<a href='$url1'>Home</a>
TP1-Exo 5: page n°$page<br>
<a href='$url2?page=$prev'>prev</a>
<a href='$url2?page=$next'>next</a>
html;
    foreach ($exo5 as $values)
    {
        echo '<h1>' . $values->name . '</h1><br><p>' . $values->deck . '</p><br><hr><br>';
    }
})->name('tp1-exo5');



$app->get('/tp2/exo1', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    $html = <<<html
<a href='$url1'>Home</a>
TP2-Exo 1<br>
html;

    $games = Game::where('id', '=', '12342')->get();
    foreach ($games as $value) {
        $html .= '<hr>Deck :' . $value->deck . '<br><br>Characters:<br>';
        foreach ($value->characters as $char) {
            $html .= $char->name . '<br>';
        }
    }
    echo $html;
})->name('tp2-exo1');

$app->get('/tp2/exo2', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    $html = <<<html
<a href='$url1'>Home</a>
TP2-Exo 2<br>
html;

    $games = Game::where('name', 'like', 'Mario%')->get();
    foreach ($games as $value) {
        $html .= '<hr>Personnage de ' . $value->name . ' :<br>';
        foreach ($value->characters as $char) {
            $html .= $char->name . '<br>';
        }
    }
    echo $html;
})->name('tp2-exo2');

$app->get('/tp2/exo3', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    $html = <<<html
<a href='$url1'>Home</a>
TP2-Exo 3<br>
html;

    $companies = Company::where('name', 'like', '%Sony%')->get();
    foreach ($companies as $value) {
        $html .= '<hr>Jeux de ' . $value->name . ' :<br>';
        foreach ($value->gameDevelops as $game) {
            $html .= $game->name . '<br>';
        }
    }
    echo $html;
})->name('tp2-exo3');

$app->get('/tp2/exo4', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP2-Exo 4<br>
html;

    foreach (Game::where('name', 'like', 'Mario%')->get() as $game) {
        echo '<h3>'. $game->name . ' : ' . $game->id . "</h3><ul>";
        foreach ($game->original_game_ratings as $rating) {
            echo '<li>'. $rating->name . ' ('. $rating->rating_board->name . ")</li>";
        }
        echo "</ul>";
    }
})->name('tp2-exo4');

$app->get('/tp2/exo5', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP2-Exo 5<br>
html;

    foreach (Game::where('name', 'like', 'Mario%')->has('characters', '>', 3)->get() as $game) {
        echo '<h3>' . $game->name . ' : ' . $game->id . "<h3><ul>";
        foreach ($game->characters as $ch) {
            echo '<li>'.$ch->id . '. ' . $ch->name . ' : '.$ch->deck . "</li>" ;
        }
        echo "</ul>";
    }
})->name('tp2-exo5');

$app->get('/tp2/exo6', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP2-Exo 6<br>
html;

    foreach (Game::where('name', 'like', 'Mario%')
                 ->whereHas('original_game_ratings', function($q){
                     $q->where('name', 'like', '%3+%');
                 })

                 ->get() as $game)  {
        echo '<h3>'. $game->name . ' : ' . $game->id . "<h3><ul><li><ul>";
        foreach ($game->original_game_ratings as $rating) {
            echo '<li>'. $rating->name .  "</li>";
        }
        echo '</ul></li><li><ul>';
        foreach ($game->publishers as $comp) {
            echo '<li>'. $comp->name .  "</li>";
        }
        echo '</ul></li></ul>';
    }
})->name('tp2-exo6');


$app->get('/tp2/exo7', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP2-Exo 7<br>
html;

    $genre = new Genre();
    $genre->name = 'OwO';
    $genre->deck = 'OwO Deck';
    $genre->description = 'OwO Description';
    $genre->save();

    foreach (Game::whereIn('id', array(12, 56, 345))->get() as $game) {
        $game->genres()->attach($genre);
    }


    foreach (Game::whereIn('id', array(12, 56, 345))->get() as $game) {
        echo "<h3>$game->name</h3><ul>";
        foreach ($game->genres as $genre) {
            echo "<li>$genre->name</li>";
        }
        echo "</ul>";
    }

})->name('tp2-exo7');


$app->get('/tp3/exo1', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-Exo 1<br>
html;

    $time_start = microtime_float();

    $games = Game::select('name', 'description')->get();

    $time_end = microtime_float();
    $time = $time_end - $time_start;

    echo "temps d'execution: $time seconde<br>";
})->name('tp3-exo1');

function microtime_float() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$app->get('/tp3/exo2', function () {
    $time_start = microtime_float();

    $exo1 = Game::select('name', 'description')->where('name', 'like', '%mario%')->get();

    $time_end = microtime_float();
    $time = $time_end - $time_start;

    echo "temps d'execution: $time seconde<br>";
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-Exo 2<br>
html;
})->name('tp3-exo2');

$app->get('/tp3/exo3', function () {
    $time_start = microtime_float();

    $exo1 = Game::select('name', 'description')->where('name', 'like', 'mario%')->get();

    $time_end = microtime_float();
    $time = $time_end - $time_start;

    echo "temps d'execution: $time seconde<br>";
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-Exo 3<br>
html;
})->name('tp3-exo3');


$app->get('/tp3/exo4', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-Exo 4<br>
html;

    $time_start = microtime_float();

    foreach (Game::where('name', 'like', 'Mario%')
                 ->whereHas('original_game_ratings', function($q){
                     $q->where('name', 'like', '%3+%');
                 })->get() as $game)  {
        foreach ($game->original_game_ratings as $rating) {
        }
        foreach ($game->publishers as $comp) {
        }
    }

    $time_end = microtime_float();
    $time = $time_end - $time_start;
    echo "temps d'execution: $time seconde<br>";

})->name('tp3-exo4');



$app->get('/tp3/p2/exo1', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 1<br>
html;
    DB::enableQueryLog();
    $exo1 = Game::select('name', 'description')->where('name', 'like', '%mario%')->get();
    dd(DB::getQueryLog());
})->name('tp3-p2-exo1');



$app->get('/tp3/p2/exo2', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 2<br>
html;
    DB::enableQueryLog();


    Game::select('name')->where('id', '=', '12342')->first()->characters()->get();


    dd(DB::getQueryLog());
})->name('tp3-p2-exo2');



$app->get('/tp3/p2/exo3', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 3<br>
html;
    DB::enableQueryLog();


    foreach (Game::where('name', 'like', '%Mario%')->get() as $game)
    {
        $game->first_appearance_characters()->get();
    }

    dd(DB::getQueryLog());
})->name('tp3-p2-exo3');


$app->get('/tp3/p2/exo4', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 4<br>
html;
    DB::enableQueryLog();



    foreach (Game::select('name')->where('name', 'like', '%Mario%')->get() as $game)
    {
        $game->characters()->get();
    }


    dd(DB::getQueryLog());
})->name('tp3-p2-exo4');



$app->get('/tp3/p2/exo5', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 5<br>
html;
    DB::enableQueryLog();


    foreach (Company::select('name')->where('name', 'like', '%Sony%')->get() as $company)
    {
        $company->gameDevelops()->get();
    }


    dd(DB::getQueryLog());
})->name('tp3-p2-exo5');

$app->get('/tp4/exo1', function () {
    $slim = Slim::getInstance();
    $url1 = $slim->urlFor('home');
    echo <<<html
<a href='$url1'>Home</a>
TP3-P2-Exo 5<br><br>
html;

    $user1 = new User();
    $user1->name = 'Robert';
    $user1->email = 'darksasuke@gmail.com';
    $user1->surname = 'Dupont';
    $user1->adress = 'city';
    $user1->phone = '0394502846';
    $user1->save();

    echo $user1 . "<hr>";

    $user2 = new User();
    $user2->name = 'Gillou';
    $user2->email = 'XxGillouxX@gmail.com';
    $user2->surname = 'Durand';
    $user2->adress = 'othercity';
    $user2->phone = '0344328948';
    $user2->save();

    echo $user2 . "<hr>";

    echo "Les donnée on bien etais ajouté";
})->name('tp4-exo1');

$app->run();