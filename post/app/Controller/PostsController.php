<?php
	class PostsController extends AppController {
		public $components = array('Paginator');

	    public $paginate = array(
	        'limit' => 3,
	        'contain' => array('Post'),
	        'group'=>'Post.id desc'
	    );
	      
	    public $helpers = array('Html', 'Form');


	    //index
		public function index() {
			$this->layout= 'home';
	        CakePlugin::loadAll();
			// //because we use pagination, i don't need it
	  //       //find all post from newest to oldest.
	  //       $this->set('posts', $this->Post->find('all', array(
	  //       	'group'=>'Post.id desc'
	  //       )));  	
	        
	        //call category_id
	        //$this->loadModel('Category');
	        $categories = $this->Post->Category->find(
	            'all',
	            array(
	                'fields' => array(
	                    'id',
	                    'name'
	                ),
	                'order' => 'Category.id DESC',
	                'recursive' => 1
	            )
	        );
		    $this->set('categories',$categories);

			//find all post from newest to oldest and paginate it
		    $this->Paginator->settings = $this->paginate;
		    // similar to findAll(), but fetches paged results
		    $data = $this->Paginator->paginate('Post');
		    $this->set('posts', $data);
	    }
	    
	    //admin page
	    public function admin() {
			$this->layout= 'home';
	        $this->set('posts', $this->Post->find('all'));
	        $this->loadModel('Categories');

	    }

	    //view function for user
	    public function view($id = null) {

			$this->layout= 'home';
	        if (!$id) {
	            throw new NotFoundException(__('Invalid post'));
	        }

	        $post = $this->Post->findById($id);
	        if (!$post) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	        $this->set('post', $post);
	        
	    }

	    //add a new post--- admin
	    public function add() {
	        $this->layout= 'home';
	        $categories = $this->Post->Category->find(
	            'all',
	            array(
	                'fields' => array(
	                    'id',
	                    'name'
	                ),
	                'order' => 'Category.id DESC',
	                'recursive' => 1
	            )
	        );
		    $this->set('categories',$categories);
	        if ($this->request->is('post')) {
	            $this->Post->create();
	            if ($this->Post->save($this->request->data)) {
	                $this->Flash->success('This was successful');
	                return $this->redirect(array('action' => 'admin'));
	            }
	            $this->Flash->error(__('Unable to add your post.'));
	        }
	    }

	    //edit post--- admin
	    public function edit($id = null) {
		    $this->layout= 'home';
		    if (!$id) {
		        throw new NotFoundException(__('Invalid post'));
		    }

		    $post = $this->Post->findById($id);
		    if (!$post) {
		        throw new NotFoundException(__('Invalid post'));
		    }

		    if ($this->request->is(array('post', 'put'))) {
		        $this->Post->id = $id;
		        if ($this->Post->save($this->request->data)) {
		            $this->Flash->success(__('Your post has been updated.'));
		            return $this->redirect(array('action' => 'admin'));
		        }
		        $this->Flash->error(__('Unable to update your post.'));
		    }

		    if (!$this->request->data) {
		        $this->request->data = $post;
		    }
		}	


		//delete post ---admin
		public function delete($id) {
			$this->layout= 'home';
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }

		    if ($this->Post->delete($id)) {
		        $this->Flash->success(
		            __('The post with id: %s has been deleted.', h($id))
		        );
		    } else {
		        $this->Flash->error(
		            __('The post with id: %s could not be deleted.', h($id))
		        );
		    }

		    return $this->redirect(array('action' => 'admin'));
		}

		//search post by title or body
		public function searchAdmin() {
			$this->layout= 'home';
		 
		 	if ($this->request->is('get')) {
		 		
		 		$search_key =  $this->request->query['search_key'];
				

		 		$this->set('posts', $this->Post->find('all', array(
			        'conditions' => array(
			         "OR" => array(
			            "Post.title LIKE" => "%".$search_key."%",
			            "Post.body LIKE" => "%".$search_key."%",
			            "Post.created LIKE" => "%".$search_key."%"
			            ))
			    )));

		    	$this->render('/Posts/admin');	
		 	}
		 	else
		 	{
		 		return $this->redirect(
			        array( 'action' => 'index')
			    );
		 	}	  	
		}
		//search post by title or body
		public function search() {
			$this->layout= 'home';
		
		 	if ($this->request->is('get') && strlen($this->request->query['search_key'])>3 ) {
		 		
		 		$search_key =  $this->request->query['search_key'];
				

		 		$this->set('posts', $this->Post->find('all', array(
			        'conditions' => array(
			         "OR" => array(
			            "Post.title LIKE" => "%".$search_key."%",
			            "Post.created LIKE" => "%".$search_key."%",
			            "Post.body LIKE" => "%".$search_key."%"
			            )),
			        'limit'=> 50
			    )));

		    	$this->render('/Posts/index');	
		 	}
		 	else
		 	{
		 		return $this->redirect(
			        array( 'action' => 'index')
			    );
		 	}	  	
		}
		

	}
?>

