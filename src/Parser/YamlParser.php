<?php 

namespace ATM\Parser;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class YamlParser extends AbstractParser {

    /**
     * Parse data.
     * 
     * @param  string $input
     * @return array An array of all ATM presentations.
     */
    public function parse($input)
    {
        try {
            $output = Yaml::parse($input);
        } catch (ParseException $exception) {
            return [];
        }

        return $output;
    }
}