<?php
  class db {

    function __construct()
    {
        global $dbh;
        if (!is_null($dbh)) return;
        $dbh = mysql_pconnect('82.148.66.15', '1208952229', 'tinnioglisa123');
        mysql_select_db('1208952229_picturebase');
        mysql_query('SET NAMES utf8');
    }

    function select_list($query)
    {
        $q = mysql_query($query);
        if (!$q) return null;
        $ret = array();
        while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
            array_push($ret, $row);
        }
        mysql_free_result($q);
        return $ret;
    }
  }
?>