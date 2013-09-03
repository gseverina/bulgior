<?php
class Post extends Base
{
	protected $date_created;
	protected $content;
	protected $user;
	
	public function __construct()
	{
		parent::__construct('post');
	}
	
	public function create()
	{
		$bones = new Bones();
		$this->_id = $bones->couch->generateIDs(1)->body->uuids[0];
		$this->date_created = date('r');
		$this->user = User::current_user();
		try 
		{
			$bones->couch->put($this->_id, $this->to_json());
		}
		catch(SagCouchException $e) 
		{
			$bones->error500($e);
		}
	}
	
	public function get_posts_by_user($username)
	{
		$bones = new Bones();
		$posts = array();
		foreach ($bones->couch->get("_design/application/_view/posts_by_user?key='" . $username . "'")->body->rows as $_post) 
		{
			die($_post->id);
			$post = new Post();
			$post->_id = $_post->id;
			$post->date_created = $_post->value->date_created;
			$post->content = $_post->value->content;
			$post->user = $_post->value->user;
			array_push($posts, $post);
		}
		
		return $posts;
	}
}