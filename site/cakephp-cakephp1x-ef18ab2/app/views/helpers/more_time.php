<?php

class moreTimeHelper extends AppHelper {

    /**
     * Calculates the difference between two date. Only used to calc the diff 
     * between a TP and the start of the experiment so we can denote a TP as 
     * '-24h to start' or '10m after start'. Only goes in two scales: hours 
     * and minutes, all the rest is 'ceiled'.
     *
     * @param int $start The start date parsable by strtotime.
     * @param int $end The end date parsable by strtotime. Default NOW.
     * @return string e.g. 24h10m 
     */
    function simpleDiff($start, $end = 'NOW') {        
        $start_time = strtotime($start);
        $stop_time = strtotime($end);

        $diff_time = $start_time - $stop_time;

        if (abs($diff_time) < 3600) {
            return ceil($diff_time / 60) . 'm';
        }

        return ceil($diff_time / 3600) . 'h';
    }

}

?>
