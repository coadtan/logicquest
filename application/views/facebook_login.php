<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $newDate = date('d-F-Y');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loading Bootstrap -->
    <?=link_tag('assets/flat/css/vendor/bootstrap.min.css')?>

    <!-- Loading Flat UI -->
    <?=link_tag('assets/flat/css/flat-ui.min.css')?>

    <link rel="shortcut icon" href="img/favicon.ico">

</head>
<body>
    <!-- Loading jQuery -->
    <?=script_tag('assets/flat/js/vendor/jquery.min.js')?>
    <!-- Loading all compiled plugins -->
    <?=script_tag('assets/flat/js/vendor/video.js')?>
    <?=script_tag('assets/flat/js/flat-ui.min.js')?>
    <!-- BODY BELOW -->
    <div class="container">
        <!-- NavBar -->
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Logic Quest</a></li> 
            </ul>
                <div class="navbar-right">
                    <?php if ( ! $this->facebook->logged_in()) : ?>
                            <a href="<?php echo $this->facebook->login_url(); ?>" 
                                class="btn btn-block btn-lg btn-inverse">
                                Login
                                <span class="fui-facebook"></span>
                            </a>
                    <?php else : ?>
                                <a href="facebook_logout"
                                    class="btn btn-block btn-lg btn-inverse"><img src="//graph.facebook.com/<?=$user->get_facebook_id()?>/picture">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fui-exit"></span>
                                </a>
                    <?php endif; ?>
                </div>
        </div>

        <!-- Main -->

        <?php if ($this->facebook->logged_in()) : ?>
            <div class="user-info">
                <p><strong>User information</strong></p>
                <!--             
                <img src="//graph.facebook.com/<?=$user->get_facebook_id()?>/picture">
                <img src='//graph.facebook.com/<?=$user->get_facebook_id()?>/picture?type=large'> 
                -->
                <p><strong><?=$user->get_facebook_name()?></strong></p>
                <p><strong><?=$user->get_facebook_id()?></strong></p>
                <a href="<?=base_url('gamecontroller')?>" class="btn btn-block btn-lg btn-success">Play Game</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>