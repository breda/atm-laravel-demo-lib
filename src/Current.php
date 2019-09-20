<?php 

namespace ATM;

use ATM\Entity\MeetupsCollection;
use ATM\Parser\Factory;

class Current {

    /**
     * Where do we get the latest data?
     * 
     * @var string
     */
    protected $meetups_data_location = 'https://raw.githubusercontent.com/algeriatech/algiers-meetup/master/config.yml';

    /**
     * What is the data type of the meetups?
     * 
     * @var string
     */
    protected $meetups_data_type = 'yaml';

    /**
     * Get me the current meetup.
     * 
     * @return ATM\Entity\Meetup
     */
    public function get()
    {
        $data = $this->getMeetupsData();

        return $this->getLatestMeetup($data);
    }

    /**
     * Get the data location.
     * 
     * @return string
     */
    public function getMeetupsDataLocation()
    {
        return $this->meetups_data_location;
    }

    /**
     * Set the data location.
     * 
     * @return self
     */
    public function setMeetupsDataLocation($newone)
    {
        $this->meetups_data_location = $newone;

        return $this;
    }

    /**
     * Get the data type.
     * 
     * @return string
     */
    public function getMeetupsDataType()
    {
        return $this->meetups_data_type;
    }

    /**
     * Set the data type.
     * 
     * @return self
     */
    public function setMeetupsDataType($newone)
    {
        $this->meetups_data_type = $newone;

        return $this;
    }

    /**
     * Fetch, and parse meetups.
     * 
     * @return string
     */
    protected function getMeetupsData()
    {
        $rawData = file_get_contents($this->meetups_data_location);
        $parser = Factory::makeParser($this->meetups_data_type);

        if (!$parser) {
            throw new \Exception('Meetups data type not supported. Maybe contribute with one? :D ');
        }

        return $parser->parse($rawData);
    }

    /**
     * Get the latest meetup logic
     * 
     * @param  mixed $data
     * @return Meetup      
     */
    protected function getLatestMeetup($data)
    {
        if (empty($data) || !array_key_exists('meetups', $data)) {
            return null;
        }

        $meetupsCollection = (new MeetupsCollection)
            ->loadMeetupsFromArray($data['meetups']);

        return $meetupsCollection->getCurrent();
    }
}
