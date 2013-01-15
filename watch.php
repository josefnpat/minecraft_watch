#!/usr/bin/php
<?php

$log = "../server.log";

$watch = array();

$watch[] = array('regex'=>"@\\[INFO\\] Starting minecraft server version@",'icon'=>'./Grass.png');
$watch[] = array('regex'=>"@\\[INFO\\] Done \\((.){1,8}s\\)! For help, type \"help\" or \"\\?\"@",'icon'=>'./Grass.png');
$watch[] = array('regex'=>"@\\[INFO\\] (.){1,}\\[/(.){1,}\] logged in with entity id@",'icon'=>'./Cake.png');
$watch[] = array('regex'=>"@\\[INFO\\] (.){1,} lost connection:@",'icon'=>'./Creeper_Head.png');
$watch[] = array('regex'=>"@\\[INFO\\] <(.){1,}>@",'icon'=>'./Head.png');
$watch[] = array('regex'=>"@\\[INFO\\] \\[(.){1,}: Set (.){1,}\\]@",'icon'=>'./Bedrock.png');

function get_server_log($log){
  return explode("\n",file_get_contents($log));
}

$current = get_server_log($log);
$count = count($current);

while(true){
  $new = get_server_log($log);
  $new_count = count($new);
  if($new_count > $count){
    for($i = $count-1; $i < $new_count; $i++){
      foreach($watch as $watch_item){
        if(preg_match($watch_item['regex'],$new[$i])){
          echo $new[$i]."\n";
          if(isset($watch_item['icon'])){
            $icon = " --icon=".getcwd().'/'.$watch_item['icon'];
          } else {
            $icon = "";
          }
          passthru('notify-send '.$icon.' Minecraft "'.$new[$i].'"');
        }
      }
    }
    $current = $new;
    $count = $new_count;
  }
}
