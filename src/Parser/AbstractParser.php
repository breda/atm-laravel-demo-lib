<?php 

namespace ATM\Parser;

abstract class AbstractParser {
    /**
     * Parse data.
     * 
     * @param  string $input
     * @return array An array of all ATM presentations.
     */
    abstract public function parse($input);
}