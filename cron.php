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

$lockFile=__FILE__.".pid";

// Check if script is still running to prevent running two scripts 
if(file_exists($lockFile)){
    // If file exists check if PID is still running
    echo $lockFile." Exists \n";
    $last_pid= file_get_contents($lockFile);
    echo "Last PID= ".$lastPID."\n";
    echo "Which exists = ".(file_exists("/proc/".$lastPID)?"true":"false")."\n";
    if(file_exists("/proc/".$lastPID)){
        // Last process is still running 
        die("Already running at PID:".$lastPID."\n");
    }
}
// Save current PID to lockfile
file_put_contents($lockFile, getmypid());

// Loop until this cron job is set to expire
while($maxEndTime<time()){
  // Cycle :
      // Put repeated tasks here  
  // End of cycle //
  cycleSleep(1); // Delay processing to prevent over loading the server
}
