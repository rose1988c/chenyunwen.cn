<?php

/**
 * Util.php
 * 
 * @author: rose1988c
 * @email: rose1988.c@gmail.com
 * @created: 2014-7-1 下午2:11:53
 * @logs: 
 *       
 */
namespace Service\Common;

class Util
{
    public static function ArrayColumn($input, $indexKey, $columnKey) {
        $columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
        $indexKeyIsNull = (is_null($indexKey)) ? true : false;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
        $result = array ();
        foreach((array)$input as $key => $row) {
            if($columnKeyIsNumber) {
                $tmp = array_slice($row, $columnKey, 1);
                $tmp = (is_array($tmp) &&  ! empty($tmp)) ? current($tmp) : null;
            } else {
                if(strstr($columnKey, ',')) {
                    $field = explode(',', $columnKey);
                    $c = array ();
                    foreach((array)$field as $fv) {
                        $c [$fv] = isset($row [$fv]) ? $row [$fv] : null;
                    }
                    $tmp = $c;
                } else {
                    $tmp = isset($row [$columnKey]) ? $row [$columnKey] : null;
                }
            }
            if( ! $indexKeyIsNull) {
                if($indexKeyIsNumber) {
                    $key = array_slice($row, $indexKey, 1);
                    $key = (is_array($key) &&  ! empty($key)) ? current($key) : null;
                    $key = is_null($key) ? 0 : $key;
                } else {
                    $key = isset($row [$indexKey]) ? $row [$indexKey] : 0;
                }
            }
            $result [$key] = $tmp;
        }
        return $result;
    }

    /**
     * packRawCriteria
     *
     * @param array $criteria            
     * @return multitype:
     */
    public static function packRawCriteria(array $criteria) {
        $raw = array ();
        $data = array ();
        foreach((array)$criteria as $row => $value) {
            
            if($value == 0) {
                $raw [] = $row . ' = ?';
                $data [] = $value;
            }
            
            if($value != false) {
                $raw [] = $row . ' = ?';
                $data [] = $value;
            }
        }
        
        if( ! empty($raw)) {
            $raw = implode(' and ', $raw);
        }
        return compact('raw', 'data');
    }

}