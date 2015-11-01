<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($ranking_for_page) :?>
    <?php foreach($ranking_for_page as $element):?>
        <div class="row" style="font-size:30px; <?=(($this->session->userdata('user_id') == $element['user_id'])?' background-color:#9BFCD4;':'')?>">
            <div class="col-xs-1" align="center">
                <span style="font-weight:bold;"><?php echo $element['rank_no'] ?></span>
            </div>
            <div class="col-xs-8">
                <div class="col-xs-4" align="center">
                     <img src="//graph.facebook.com/<?php echo $element['user_id'] ?>/picture">
                </div>
                    <div class="col-xs-8">
                    <?php echo $element['user_name'] ?>
                    <?php if ($this->session->userdata('user_id') == $element['user_id']) :?>
                        &nbsp;&nbsp;(You)
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-3" align="center">
                <?php echo $element['point'] ?>
            </div>
        </div>
        <br>
    <?php endforeach;?>
<?php else :?>
        <div class="row" style="font-size:30px;" align="center">
            You have no friend playing this game.
        </div>
<?php endif; ?> 