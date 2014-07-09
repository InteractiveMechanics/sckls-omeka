<?php echo head(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="content-block">
                <h1>Contact us</h1>
            	<p class="text-primary">
            		<?php echo get_option('simple_contact_form_contact_page_instructions'); ?>
            	</p>
            	<?php echo flash(); ?>
            	<form name="contact_form" id="contact-form"  method="post" role="form" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="form-group">
                		<?php 
                		    echo $this->formLabel('name', 'Name:');
                		    echo $this->formText('name', $name, array('class'=>'form-control', 'placeholder'=>'John Doe'));
                        ?>
            		</div>
            		<div class="form-group">
                        <?php 
                            echo $this->formLabel('email', 'Your Email: ');
                            echo $this->formText('email', $email, array('class'=>'form-control', 'placeholder'=>'johndoe@me.com'));
                        ?>
                    </div>
                    <div class="form-group">
            		    <?php 
            		        echo $this->formLabel('message', 'Your Message: ');
                            echo $this->formTextarea('message', $message, array('class'=>'form-control', 'rows' => '8')); 
                        ?>
            		</div>    
            
                    <?php if ($captcha): ?>
                        <div class="form-group">
                            <?php echo $captcha; ?>
                        </div>
                    <?php endif; ?>
            
            		<div class="form-group">
            		    <?php echo $this->formSubmit('send', 'Submit', array('class'=>'btn btn-lg btn-block btn-primary')); ?>
            		</div>
            	</form>
            </div>
        </div>
    </div>
</div>
<?php echo foot();
