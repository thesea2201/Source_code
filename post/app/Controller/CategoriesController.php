<?php
	class CategoriesController extends AppController
	{
		
		public function getRelatedPosts($id = null){    

	        $RelatedPost = $this->Category->Post->find(
	            'all',
	            array(
	                'fields' => array(
	                    'Post.title',
	                    'Post.id'
	                ),
	                'conditions' => array(
	                    'Post.category_id =' => $id,
	                ),
	                'limit' => 6,
	                'order' => 'Post.id DESC'            
	            )
	        );
	        if (!empty($this->params['requested'])) {
	            return $RelatedPost;
	        }else{
	            $this->set('RelatedPost');
	        }
    	}

		//add a new post--- admin
	    public function addCategory() {
	        $this->layout= 'home';
	        
	        if ($this->request->is('post')) {
	            $this->Category->create();
	            if ($this->Post->save($this->request->data)) {
	                $this->Flash->success(__('Your category has been saved.'));
	                return $this->redirect(array('action' => 'admin'));
	            }
	            $this->Flash->error(__('Unable to add your post.'));
	        }
	    }
		
	}


?>