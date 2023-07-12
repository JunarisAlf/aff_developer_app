<?php

use Carbon\Carbon;

function diffForHumans($timestamp){
    $date = Carbon::createFromFormat('d-m-Y H:i:s', $timestamp);
    return $date->diffForHumans();
}
