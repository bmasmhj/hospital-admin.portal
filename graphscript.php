

<script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>


<script>
!function(o){"use strict";  
    function e(){ 
        this.$body=o("body"),
        this.charts=[]}e.prototype.initCharts=function(){window.Apex={chart:{parentHeightOffset:0,toolbar:{show:!1}},
        grid:{padding:{left:0,right:0}},
        colors:["#727cf5","#0acf97","#fa5c7c","#ffbc00"]};
        var e=["#727cf5","#0acf97","#fa5c7c","#ffbc00"],
        t=o("#revenue-chart").data("colors");t&&(e=t.split(","));
        var r={chart:{height:364,type:"line",
        dropShadow:{enabled:!0,opacity:.2,blur:7,left:-7,top:7}},
        dataLabels:{enabled:!1},stroke:{curve:"smooth",width:4},
        series:[{name:"Unique Viewers",data:[
           <?php 
           $recent = "";
           $recents = "";

           
            foreach($sevendata as $key => $sevens){ 
                $i=0;
                $value = $sevens['utv'].','.$recent;
                $recent = $value ;
            }
           echo $recent;
            ?>]},
        {name:"Total page view",data:
         [<?php   
            foreach($sevendata as $key => $sevens){ 
                $i=0;
                $value = $sevens['ptv'].','.$recents;
                $recents = $value ;
            }
           echo $recents;?>]}],

            
        colors:e,zoom:{enabled:!1},
        legend:{show:!1},xaxis:{type:"string",
        categories: [<?php 
        $rdate = "";  
            foreach($sevendata as $key => $sevens){ 
                $i=0;
                $stamp = $sevens['date'];
                $date = strtotime($stamp);
                $day = date('M d',$date);
                $value = '"'.$day.'",'.$rdate;
                $rdate = $value;
            }

           echo $rdate;?>],
        tooltip:{enabled:!1},axisBorder:{show:!1}},
        yaxis:{labels:{formatter:function(e){return e},
        offsetX:-15}}};new ApexCharts(document.querySelector("#revenue-chart"),r).render();e=["#727cf5","#e3eaef"]; o.Dashboard=e }(window.jQuery)
    } (window.jQuery);
</script>

<?php 

require 'controller/info-fetcher.php';

$n = 0;

foreach($doctordata as $key => $timdocval ){
    $s = $timdocval['scheduledaystart'];
    $e = $timdocval['scheduledaayend'];
    $day = date("w", strtotime($s));  
    $day2 = date("w", strtotime($e)); 
    

    if($day < $day2){
        for($i = $day ; $i < $day2 ; $i++){
            if($i == 0 ){
                $sun++;

            }
            if($i == 1 ){
                $mon++;


            }if($i == 2 ){
                $tue++;


            }
            if($i == 3 ){
                $wed++;


            }
            if($i == 4 ){
                $thur++;


            }
            if($i == 5 ){
                $fri++;


            }
            if($i == 6 ){
                $sat++;


            }
        }  
    } 
    else if($day > $day2 ){
        for($j = $day ; $j <= 6 ; $j++){
            if($j = 0 ){
                $sun ++;

            }
            if($j = 1 ){
                $mon++;

            }if($j = 2 ){
                $tue++;

            }
            if($j = 3 ){
                $wed++;

            }
            if($j = 4 ){
                $thur++;

            }
            if($j = 5 ){
                $fri++;

            }
            if($j = 6 ){
                $sat++;

            }
        } 
    }     

    
}



?>
<script>
    var briteChartApp=window.briteChartApp||{};
!function(i,e){
    "use strict";
    var c=["#727cf5","#0acf97","#6c757d","#fa5c7c","#ffbc00","#39afd1","#aef"];
    e.createBarChart=function(e,t){var a=i(e).data("colors"),l=a?a.split(","):
    c.concat(),n=new britecharts.miniTooltip,
    u=new britecharts.bar,o=d3.select(e),
    r=!!o.node()&&o.node().getBoundingClientRect().width,
    d=!!o.node()&&o.node().getBoundingClientRect().height;
    u.isAnimated(!0).width(r).height(d).margin({
        top:10,left:55,bottom:20,right:10
    }).betweenBarsPadding(.5).colorSchema(l).on("customMouseOver",n.show).on("customMouseMove",n.update).on("customMouseOut",n.hide),o.datum(t).call(u),d3.select(e+" .metadata-group").datum([]).call(n)},e.createHorizontalBarChart=function(e,t){
        
        var a=i(e).data("colors"),l=a?a.split(","):c.concat(),n=new britecharts.bar,u=d3.select(e),o=!!u.node()&&u.node().getBoundingClientRect().width,r=!!u.node()&&u.node().getBoundingClientRect().height;n.colorSchema(l).isAnimated(!0).isHorizontal(!0).width(o).margin({top:10,left:50,bottom:20,right:10}).enableLabels(!0).percentageAxisToMaxRatio(1.3).labelsNumberFormat(1).height(r),u.datum(t).call(n)},e.createLineChart=function(e,t){var a=new britecharts.line,l=new britecharts.tooltip,n=d3.select(e),u=!!n.node()&&n.node().getBoundingClientRect().width;a.isAnimated(!0).aspectRatio(.7).tooltipThreshold(100).grid("horizontal").width(u).dateLabel("date").valueLabel("value").on("customMouseOver",l.show).on("customMouseMove",l.update).on("customMouseOut",l.hide),l.title("Sample Data"),n.datum(t).call(a),d3.select(e+" .metadata-group .hover-marker").datum([]).call(l)},e.createDonutChart=function(e,t){var a=i(e).data("colors"),l=a?a.split(","):c.concat(),n=britecharts.donut(),u=britecharts.legend();u.width(250).height(200).colorSchema(l).numberFormat("s"),n.height(300).highlightSliceById(3).colorSchema(l).hasFixedHighlightedSlice(!0).internalRadius(80).on("customMouseOver",function(e){u.highlight(e.data.id)}).on("customMouseOut",function(){u.clearHighlight()}),d3.select(e).datum(t).call(n),d3.select(".legend-chart-container").datum(t).call(u)},e.createBrushChart=function(e,t){var a=d3.select(e),l=britecharts.brush(),n=!!a.node()&&a.node().getBoundingClientRect().width;l.height(320).width(n).on("customBrushStart",function(e){var t=d3.timeFormat("%m/%d/%Y");console.log("Start date = "+t(e[0])),console.log("End date = "+t(e[1]))}).on("customBrushEnd",function(e){console.log("rounded extent",e)}),a.datum(t).call(l),l.dateRange(["9/15/2015","1/25/2016"])},e.createStepChart=function(e,t){var a=britecharts.step(),l=britecharts.miniTooltip(),n=d3.select(e),u=!!n.node()&&n.node().getBoundingClientRect().width;a.width(u).height(320).margin({top:40,right:40,bottom:80,left:50}).on("customMouseOver",l.show).on("customMouseMove",l.update).on("customMouseOut",l.hide),n.datum(t).call(a),l.nameLabel("key"),d3.select(e+" .step-chart .metadata-group").datum([]).call(l)},i(function(){
            

            var e=[
                {name:"Mon",value:<?php echo $mon?>},
                {name:"Tue",value:<?php echo $tue?>},
                {name:"Wed",value:<?php echo $wed?>},
                {name:"Thu",value:<?php echo $thur?>},
                {name:"Fri",value:<?php echo $fri?>},
                {name:"Sat",value:<?php echo $sat?>},
                {name:"Sun",value:<?php echo $sun?>}],
                
            t={dataByTopic:[{topic:103,topicName:"Money",
            dates:[

         <?php 
         foreach( $richdata as $key => $richdataval ){
             echo ' {date:"'.$richdataval['date'].'",value:'.$richdataval["moneytoday"].', fullDate:"'.$richdataval['date'].'" },';
         }
            ?>       
       
    ]}]},
        
        
        a=[{name:"Shiny",id:1,quantity:86,percentage:5},{name:"Blazing",id:2,quantity:300,percentage:18},{name:"Dazzling",id:3,quantity:276,percentage:16},{name:"Radiant",id:4,quantity:195,percentage:11},{name:"Sparkling",id:5,quantity:36,percentage:2},{name:"Other",id:0,quantity:814,percentage:48}],l=[{date:"2018-06-27T07:00:00.000Z",value:4},{date:"2018-06-28T07:00:00.000Z",value:12},{date:"2018-06-29T07:00:00.000Z",value:33},{date:"2018-06-30T07:00:00.000Z",value:17},{date:"2018-07-01T07:00:00.000Z",value:17},{date:"2018-07-02T07:00:00.000Z",value:16},{date:"2018-07-03T07:00:00.000Z",value:8},{date:"2018-07-04T07:00:00.000Z",value:14},{date:"2018-07-05T07:00:00.000Z",value:11},{date:"2018-07-06T07:00:00.000Z",value:14},{date:"2018-07-07T07:00:00.000Z",value:25},{date:"2018-07-08T07:00:00.000Z",value:55},{date:"2018-07-09T07:00:00.000Z",value:15},{date:"2018-07-10T07:00:00.000Z",value:26},{date:"2018-07-11T07:00:00.000Z",value:21},{date:"2018-07-12T07:00:00.000Z",value:16},{date:"2018-07-13T07:00:00.000Z",value:20},{date:"2018-07-14T07:00:00.000Z",value:26},{date:"2018-07-15T07:00:00.000Z",value:24},{date:"2018-07-16T07:00:00.000Z",value:29},{date:"2018-07-17T07:00:00.000Z",value:12},{date:"2018-07-18T07:00:00.000Z",value:16},{date:"2018-07-19T07:00:00.000Z",value:11},{date:"2018-07-20T07:00:00.000Z",value:29},{date:"2018-07-21T07:00:00.000Z",value:9},{date:"2018-07-22T07:00:00.000Z",value:26},{date:"2018-07-23T07:00:00.000Z",value:21},{date:"2018-07-24T07:00:00.000Z",value:18},{date:"2018-07-25T07:00:00.000Z",value:15},{date:"2018-07-26T07:00:00.000Z",value:23},{date:"2018-07-27T07:00:00.000Z",value:43},{date:"2018-07-28T07:00:00.000Z",value:44},{date:"2018-07-29T07:00:00.000Z",value:67},{date:"2018-07-30T07:00:00.000Z",value:67},{date:"2018-07-31T07:00:00.000Z",value:0},{date:"2018-08-01T07:00:00.000Z",value:0},{date:"2018-08-02T07:00:00.000Z",value:0}],n=[{key:"Appetizer",value:400},{key:"Soup",value:300},{key:"Salad",value:300},{key:"Lunch",value:250},{key:"Dinner",value:220},{key:"Dessert",value:100},{key:"Midnight snack",value:20}];function u(){d3.selectAll(".bar-chart").remove(),d3.selectAll(".line-chart").remove(),d3.selectAll(".donut-chart").remove(),d3.selectAll(".britechart-legend").remove(),d3.selectAll(".brush-chart").remove(),d3.selectAll(".step-chart").remove(),0<i(".bar-container").length&&briteChartApp.createBarChart(".bar-container",e),0<i(".bar-container-horizontal").length&&briteChartApp.createHorizontalBarChart(".bar-container-horizontal",e),0<i(".line-container").length&&briteChartApp.createLineChart(".line-container",t),0<i(".donut-container").length&&briteChartApp.createDonutChart(".donut-container",a),0<i(".brush-container").length&&briteChartApp.createBrushChart(".brush-container",l),0<i(".step-container").length&&briteChartApp.createStepChart(".step-container",n)}i(window).on("resize",function(e){e.preventDefault(),setTimeout(u,200)}),u()})}
    (jQuery,briteChartApp);
</script>