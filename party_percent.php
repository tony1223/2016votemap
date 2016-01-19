<?php 

  $party = htmlspecialchars($_GET["n"]);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>台灣 2016 <?=$party?> 政黨票支持比例地圖</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta property="og:type" content="website">

        <meta property="og:image" content="http://tonyq.org/2016/DrsnTuZ.jpg" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            html, body {
                height: 100%;
                width: 100%;
                margin: 0;
                padding: 0;
            }
            #map-canvas {
                height: 600px;
                width: 90%;
            }
            #histogram {
                height: 40%;
                width: 100%;
                min-height: 300px;
            }
            #myTabContent {
                height: 85%;
                width: 100%;
                min-height: 300px;
            }
            #title {
                text-align: center;
                padding: 10px;
            }
            .colorBox {
                width: 1em;
                height: 1em;
                border: 1px solid #34495E;
                display: inline-block;
                margin: 0 3px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <p class="hidden-sm hidden-xs">&nbsp;</p>
                <h1><?=$party?> 政黨票支持地圖 </h1>
                <p>（單位：投票比例，投給政黨之於總投票比例）</p>
  
選此看其他政黨 <select onchange="self.location.href='http://tonyq.org/2016/party_percent.php?n='+this.value;">
  <option >請選擇</option>
  <option  value="民主進步黨">民主進步黨</option>
  <option  value="親民黨">親民黨</option>
  <option  value="自由台灣黨&rank=1">自由台灣黨</option>
  <option  value="和平鴿聯盟黨">和平鴿聯盟黨</option>
  <option  value="軍公教聯盟黨">軍公教聯盟黨</option>
  <option  value="民國黨">民國黨</option>
  <option  value="信心希望聯盟">信心希望聯盟 </option>
  <option  value="中華統一促進黨&rank=1">中華統一促進黨</option>
  <option  value="中國國民黨">中國國民黨</option>
  <option  value="台灣團結聯盟">台灣團結聯盟</option>
  <option  value="時代力量">時代力量</option>
  <option  value="大愛憲改聯盟&rank=1">大愛憲改聯盟</option>
  <option  value="綠黨社會民主黨聯盟">綠黨社會民主黨聯盟</option> 
  <option  value="台灣獨立黨">台灣獨立黨</option>
  <option  value="無黨團結聯盟">無黨團結聯盟</option>
  <option  value="新黨&rank=1">新黨</option>
  <option  value="健保免費連線&rank=1">健保免費連線</option>
  <option  value="樹黨&rank=1">樹黨</option>
</select>

<Br />
<Br />
<p>其他不同類型地圖： 
<a href="http://tonyq.org/2016/people.php?n=曾柏瑜" >看立委候選人分布地圖</a>
、<a href="http://tonyq.org/2016/party_pk.php?p=<?=$party?>vs信心希望聯盟" >看兩政黨 PK 地圖</a>
 、<a href="http://tonyq.org/2016/party.php?n=<?=$party?>" >政黨票數地圖</a> 
</p>
</p>
                <div id="map-canvas" class="col-md-12"></div>
                <div id="detail" class="col-md-12">
                    <h2 id="content" class="text-muted">在地圖上滑動或點選以顯示數據</h2>



<div class="fb-like" data-href="http://tonyq.org/2016/party.php?n=<?=$party?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>


                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <h3 id="title"></h3>
                        <div>
                            顏色數字
                            <div class="colors">
                            </div>
                            
                        </div>
                        <div style="float: right;">快速定位
                            <div class="btn-group">
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 25.053699, lng: 121.507837});
                                        return false">台北</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 24.752504, lng: 121.771097});
                                        return false">宜蘭</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 24.804498, lng: 120.988528});
                                        return false">新竹</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 24.167804, lng: 120.658214});
                                        return false">台中</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 23.477332, lng: 120.430085});
                                        return false">嘉義</a><br />
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 22.996169, lng: 120.201330});
                                        return false">台南</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 22.643894, lng: 120.317828});
                                        return false">高雄</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 22.674185, lng: 120.501103});
                                        return false">屏東</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 23.999479, lng: 121.606658});
                                        return false">花蓮</a>
                                <a href="#" class="btn btn-default" onclick="map.setCenter({lat: 22.793229, lng: 121.124322});
                                        return false">台東</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <p>&nbsp;</p>

                    </div>
                </div>
                <p class="hidden-md hidden-lg">&nbsp;</p>
                <p>&nbsp;</p>
            </div>
            <div id="listNoneCunli"></div>

            
            <p> 
                如果部分區域出現空白或 0% 可能是該地區資料名稱有問題，
                請填寫網頁底下表單回報。
            </p>            
            <iframe src="https://docs.google.com/forms/d/19TdSx4bLO0qEmYj4Ji1UvM4SPUh9WqQx7RNC7tBZgeg/viewform?embedded=true" width="760" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
            <div style="text-align: center;">
                <p>Power by TonyQ</p>
                <a href="https://github.com/tony1223/2016votemap">網站原始碼</a> | 
                <a href="http://2016.cec.gov.tw/opendata/cec2016/getJson?dataType=7">地理資料來源：中選會開票所 API </a> 
    
                <a href="http://www.cec.gov.tw/zh_TW/T1/n708010600000000.html">選票資料來源：中選會網站 </a> 
                <a href="https://github.com/kiang/TainanDengueMap">程式參考</a> | 
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//maps.googleapis.com/maps/api/js?v=3"></script>
        <script src="//code.highcharts.com/stock/highstock.js"></script>
        <script src="//code.highcharts.com/stock/modules/exporting.js"></script>
        <script src="http://tony1223.github.io/2016votemap/ColorBar.js"></script>
        <script src="http://tony1223.github.io/2016votemap/topojson.js"></script>

<script>

var map,
        currentPlayIndex = false,
        cunli;


var pvote = $.get('https://cdn.rawgit.com/tony1223/crawl2016votes/7d4319e25fad05ed34f3ce28b710855746de88fe/outputs/votes_type_%E6%94%BF%E9%BB%A8%E7%A5%A8.json');
var cunli_data = null;

var pcunli = $.get('http://tony1223.github.io/2016votemap/cunli2.json');


// $.getJSON("../outputs/votes_all.json",function(data){
//     Votes = data;
// });




var _colorBar = [
    {n:1,color:"#FFFFCC"},
    {n:2,color:"#ECDAB0"},
    {n:5,color:"#DAB594"},
    {n:10,color:"#C79079"},
    {n:30,color:"#BE7D6B"},
    {n:50,color:"#B56B5D"},
    {n:70,color:"#AC584F"},
    {n:80,color:"#A24641"},
    {n:90,color:"#993333"},
    {n:100,color:"red"},
];
var out = [];
var last_c = -1;
_colorBar.forEach(function(c,ind){
    out.push("<span class='colorBox' ",
        " style='background-color: " , c.color ,
        " ;'></span>&nbsp;" );

    if(ind == _colorBar.length -1){
        out.push((last_c+1)+" ~ 100 ");
    }else{
        out.push(last_c+1," ~ ",c.n );
    }
    last_c = c.n;
});
$(".colors").html(out.join(""));

var ColorBar = function(num){
    var color = _colorBar[0].color;
    for(var i = 0 ; i < _colorBar.length;++i){
        if(_colorBar[i].n > num){
            break;
        }else{
            color = _colorBar[i].color;            
        }
    }
    return color;
};

function initialize() {

    /*map setting*/

    map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 10,
        center: {lat: 23.00, lng: 120.30}
    });

    pcunli.then(function(data){

        pvote.then(function(Votes){

            var VoteMap = Votes.reduce(function(now,v){

                now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] = now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] || {all:0,votes:0};

                if( v.姓名 == "<?=$party?>"){
                    now[v.縣市+"-"+v.鄉鎮+"-"+v.村里].votes += parseInt(v.票數,10);
                }

                now[v.縣市+"-"+v.鄉鎮+"-"+v.村里].all += parseInt(v.票數,10);

                return now;

            },{});


            cunli_data = data;
            cunli = map.data.addGeoJson(topojson.feature(cunli_data, cunli_data.objects.cunli));

            var areas = [];
            cunli.forEach(function (value) {
                var AreaName = value.getProperty('T_Name'),
                        TownName = value.getProperty('V_Name'),
      CityName = value.getProperty("C_Name"),
                        count = 0;

                var localVotes = VoteMap[CityName+"-"+AreaName+"-" +TownName] || null;
    
                var count = 0;
                if (localVotes) {
                    count = parseInt(Math.round((localVotes.votes/localVotes.all)*100),10);
                }
                value.setProperty('num', count);
                
                // if(countyId.length === 2) {
                //     countyId += '000';
                // }
                // if(!areas[countyId]) {
                //     areas[countyId] = value.getProperty('C_Name');
                // }
                // if(!areas[townId]) {
                //     areas[townId] = value.getProperty('C_Name') + value.getProperty('T_Name');
                // }
            });
            
            map.data.setStyle(function (feature) {
                color = ColorBar(feature.getProperty('num'));
                return {
                    fillColor: color,
                    fillOpacity: 0.8,
                    strokeColor: 'gray',
                    strokeWeight: 0
                }
            });

        });


    });
    
    map.data.addListener('mouseover', function (event) {
        var Cunli = event.feature.getProperty('C_Name') + event.feature.getProperty('T_Name') + event.feature.getProperty('V_Name');
        map.data.revertStyle();
        map.data.overrideStyle(event.feature, {fillColor: 'white'});
        $('#content').html('<div>' + Cunli + ' ：' + event.feature.getProperty('num') + ' % </div>').removeClass('text-muted');
    });

    map.data.addListener('mouseout', function (event) {
        map.data.revertStyle();
        $('#content').html('在地圖上滑動或點選以顯示數據').addClass('text-muted');
    });

    map.data.addListener('click', function (event) {
        var Cunli = event.feature.getProperty('VILLAGE_ID');
        var CunliTitle = event.feature.getProperty('C_Name') + event.feature.getProperty('T_Name') + event.feature.getProperty('V_Name');
        if ($('#myTab a[name|="' + Cunli + '"]').tab('show').length === 0) {
            $('#myTab').append('<li><a name="' + Cunli + '" href="#' + Cunli + '" data-toggle="tab">' + CunliTitle +
                    '<button class="close" onclick="closeTab(this.parentNode)">×</button></a></li>');
            $('#myTabContent').append('<div class="tab-pane fade" id="' + Cunli + '"><div></div></div>');
            $('#myTab a:last').tab('show');
            $('#myTab li a:last').click(function (e) {
                $(window).trigger('resize');
            });
        }
    }); 
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>        

        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67262972-5', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=218334411502";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
