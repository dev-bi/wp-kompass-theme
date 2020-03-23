<?php
namespace Muh;

class Muh {

    private $sstring = "empty";

    function __construct() {

        /**
         * create database connection
         */

    }

    public function setSearchString($sstring) {
        $this->sstring = $sstring;
    }

    public function getSearchString() {
        return $this->sstring;
    }
}