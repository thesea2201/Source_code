
<div class="">
    <div class="row">
    <div class="large-1 columns"></div>
    <div class="large-11 columns">
            
        <h1>
            <?php echo $this->Html->link(
                'Blog',
                ['action' => 'admin']
            );?>
        </h1>
        <!-- PreView a blog -->
        <p class="menu-icon">
            <?php
                echo $this->Html->link(
                    'Preview',
                    array('action' => 'index')
                );
            ?>
        </p>


        <!-- add a new post -->
        <p class="menu-icon">
            <?php
                echo $this->Html->link(
                    'Add post',
                    array('action' => 'add')
                );
            ?>   
        </p>
        <!-- add a new category -->
        <p class="menu-icon">
            <?php
                echo $this->Html->link(
                    'Add Category',
                    array(
                        'controller'=> 'Categories',
                        'action' => 'addCategory')
                );
            ?>   
        </p>

        <!-- search post -->
            

            <?php
                echo $this->Form->create('Post', array(
                    'url' => 'http://cakephp-blog.local:81/posts/searchAdmin',
                    'type' => 'get'
                ));
                echo $this->Form->input('search_key', array('between'=>'<label for="search" class="main_search">Search</label><br>','label'=>false));
                echo $this->Form->button('Search', array('type' => 'submit'));
                echo $this->Form->end();
            ?>
        <!-- end search posts -->

        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Action</th>
                <th>Created</th>
            </tr>

        <!-- Here's where we loop through our $posts array, printing out post info -->

        <?php foreach ($posts as $post): ?>
            
            <!-- begin a post -->
            <tr>
                <!-- id of post -->
                <td> <?php echo $post['Post']['id']; ?> </td>
                <!-- title of post -->
                <td>
                    <?php
                        echo $this->Html->link(
                            $post['Post']['title'],
                            array('action' => 'view', $post['Post']['id'])
                        );
                    ?>
                </td>
                <!-- post acction: edit & delete -->
                <td>
                    <!-- edit -->
                    <button class="btn btn-danger">
                    <?php
                        echo $this->Html->link(
                            'Edit',
                            array('action' => 'edit', $post['Post']['id'])
                        );
                    ?>
                    <!-- end edit -->

                    <!-- delete -->
                    </button>
                    <button class="btn btn-danger">
                    <?php
                        echo $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $post['Post']['id']),
                            array('confirm' => 'Are you sure?')
                        );
                    ?>            
                    </button>
                    <!-- end delete -->
                </td>
                <!-- end acction  -->

                <!-- pulished date -->
                <td>
                    <?php echo $post['Post']['created']; ?>
                </td>
                <!-- end pulished date -->
            </tr>
            <!-- end a post -->

        <?php endforeach; ?>

        </table>
    </div>
</div>