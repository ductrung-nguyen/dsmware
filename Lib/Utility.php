<?php
/**
 * File : Utility.php
 * User : loveallufev
 * Date:  6/15/13
 * Group: Hieu-Trung
*/


class Lib_Utility {
    static public function wp_mktime($_timestamp = ''){
        if($_timestamp){
            $_split_datehour = explode(' ',$_timestamp);
            $_split_data = explode("-", $_split_datehour[0]);
            $_split_hour = explode(":", $_split_datehour[1]);

            return mktime ($_split_hour[0], $_split_hour[1], $_split_hour[2], $_split_data[1], $_split_data[2], $_split_data[0]);
        }
    }

}