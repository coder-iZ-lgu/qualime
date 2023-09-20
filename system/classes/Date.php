<?php defined('SYSPATH') OR die('No direct script access.');

class Date extends Kohana_Date {

    public static function copy($year = FALSE)
    {
        if ($year === FALSE)
        {
            $year = date('Y');
        }

        return $year;
    }

}
