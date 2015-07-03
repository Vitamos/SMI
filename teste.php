<?php

$dirname = __DIR__ . "\posts\\32";
array_map('unlink', glob("$dirname\*.*"));
rmdir($dirname); 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

