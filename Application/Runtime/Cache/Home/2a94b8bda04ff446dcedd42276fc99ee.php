<?php if (!defined('THINK_PATH')) exit(); echo W("MyLayout/homeHeader");?> <?php echo W("MyLayout/navbar");?> <?php echo W("MyLayout/googleMap");?>
<base href="" target="_blank" />
<div id="map-canvas" class="margin-top50"></div>
<div class="container-fluid pull-right position">
    <div class="panel panel-primary transparent">
        <div class="panel-heading">
            <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp;Online Bursty Events</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" name="login" class="form-control" placeholder="#Hot">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="list-group event-list">
                <a href="/clear2/Home/Event/profile" class="list-group-item">signed day, @chelseafc
                <span class="badge badge-error">1411</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item">signed day, @chelseafc, abc, efg <span class="badge badge-error">1411</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
                <a href="http://research.larc.smu.edu.sg/pa/CLEar/detail.php?eid=2829" class="list-group-item ">signed day, @chelseafc<span class="badge badge-error">583</span></a>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
#map-canvas {
    height: 750px;
    padding: 0;
}

.position {
    position: absolute;
    right: 5px;
    top: 80px;
}

.event-list {
    margin-top: 10px;
}
</style>
<?php echo W("MyLayout/homeFooter");?>