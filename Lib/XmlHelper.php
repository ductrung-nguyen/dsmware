<?php
/**
 * File : XmlHelper.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/

    function XmlToArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);

        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = (array)($value);
        }

        return $array;
    }