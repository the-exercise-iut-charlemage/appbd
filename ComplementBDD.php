<?php

//ajouté dans l'index
$user1 = new User();
$user1->name = 'Robert';
$user1->email = 'darksasuke@gmail.com';
$user1->surname = 'Dupont';
$user1->adress = 'city';
$user1->phone = '0394502846';
$user1->save();


//ajouté dans l'index
$user2 = new User();
$user2->name = 'Gillou';
$user2->email = 'XxGillouxX@gmail.com';
$user2->surname = 'Durand';
$user2->adress = 'othercity';
$user2->phone = '0344328948';
$user2->save();


$mess1 = new Message();
$mess1->title='une pepite';
$mess1->content='ce jeu est trop bien';
$mess1->save();

$mess2 = new Message();
$mess2->title='NUL';
$mess2->content='NUL NUL NUL';
$mess2->save();

$mess3 = new Message();
$mess3->title='TRO BI1';
$mess3->content='JADOR';
$mess3->save();

$mess4 = new Message();
$mess4->title='je le recommande';
$mess4->content='c est un bon jeu';
$mess4->save();

$mess5 = new Message();
$mess5->title='j aime pas';
$mess5->content='parceque j aime pas';
$mess5->save();

$mess6 = new Message();
$mess6->title='bof';
$mess6->content='rien de fou dans ce jeu';
$mess6->save();


$faker = Faker\Factory::create();
for ($i=0; $i<25000; $i++) {
    $user=new User();
    $user->name = $faker->firstname;
    $user->email = $faker->email;
    $user->surname = $faker->lastName;
    $user->adress = $faker->address;
    $user->phone = $faker->phoneNumber;
    $user->save();
}

for ($j=0; $j<250000; $j++){
    $mess = new Message();
    $mess->title=$faker->word;
    $mess->content=$faker->text(100);
    $mess->save();

    $usr=User::where('id','=', $faker->numberBetween(1,25000))->get();
    $usr->messages()->attach($mess);
    $user->save();

    $game=Game::where('id','=', $faker->numberBetween(1,47948))->get();
    $game->messages()->attach($mess);
    $game->save();
}




//ici faut rechercher les messages de la personne donnée. mais je sais pas comment faire donc je mets ca
$id='id de la personne recherchée';
$u = User::where('id','like',$id);
foreach (User::where('id', '=', $u)->first()->messages()->orderBy('created_at','desc')->get() as $m) {
    echo $m->title . ' | ' . $m->content . ' | ' . $m->created_at . '<hr>';
}

foreach(User::has('messages', '>', 5)->get() as $user){
    echo $user->name . '<hr>';
}