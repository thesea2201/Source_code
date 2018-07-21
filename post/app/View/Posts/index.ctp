
<!-- Main Blog Content -->
<div class="large-9 columns" role="content">
    <?php foreach ($posts as $post): ?>
    <article>

<!--    <h1><a href="#">Blog Post Title</a></h1> -->
        <h1>
        <?php
        echo $this->Html->link(
            $post['Post']['title'],
            array('action' => 'view',
                $post['Post']['id'])
        );
        ?>
        </h1>
        <p class="article_pub-date">Published
            <time datetime="2014-13-05" pubdate=""><?php echo $post['Post']['modified'];?></time>
        </p>

        <div class="row">
            <div class="large-12 columns">
                <?php
                    echo $this->Html->image($post['Post']['imageurl'] , array(
                        'alt' => 'CakePHP',
                        'class' => 'post-img float-left'

                ));
                ?>
                <p>
                    <?php
                        echo substr($post['Post']['body'],0,200)."...";
                    ?>
                </p>
            </div>
        </div>
    <a href="#" class="button">Read More</a>
    </article>

    <hr />

<?php endforeach; ?>
<p class="">
    <?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
</p>
</div>


<!-- 
  <script>
$(function()
{
    var $dialog = $("#view_dialog").dialog(
        {
            autoOpen: false,
            title: 'View Local Clock',
            height: 200,
            width: 1200,
            resizable: true,
            modal: true,
            buttons:
            {
                "Ok": function()
                {
                    $(this).dialog("close");
                }
            }
        });
    $(".view_dialog").click(function()
    {
        $dialog.load($(this).attr('href'), function ()
                {
                    $dialog.dialog('open');
                });
        return false;
    });
});
 -->