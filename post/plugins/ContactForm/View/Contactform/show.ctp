<!-- Main Blog Content -->
<div class="large-9 columns" role="content">
    
    <?php
        echo $this->Form->create('Contactform.Contactform');
    ?>
    <p>Name<sup>(*)</sup></p>
    <?php
        echo $this->Form->input('Contactform.Name', array('label' => __d('contactform', 'name')));
    ?>
    <p>Email<sup>(*)</sup></p>
    <?php   
        echo $this->Form->input('Contactform.Mail', array('label' => __d('contactform', 'email')));
    ?>
    <p>Phone Number<sup>(*)</sup></p>
    <?php   
        echo $this->Form->input('Contactform.Phone', array('label' => __d('contactform', 'phone')));
    ?>
    <p>Subject<sup>(*)</sup></p>
    <?php   
        echo $this->Form->input('Contactform.Subject', array('label' => __d('contactform', 'subject')));
    ?>
    <p>Message<sup>(*)</sup></p>
    <?php   
        echo $this->Form->input('Contactform.Message', array('type' => 'textarea', 'label' => __d('contactform', 'message')));
    ?>
    <div class="g-recaptcha" data-sitekey="6LcaSmUUAAAAAMa6EF5JWXOdOkI0eTMl9TBzmt05"></div>
      <br/>
    <?php   

        echo $this->Form->submit('Submit', array('label' => __d('contactform', 'submit')));

        echo $this->Form->end();
    ?>

    <hr />

</div>

<!-- End Main Content -->
<!-- <?php   
        //echo $this->Form->label('Contactform.Spamprotection', __d('contactform', 'spam protection').' : ');
    ?>
    <p><?php //echo "Spam protection: ".$calculation.' ='?></p>
<?php 
    //echo $this->Form->input('Contactform.Spamprotection', array('label' => false, 'autocomplete' => 'off'));
        ?> -->
