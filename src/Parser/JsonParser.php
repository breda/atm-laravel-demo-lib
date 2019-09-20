<?php 

namespace ATM\Parser;

class JsonParser extends AbstractParser {

    /**
     * Parse data.
     * 
     * @param  string $input
     * @return array An array of all ATM presentations.
     */
    public function parse($input)
    {
        try {
            $output = json_decode($input, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            return [];
        }

        return $output;
    }
}