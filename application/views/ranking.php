<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <!-- NavBar -->

    <!-- Main -->
    <div class="row" align="center" >
        <font style="font-weight:bold; font-size: 40px;">World Ranking</font>    
    </div>
    <br>
    <div class="row" align="right">
        <div class="bootstrap-switch-square">
            <input 
                type="checkbox" 
                data-toggle="switch" 
                id="friend-only-switch"
                name="friend-only-switch"
                data-on-text="<span class='fui-check'></span>" 
                data-off-text="<span class='fui-cross'></span>" 
            />
            <font style="font-weight:bold;">&nbsp;&nbsp;View friend only.</font>
        </div>
    </div>
    <br>
    <div class="row" style="height:100px;">
        <br>
        <div class="col-xs-1" align="center">
            <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-tower" aria-hidden="true"></span>
        </div>
        <div class="col-xs-8" align="center">
            <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </div>
        <div class="col-xs-3" align="center">
            <span style="font-size:40px; color:#F0D349;" class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </div>
    </div>
    <br>
    <?php if ($ranking_top_ten) :?>
        <?php foreach($ranking_top_ten as $element):?>
            <?php if ($this->session->userdata('user_id') == $element['user_id']) :?>
            <div class="row" style="font-size:30px; background-color:#9BFCD4;">
            <?php else : ?>
            <div class="row" style="font-size:30px;">
            <?php endif; ?>
                <div class="col-xs-1" align="center">
                    <span style="font-weight:bold;"><?php echo $element['rank_no']+1 ?></span>
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
        it not set!~
    <?php endif; ?> 

    <div class="row" align="center">
        <div class="pagination pagination-warning">
            <a href="#fakelink" class="btn btn-warning previous">
                <i class="fui-arrow-left"></i>
                Previous
            </a>
            <ul>
              <li class="active"><a href="#fakelink">1</a></li>
              <li><a href="#fakelink">2</a></li>
              <li><a href="#fakelink">3</a></li>
              <li><a href="#fakelink">4</a></li>
              <li><a href="#fakelink">5</a></li>
            </ul>
            <a href="#fakelink" class="btn btn-warning next">
                Next
                <i class="fui-arrow-right"></i>
            </a>
        </div>
    </div>
</div>