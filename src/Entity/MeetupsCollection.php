<?php

namespace ATM\Entity;

use ATM\Entity\Meetup;

class MeetupsCollection {

    /**
     * The collection of meetup entities.
     * 
     * @var array
     */
    public $meetups = [];

    /**
     * Get current meetup.
     * 
     * @return ATM\Entity\Meetup
     */
    public function getCurrent() {
        $currentMeetups = array_filter($this->meetups, function($meetup) {
            return (bool) $meetup->current === true;
        });

        // Always return the first one.
        return $currentMeetups[0];
    }

    /**
     * Load meetups from an array.
     * 
     * @param  array $meetups
     * @return void
     */
    public function loadMeetupsFromArray($meetups) {
        $this->meetups = array_map(function($meetupData) {
            $meetup = new Meetup;

            $meetup->title = $meetupData['title'] ?? null;
            $meetup->location = $meetupData['location'] ?? null;
            $meetup->date = $meetupData['date'] ?? null;
            $meetup->current = (bool) ($meetupData['current'] ?? false);
            $meetup->presentation = (array) $meetupData['presentations'];

            return $meetup;
        }, $meetups);

        return $this;
    }
}