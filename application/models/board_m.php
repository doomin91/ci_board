<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/**
 * 공통 게시판 모델
 */
 
class Board_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 
    function get_list($table = 'ci_board') {
        $sql = "SELECT * FROM ".$table." ORDER BY board_id DESC";
        $query = $this -> db -> query($sql);
        $result = $query -> result();
        // $result = $query->result_array();
 
        return $result;
    }
 
    function get_search_list($table = 'ci_board') {
        $sword = '';
        $sql = "SELECT * FROM ci_board WHERE subject LIKE '%$sword%'";
        $query = $this -> db -> query($sql);
        $result = $query -> result();

        return $result;
    }

}