<?php
    /**
     * Created by PhpStorm.
     * User: pavel
     * Date: 6/18/2020
     * Time: 12:42 PM
     */
    
    namespace App\Helpers;
    
    class Helper
    {
        public static function date_convert($date)
        {
            $convert = date('d F Y',strtotime($date));
        
            return $convert;
        }
        
        public static function days_ago_format($date)
        {
            $convert_date = $date('Y-m-d', strtotime('-5 days', strtotime($date)));
            
            return $convert_date;
        }
    }