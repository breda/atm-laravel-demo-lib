<?php

namespace ATM\Parser;

use ATM\Parser\YamlParser;
use ATM\Parser\JsonParser;

class Factory {


    /**
     * Get the appropriate parser based on the data type.
     * 
     * @param  string $dataType
     * @return ATM\Parser\AbstractParser
     */
    public static function makeParser($dataType) {
        switch ($dataType) {
            case 'yaml': return new YamlParser; break;
            case 'yml': return new YamlParser; break;
            case 'json': return new JsonParser; break;

            default: return null; break;
        }
    }

}