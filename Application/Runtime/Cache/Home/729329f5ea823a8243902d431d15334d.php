<?php if (!defined('THINK_PATH')) exit(); echo W("MyLayout/homeHeader");?> <?php echo W("MyLayout/navbar");?>
<script src="/clear2/Public/jQCloud/jqcloud.min.js"></script>
<link rel="stylesheet" href="/clear2/Public/jQCloud/jqcloud.min.css">
<link rel="stylesheet" href="/clear2/Public/timecube/css/timecube.jquery.css">
<script src="/clear2/Public/timecube/js/timecube.jquery.js"></script>
<link rel="stylesheet" href="/clear2/Public/timeline/css/timeline.css">
<script src="/clear2/Public/timeline/js/storyjs-embed.js"></script>
<script src="/clear2/Public/timeline/js/timeline.js"></script>
<base href="" target="_blank" />
<style type="text/css">
.cloud {
    background-color: #fff !important;
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 4px;
}

.border-right-dashed {
    border-right: 1px dashed #2F71AA;
}

#timeline {
    height: 250px;
    overflow: hidden;
}
</style>
<div class="container margin-top50">
    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp; EVENT TIMELINE</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 ">
                    <p>The timeline is consisted of key tweets about a specific event displaying in chronological order. On the other side, the most related an image towards this event and several news links would be used to describe it.</p>
                </div>
                <div class="col-xs-8 col-md-8 col-lg-8 border-right-dashed">
                    <div id="timeline_old" class=""></div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp; EVENT TIMELINE</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-8 col-md-8 col-lg-8 border-right-dashed">
                    <a href="#" onclick="return false;" id="next-link" class=""></a>
                    <a href="#" onclick="return false;" id="prev-link" class="disabled"></a>
                    <div id="timeline" class="timeCube"></div>
                    <div id="swipe"></div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-md-4 col-lg-4">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp; Event Keywords</h3>
                </div>
                <div class="panel-body">
                    <div id="keywords" class=" cloud"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp; Event Hashtags</h3>
                </div>
                <div class="panel-body">
                    <div id="hashtags" class=" cloud"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp; Event Mentions</h3>
                </div>
                <div class="panel-body">
                    <div id="mentions" class=" cloud"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h3 class="panel-title"><span  class="glyphicon glyphicon-tasks"  aria-hidden="true"></span> &nbsp;Tag Cloud</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4 col-md-4 col-lg-4">
                    <div id="keywords" class=" cloud border-right-dashed"></div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4">
                    <div id="hashtags" class=" cloud border-right-dashed"></div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4">
                    <div id="mentions" class=" cloud"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    createStoryJS({
        type: 'timeline',
        width: '700',
        height: '320',
        source: '/clear2/home/event/timeline',
        embed_id: 'timeline_old',
        debug: true,
    });


    var keywords = [{
            text: "cr",
            weight: 13,
            link: 'https://twitter.com/search?q=cr'
        }, {
            text: "Changi",
            weight: 10.5,
            link: 'https://twitter.com/search?q=Changi'
        }, {
            text: "Airport",
            weight: 9.4,
            link: 'https://twitter.com/search?q=Airport'
        }, {
            text: "Singapore",
            weight: 8.4,
            link: 'https://twitter.com/search?q=Singapore'
        }, {
            text: "Chanyeol",
            weight: 8.4,
            link: 'https://twitter.com/search?q=Chanyeol'
        }, {
            text: "Korea",
            weight: 6.4,
            link: 'https://twitter.com/search?q=Korea'
        },
        /* ... */
    ];
    var hashtags = [{
            text: "#ThankYouPet",
            weight: 13,
            link: 'https://twitter.com/search?q=#ThankYouPet'
        }, {
            text: "#CFC",
            weight: 10.5,
            link: 'https://twitter.com/search?q=#CFC'
        }, {
            text: "#CFCTour",
            weight: 9.4,
            link: 'https://twitter.com/search?q=#CFCTour'
        }
        /* ... */
    ];
    var mentions = [{
            text: "@ChelseaFC",
            weight: 13,
            link: 'https://twitter.com/ChelseaFC'
        }, {
            text: "@chelseafc",
            weight: 10.5,
            link: 'https://twitter.com/chelseafc'
        }, {
            text: "@PetrCech",
            weight: 8.4,
            link: 'https://twitter.com/PetrCech'
        }, {
            text: "@Arsenal",
            weight: 7.4,
            link: 'https://twitter.com/Arsenal'
        }
        /* ... */
    ];
    var width = $('#keywords').css('width').split('px')[0] * 0.9;
    var height = width * 0.5;

    $('#keywords').jQCloud(keywords, {
        width: width,
        height: height
    });
    $('#hashtags').jQCloud(hashtags, {
        width: width,
        height: height
    });
    $('#mentions').jQCloud(mentions, {
        width: width,
        height: height
    });

    /*********************** timeline *************************/
    // Prevent scrolling
    document.body.addEventListener('touchstart', function(e) {
        // allow clicks on links within the moveable area
        if ($(e.target).is('a, iframe')) {
            return true;
        }
        e.preventDefault();
    });

    document.body.addEventListener('touchmove', function(e) {
        e.preventDefault();
    });

    // Events
    var json = [{
        title: 'Fall 2009',
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu risus tortor. Nam dui tellus, porta at libero eu, tempor rutrum tortor.",
        startDate: (new Date('August 31, 2009 10:29:00 pm GMT+0')),
        endDate: null
    }, {
        title: 'Dec 15, 2010',
        description: "Integer hendrerit iaculis odio id semper. ",
        startDate: (new Date('December 15, 2010 00:00:00 am GMT+0')),
        endDate: null
    }, {
        title: 'December 2010',
        description: "Donec sed mauris blandit, faucibus mauris ac, congue est.",
        startDate: (new Date('December 18, 2010 00:00:00 am GMT+0')),
        endDate: null
    }, {
        title: "June 2011",
        description: "Phasellus sit amet vestibulum turpis.",
        startDate: (new Date('June 1, 2011 00:00:00 am GMT+0')),
        endDate: null
    }, {
        title: 'July 4, 2011',
        description: "Nam pretium, sapien ut blandit venenatis, purus odio consectetur dolor, non mollis ligula sem eget leo.",
        startDate: (new Date('July 4, 2011 00:00:00 am GMT+0')),
        endDate: null
    }, {
        title: 'Yesterday',
        description: "Sed adipiscing nunc mi, a egestas eros rhoncus vel.",
        startDate: (new Date('August 30, 2011 00:00:00 am GMT+0')),
        endDate: null
    }];

    $("#timeline").timeCube({
        data: json,
        granularity: "year",
        startDate: new Date('August 31, 2009 10:20:00 pm GMT+0'),
        endDate: new Date('September 30, 2011 02:20:00 am GMT+0'),
        nextButton: $("#next-link"),
        previousButton: $("#prev-link"),
        showDate: false
    });

});
</script>
<?php echo W("MyLayout/homeFooter");?>