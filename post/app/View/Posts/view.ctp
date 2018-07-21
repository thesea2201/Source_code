<!-- Main Blog Content -->
<div class="large-9 columns" role="content">
    <article>
<!--                         <h1><a href="#">Blog Post Title</a></h1> -->
        <h1>
        <?php
        echo $this->Html->link(
            $post['Post']['title'],
            array('action' => 'view', $post['Post']['id'])
        );
        ?>
        </h1>
        <p class="article_pub-date">Published
            <time datetime="2014-13-05" pubdate=""><?php echo $post['Post']['modified'];?></time>
            <div class="fb-share-button" 
                data-href="http://cakephp-blog.local:81/posts/view/<?php echo $post['Post']['id'];?>" 
                data-layout="button_count">
            </div>
        </p>

        <div class="row">
            <div class="large-12 columns">
                <div class="row">
                    <div class="large-5 columns">
                        <?php
                            echo $this->Html->image($post['Post']['imageurl'] , array(
                                'alt' => 'CakePHP',
                                'class' => 'float-center'
                        ));
                        ?>
                    </div>
                </div>
                <p>
                    <?php
                        echo $post['Post']['body'];
                    ?>
                </p>
            </div>
        </div>
    </article>
    <hr />
    <section>
        <?php
            $url = (!empty($_SERVER['HTTPS'])) ? 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            ?>
            
            <div class="fb-comments" data-href="<?php echo $url; ?>" data-num-posts="2" data-width="470"></div>
    </section>
</div>
<!-- End Main Content -->