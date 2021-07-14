<?php

add_action('widgets_init', 'al_sponsors_talk_register_widget');

function al_sponsors_talk_register_widget(){
    register_widget('SponsorsAlura');
}

class SponsorsAlura extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'al-sponsors-talks-widget',
            'Sponsors Talks',
            array('description' => 'Selecting sponsors talks')
        );        
    }

    public function form($instance){
        ?>
        <p>
        <input type="checkbox"
               id="<?= $this->get_field_id('caelum') ?>"
               name="<?= $this->get_field_name('caelum') ?>"
               value="1"
               <?php checked(1, $instance['caelum']) ?>
               >
        <label for="<?= $this->get_field_id('caelum') ?>">Sponsor 1: Caelum</label>
        </p>
        <p>
        <input type="checkbox"
               id="<?= $this->get_field_id('hipsters') ?>"
               name="<?= $this->get_field_name('hipsters') ?>"
               value="1"
               <?php checked(1, $instance['hipsters']) ?>
               >
        <label for="<?= $this->get_field_id('hipsters') ?>">Sponsor 2: Hipsters</label>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['caelum'] = !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';
        $instance['hipsters'] = !empty($new_instance['hipsters']) ? strip_tags($new_instance['hipsters']) : '';

        return $instance;
    }

    public function widget($args, $instance){
        ?>

        <section class="main-sponsors">
            <h3 class="sponsors-title">Sponsors</h3>
            <ul class="list-sponsors">
                <?php if(!empty($instance['caelum'])){ ?>
                <li><img src="<?= plugin_dir_url(__FILE__ ) . '../images/caelum.svg' ?>"></li>
                <?php } ?>

                <?php if(!empty($instance['hipsters'])){ ?>
                <li><img src="<?= plugin_dir_url(__FILE__ ) . '../images/hipsters.svg' ?>"></li>
                <?php } ?>
            </ul>
        </section>

        <?php
    }
}