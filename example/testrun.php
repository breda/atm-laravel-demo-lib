<?php

require __DIR__ . '/../vendor/autoload.php';

$current = new ATM\Current;

// Using Yaml
$current->setMeetupsDataType('yaml'); // or 'yml'
$current->setMeetupsDataLocation('https://raw.githubusercontent.com/algeriatech/algiers-meetup/master/config.yml');

// Using Json
// $current->setMeetupsDataType('json');
// $current->setMeetupsDataLocation('https://raw.githubusercontent.com/breda/atm-laravel-demo-lib/master/example/data.json');

$currentMeetup = $current->get();

echo vsprintf("# Latest Algeria Tech Meetup\nTitle: %s\nLocation: %s\nDate: %s\n", [
        $currentMeetup->title,
        $currentMeetup->location,
        $currentMeetup->date,
    ]
);