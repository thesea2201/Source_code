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
			<h1>Add Category</h1>
			<?php			
				echo $this->Form->create('Category');
				echo $this->Form->input('name');
				echo $this->Form->end('Add');
			?>
		</div>
	</div>
</div>