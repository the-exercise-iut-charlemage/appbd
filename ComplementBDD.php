<?php

//ajouté dans l'index
$user1 = new User();
$user1->name = 'Robert';
$user1->id = 1;
$user1->email = 'darksasuke@gmail.com';
$user1->surname = 'Dupont';
$user1->adress = 'city';
$user1->phone = '0394502846';
$user1->save();


//ajouté dans l'index
$user2 = new User();
$user2->name = 'Gillou';
$user2->id = 2;
$user2->email = 'XxGillouxX@gmail.com';
$user2->surname = 'Durand';
$user2->adress = 'othercity';
$user2->phone = '0344328948';
$user2->save();


$mess1-> new Message();
$mess1->id = 1;
$mess1->title='une pepite';
$mess1->content='ce jeu est trop bien';

$mess2-> new Message();
$mess2->id = 2;
$mess2->title='NUL';
$mess2->content='NUL NUL NUL';

$mess3-> new Message();
$mess3->id = 3;
$mess3->title='TRO BI1';
$mess3->content='JADOR';

$mess4-> new Message();
$mess4->id = 4;
$mess4->title='je le recommande';
$mess4->content='c est un bon jeu';

$mess5-> new Message();
$mess5->id = 5;
$mess5->title='j aime pas';
$mess5->content='parceque j aime pas';

$mess6-> new Message();
$mess6->id = 6;
$mess6->title='bof';
$mess6->content='rien de fou dans ce jeu';