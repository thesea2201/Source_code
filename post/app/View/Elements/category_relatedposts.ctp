<div>
    <?php
    $RelatedPosts = $this->requestAction('/categories/getRelatedPosts/'.$categoryID);
    ?>
    <ul>
        <?php
        foreach($RelatedPosts as $RelatedPost){
        ?>
        <li>
            <?php
                echo $this->Html->link(
                    $RelatedPost['Post']['title'],
                    array('action' => 'view', $RelatedPost['Post']['id'])
                );
            ?>
        </li>
        <?php
        }
        ?>
    </ul>
</div>