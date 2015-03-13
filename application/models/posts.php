<?
	class Posts extends CI_MODEL {

		function __construct()
		{
			parent::__construct();
		}

		function get_all()
		{
			$query = $this->db->get('posts');
			return $query->result();
		}

		//select post by id
		//select comments by postid
		function get_one($id)
		{
			$query = $this->db->get_where('posts', array('id' => $id));
			$post = $query->result();
			var_dump($post);

			$this->load->model('Comments', 'comments', 'True');
			$comments = $this->comments->get_by_post($id);
			return $comments;
		}
	}