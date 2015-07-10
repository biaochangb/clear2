<?php if (!defined('THINK_PATH')) exit();?><div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo U('Index/index');?>" title="Clairaudient Ear">CLEar</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo U('Index/index');?>">Live Map</a>
                    </li>
                    <li class="">
                        <a href="<?php echo U('Event/profile');?>">Event Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Index/index');?>" title="Clairaudient Ear">CLEar</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo U('Index/index');?>">Live Map</a>
                    </li>
                    <li class="">
                        <a href="<?php echo U('Event/profile');?>">Event Profile</a>
                    </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>