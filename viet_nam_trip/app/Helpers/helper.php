<?php

use Illuminate\Support\Facades\Cookie;

function fromAndToDateFilter($from, $to, $query, $column = 'created_at', $strToTime = true)
{


    if (!empty($from) and !empty($to)) {

        //$from = $strToTime ? strtotime($from) : $from;

       // $to = $strToTime ? strtotime($to) : $to;
        $query->whereBetween($column, [$from, $to]);

    } else {
        if (!empty($from)) {
           // $from = $strToTime ? strtotime($from) : $from;
            $query->where($column, '>=', $from);
        }

        if (!empty($to)) {
            //$to = $strToTime ? strtotime($to) : $to;
            $query->where($column, '<', $to);
        }
    }

    return $query;
}

function gia_tien($min_tien, $max_tien, $query, $column = 'gia_nguoi_lon', $strToTime = true)
{


    if (!empty($min_tien) and !empty($max_tien)) {

        //$from = $strToTime ? strtotime($from) : $from;

       // $to = $strToTime ? strtotime($to) : $to;
        $query->whereBetween($column, [$min_tien, $max_tien]);

    } else {
        if (!empty($min_tien)) {
           // $from = $strToTime ? strtotime($from) : $from;
            $query->where($column, '>=', $min_tien);
        }

        if (!empty($max_tien)) {
            //$to = $strToTime ? strtotime($to) : $to;
            $query->where($column, '<=', $max_tien);
        }
    }

    return $query;
}
