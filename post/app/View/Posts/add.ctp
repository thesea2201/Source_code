<div class="">
    <div class="row">
    	<div class="large-1 columns"></div>
    	<div class="large-11 columns">
    		<h1>
			    <?php echo $this->Html->link(
			        'Bien\'s blog',
			        ['action' => 'admin']
			    );?>
			</h1>
			<h1>Add Post</h1>
			<?php
			$opt = array();
			$val = array();
			
			foreach ($categories as $category) {
				array_push(	$opt, $category['Category']['name']);				
				array_push(	$val, $category['Category']['id']);
			}
				echo $this->Form->create('Post');
				echo $this->Form->input('title');
				echo $this->Form->input('body', array('rows'=> '12'));
				echo $this->Form->input('field', array(
				    'options' => $opt,
				    'value' => $val,
				    'empty' => '(choose one)'
				));
				echo $this->Form->input('Upload file', array( 'type' => 'file'));
				echo $this->Form->end('Save post');
			?>
		</div>
	</div>
</div>