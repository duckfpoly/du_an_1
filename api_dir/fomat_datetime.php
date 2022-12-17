<?php

class fomat_datetime
{
    public function diffForHuman($time1){
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $time2 = date("Y-m-d H:i:s");
        $precision = 1;
//        2, 3
        if( !is_int( $time1 ) ) {
            $time1 = strtotime( $time1 );
        }
        if( !is_int( $time2 ) ) {
            $time2 = strtotime( $time2 );
        }
        $past = true;
        if( $time1 > $time2 ) {
            list( $time1, $time2 ) = array( $time2, $time1 );
            $past = false;
        }
        $intervals = array( 'year', 'month', 'day', 'hour', 'minute', 'second' );
        $diffs = array();
        foreach( $intervals as $interval ) {
            $ttime = strtotime( '+1 ' . $interval, $time1 );
            $add = 1;
            $looped = 0;
            while ( $time2 >= $ttime ) {
                $add++;
                $ttime = strtotime( "+" . $add . " " . $interval, $time1 );
                $looped++;
            }
            $time1 = strtotime( "+" . $looped . " " . $interval, $time1 );
            $diffs[ $interval ] = $looped;
        }

        $count = 0;
        $times = array();
        foreach( $diffs as $interval => $value ) {
            if( $count >= $precision ) {
                break;
            }
            if( $value > 0 ) {
                if( $value != 1 ){
                    $interval .= "s";
                }
                $times[] = $value . " " . $interval;
                $count++;
            }
        }
        if($past == true){
            $suffix = ' ago';
        } else {
            $suffix = ' from now';
        }
        return implode( ", ", $times ).$suffix;
    }
}