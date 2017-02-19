<?php
class Article_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function gets($limit=10){
        $res = $this->db->query("SELECT * FROM interestingArticles ORDER BY interesting DESC limit " . $limit)->result();
       
        return $res;
    }
    function gets2($limit=10){
        $res = $this->db->query("SELECT * FROM interestingArticles ORDER BY created_time DESC limit " . $limit)->result();
       
        return $res;
    }
    function get($article_id){
        $this->db->select('id');
        $this->db->select('writer');
        $this->db->select('title');
        $this->db->select('description');
        $this->db->select('boardNo');
        $this->db->select('UNIX_TIMESTAMP(created) AS created');
        return $this->db->get_where('article', array('id'=>$article_id))->row();
    }

    function add($writer, $title, $description){

        $this->db->set('created', 'NOW()', false);
        $this->db->insert('article',array(
            'title'=>$title,
            'writer'=>$writer,
            'description'=>$description,
            'boardNo'=>1
        ));
        return $this->db->insert_id();
    }
}
