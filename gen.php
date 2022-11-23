<?php

$students = [
    'Artjom Filimonov',
    'Elisa Freiberg',
    'Karin Kaasik-Aaslav',
    'Oliver Kaur',
    'Kevin Koit',
    'Sander Kütt',
    'Georg Lauk',
    'Mairon Leier',
    'Artur Levin',
    'Trevon Lootus',
    'Berg Maidla',
    'Kristo Marcus Mets',
    'Mattias Mets',
    'Maria Metsma',
    'Arwen Celeste Orsi',
    'Andreas Peterson',
    'Karoliina Raudberg',
    'Agnes Rebane',
    'Ketlin Rämman',
    'Robin Saul',
    'Helina Sootalu',
    'Katrin Tenso',
    'Tauri Tooming',
    'Marcus Õunapuu',
    'Egert Verbak',
];

$taskTypes = [
    'create file ',
    'delete file ',
    'create folder ',
    'go into folder ',
    'print out file ',
    'print out directory contents ',
    'move file ',
    'rename file ',
    'print help for '
];

$commands = [
    'list',
    'move',
    'remove',
    'remove directory',
    'print out file',
    'navigate to folder'
];
foreach($students as $student){
    $folder = strtolower(str_replace(' ','_',$student));
    mkdir($folder, 0700);
    $taskfile = fopen(__DIR__ ."/$folder/task.txt", "w") or die("Unable to open file!");
    $files = [];
    $folders = [];
    $currentTaskTypes = $taskTypes;
    for($i=0; $i<count($taskTypes); $i++) {
        $index = rand(0, count($currentTaskTypes) - 1);
        $task = $currentTaskTypes[$index];
        array_splice($currentTaskTypes, $index, 1);
        $index = array_search($task, $taskTypes);
        $currentTaskTypes = array_values($currentTaskTypes);
        switch ($index) {
            case 0:
                $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';
                $files[] = $name;
                fwrite($taskfile, $taskTypes[0] . $name . "\n");
                break;
            case 1:
                if (count($files)) {
                    $findex = rand(0, count($files) - 1);
                    $name = $files[$findex];

                    unset($files[$findex]);
                    $files = array_values($files);
                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';
                    fopen(__DIR__ ."/$folder/$name", "w") or die("Unable to open file!");
                }

                fwrite($taskfile, $taskTypes[1] . $name . "\n");
                break;
            case 2:
                $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5);
                $folders[] = $name;
                fwrite($taskfile, $taskTypes[2] . $name . "\n");
                break;
            case 3:
                if (count($folders)) {
                    $findex = rand(0, count($folders) - 1);
                    $name = $folders[$findex];
                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5);
                    mkdir(__DIR__ ."/$folder/$name");
                    $folders[] = $name;
                }

                fwrite($taskfile, $taskTypes[3] . $name . "\n");
                break;
            case 4:
                if (count($files)) {
                    $findex = rand(0, count($files) - 1);
                    $name = $files[$findex];

                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';
                    fopen(__DIR__ ."/$folder/$name", "w") or die("Unable to open file!");
                }

                fwrite($taskfile, $taskTypes[4] . $name . "\n");
                break;
            case 5:
                if (count($folders)) {
                    $findex = rand(0, count($folders) - 1);
                    $name = $folders[$findex];
                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5);
                    mkdir(__DIR__ ."/$folder/$name");
                    $folders[] = $name;
                }

                fwrite($taskfile, $taskTypes[5] . $name . "\n");
                break;
            case 6:
                if (count($folders)) {
                    $findex = rand(0, count($folders) - 1);
                    $name = $folders[$findex];
                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5);
                    mkdir(__DIR__ ."/$folder/$name");
                    $folders[] = $name;
                }
                if (count($files)) {
                    $findex = rand(0, count($files) - 1);
                    $name2 = $files[$findex];

                    unset($files[$findex]);
                    $files = array_values($files);
                } else {
                    $name2 = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';
                    fopen(__DIR__ ."/$folder/$name2", "w") or die("Unable to open file!");
                }
                fwrite($taskfile, $taskTypes[6] . $name2 . ' to folder ' . $name . "\n");
                break;
            case 7:
                $name2 = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';

                if (count($files)) {
                    $findex = rand(0, count($files) - 1);
                    $name = $files[$findex];
                    $files[$findex] = $name2;
                } else {
                    $name = substr(md5(time() . $student . rand(0, 1000000)), 0, 5) . '.txt';
                    fopen(__DIR__ ."/$folder/$name", "w") or die("Unable to open file!");
                    $files[] = $name2;
                }
                fwrite($taskfile, $taskTypes[7] . $name . ' to ' . $name2 . "\n");
                break;
            case 8:

                if (count($files)) {
                    $command = $commands[rand(0, count($commands) - 1)];

                }
                fwrite($taskfile, $taskTypes[8] . $command . " command \n");
                break;
        }
    }

    fclose($taskfile);
}




