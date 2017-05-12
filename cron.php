<?php

/*
EasyCron
Run Continuous php cron job without risking 
*/


if (php_sapi_name() != "cli") {
 // Prevent direct access from public users, by allowing Command line only
 die("CLI File");
}


// Save start time
$startTime=time();
//Although this is a continuous script, it's better to let it expire after 30 minutes to prevent memory leaks,
// and refresh presistant connections
$maxEndTime=time()+1800;  // Process will expires after 30 mintues (1800 seconds)

$cycleSleep=5; // Sleep time before redoing a tasks round
echo "Start \n";


// Check if script is still running to prevent running two scripts 
if(file_exists(__DIR__."/task.pid")){
    echo __DIR__."/task.pid Exists \n";
    $last_pid= file_get_contents(__DIR__."/task.pid");
    echo "Last PID= ".$last_pid."\n";
    echo "Which exists = ".(file_exists("/proc/".$last_pid)?"true":"false")."\n";
    if(file_exists("/proc/".$last_pid)){
        die("Already running at PID:".$last_pid."\n");
    }
}

file_put_contents(__DIR__."/task.pid", getmypid());

// Loop until this cron job is set to expire
while($maxEndTime<time()){
  // Cycle :
      // Put repeated tasks here  
  // End of cycle //
  cycleSleep(1); // Delay processing to prevent over loading the server
}
