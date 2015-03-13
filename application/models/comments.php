<?
	class Comments extends CI_MODEL {

		function __construct()
		{
			parent::__construct();
		}

		function get_by_post($post_id)
		{
			$query = $this->db->get_where('comments', array('post_id' => $post_id));
			return $query->result();
		}
	}