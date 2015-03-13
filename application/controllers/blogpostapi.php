<?php
require BASEPATH.'REST_Controller.php';


/**
    * Blog API Controller.
    *
    * Maps to the following URL
    *       http://example.com/index.php/blogpostapi/posts
    *   - or -
    *       TODO: http://example.com/index.php/blogapi/blogpost
    *
    * An API to retrieve the blog posts and comments of users
    *
    */

class BlogPostAPI  extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();

    }

    /**
     * Get all Posts
     *
     * @return    Array    All Posts
     */
    function posts_get()
    {
    	$this->load->model('Posts', 'posts', 'True');
		$posts = $this->posts->get_all();

        if($posts)
        {
			$this->response($posts, 200);
		}
        else
        {
            $this->response(NULL, 404);
        }
    }

    /**
     * Get Post
     *
     * @return    Array    Post with comments
     */
    function post_get($post_id)
    {
        $this->load->model('Posts', 'post', 'True');
        $post = $this->post->get_one($post_id);

        if($post)
        {
            $this->response($post, 200);
        }
        else
        {
            $this->response(NULL, 404);
        }
    }
}