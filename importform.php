<?php

$file = simplexml_load_file('dados.xml');
foreach ($file->user as $user){
    echo $user->username . "</br>";
}

foreach ($file->post as $post){
    echo $post->titulo . "</br>";
}

