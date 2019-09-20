<?php

namespace ATM\Entity;

class Meetup {

    /**
     * Meetup title.
     * 
     * @var string
     */
    public $title;

    /**
     * Meetup location
     * 
     * @var string
     */
    public $location;

    /**
     * Mettup date.
     * 
     * @var string
     */
    public $date;

    /**
     * Is this the current meetup?
     * 
     * @var bool
     */
    public $current;

    /**
     * Presentations collection.
     * 
     * @var array
     */
    public $presentations = [];

    /**
     * Convert to array.
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'title'         => $this->title,
            'location'      => $this->location,
            'date'          => $this->date,
            'current'       => $this->current,
            'presentations' => $this->presentations,
        ];
    }

    /**
     * To string, just return JSON
     * 
     * @return string
     */
    public function __toString() {
        return json_encode($this->toArray());
    }
}