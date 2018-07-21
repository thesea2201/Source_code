<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">



<div class="fixed">
    <div class="row">
	    <div class="large-1 columns"></div>
	    <div class="large-11 columns">
			<h1>
			    <?php echo $this->Html->link(
			        'Blog',
			        ['action' => 'index']
			    );?>
			</h1>
			<h1>Edit Post</h1>
			<?php
				echo $this->Form->create('Post');
				echo $this->Form->input('title');
				echo $this->Form->input('body', array('rows' => '12'));
				echo $this->Form->input('id', array('type' => 'hidden'));
				


				// echo $this->Form->input('categoryid', array(
				//     'options' => array(
				//     	foreach ($categorys as $catagory) {
				//     		array('name' => $catagory['Category'][] , 'value' => ),
				//     	}
				//     ),
				//     'empty' => '(choose one)',
				//     'id'=>'selection',
				//     'style'=>'width:231px'
				// ));
				
				 
				

				echo $this->Form->end('Edit Post');

?>