<?php if (!defined('THINK_PATH')) exit(); echo W("MyLayout/homeHeader");?> <?php echo W("MyLayout/navbar");?> <?php echo W("MyLayout/googleMap");?>
<div id="map-canvas"></div>
<div class="container">
    <div class="popover right transparent">
        <div class="arrow"></div>
        <h3 class="popover-title "><i class="icon-tasks"></i> &nbsp;Online Events</h3>
        <div class="popover-content">
            <div class="row ">
                <div class="span12">
                    <form class="form-search">
                        <div class="input-append">
                            <input type="text" class="span2 search-query">
                            <button type="submit" class="btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <ol class="nav nav-pills nav-stacked numbered">
                <li class=""><a href="#">signed day, @chelseafc</a></li>
                <li><a href="#">signed day, @chelseafc</a></li>
                <li><a href="#">signed day, @chelseafc</a></li>
            </ol>
            <!-- <ol>
                <li>
                    <div class="row-fluid">
                        <div class="span10">
                            <a href="">signed day, @chelseafc</a>
                        </div>
                        <div class="span2">
                            <div class="progress">
                                <div class="bar bar-danger" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ol> -->
        </div>
    </div>
</div>
<style type="text/css">
#map-canvas {
    height: 750px;
    margin: 40px 0 0;
    padding: 0;
}
</style>
<?php echo W("MyLayout/homeFooter");?>