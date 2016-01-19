<?php 

  $party = htmlspecialchars($_GET["n"]);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>台灣 2016 <?=$party?>  政黨票投票地圖</title>
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
                <h1><?=$party?> 政黨票分布地圖 （單位：票數）</h1>
	

選此看其他政黨 <select onchange="self.location.href=this.value;">
  <option >請選擇</option>
  <option  value="http://tonyq.org/2016/party.php?n=民主進步黨">民主進步黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=親民黨">親民黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=自由台灣黨&rank=1">自由台灣黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=和平鴿聯盟黨">和平鴿聯盟黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=軍公教聯盟黨">軍公教聯盟黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=民國黨">民國黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=信心希望聯盟">信心希望聯盟 </option>
  <option  value="http://tonyq.org/2016/party.php?n=中華統一促進黨&rank=1">中華統一促進黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=中國國民黨">中國國民黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=台灣團結聯盟">台灣團結聯盟</option>
  <option  value="http://tonyq.org/2016/party.php?n=時代力量">時代力量</option>
  <option  value="http://tonyq.org/2016/party.php?n=大愛憲改聯盟&rank=1">大愛憲改聯盟</option>
  <option  value="http://tonyq.org/2016/party.php?n=綠黨社會民主黨聯盟">綠黨社會民主黨聯盟</option> 
  <option  value="http://tonyq.org/2016/party.php?n=台灣獨立黨">台灣獨立黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=無黨團結聯盟">無黨團結聯盟</option>
  <option  value="http://tonyq.org/2016/party.php?n=新黨&rank=1">新黨</option>
  <option  value="http://tonyq.org/2016/party.php?n=健保免費連線&rank=1">健保免費連線</option>
  <option  value="http://tonyq.org/2016/party.php?n=樹黨&rank=1">樹黨</option>
</select>
<Br />
<Br />
<p>其他不同類型地圖： 
<a href="http://tonyq.org/2016/people.php?n=曾柏瑜" >看立委候選人分布地圖</a>
、<a href="http://tonyq.org/2016/party_pk.php?p=<?=$party?>vs信心希望聯盟" >看兩政黨 PK 地圖</a>
、<a href="http://tonyq.org/2016/party_percent.php?n=<?=$party?>" >政黨比例地圖</a>
<!-- 、<a href="http://tonyq.org/2016/party.php?n=<?=$party?>" >政黨票數地圖</a> -->
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

<?php if(isset($_GET["rank"]) && $_GET["rank"]==0){ ?>

    {n:10,color:"#FFFFCC"},
    {n:50,color:"#ECDAB0"},
    {n:100,color:"#DAB594"},
    {n:150,color:"#C79079"},
    {n:200,color:"#BE7D6B"},
    {n:250,color:"#B56B5D"},
    {n:400,color:"#AC584F"},
    {n:600,color:"#A24641"},
    {n:1000,color:"#993333"}

<?php }else if( isset($_GET["rank"]) && $_GET["rank"]==1){  ?>
    {n:1,color:"#FFFFCC"},
    {n:5,color:"#ECDAB0"},
    {n:10,color:"#DAB594"},
    {n:15,color:"#C79079"},
    {n:20,color:"#BE7D6B"},
    {n:25,color:"#B56B5D"},
    {n:40,color:"#AC584F"},
    {n:600,color:"#A24641"},
    {n:100,color:"#993333"}

<?php }else{ ?>

    {n:50,color:"#FFFFCC"},
    {n:100,color:"#ECDAB0"},
    {n:150,color:"#DAB594"},
    {n:300,color:"#C79079"},
    {n:550,color:"#BE7D6B"},
    {n:800,color:"#B56B5D"},
    {n:1200,color:"#AC584F"},
    {n:1500,color:"#A24641"},
    {n:2000,color:"#993333"}
<?php } ?>
];
var out = [];
var last_c = -1;
_colorBar.forEach(function(c,ind){
    out.push("<span class='colorBox' ",
        " style='background-color: " , c.color ,
        " ;'></span>&nbsp;" );

    if(ind == _colorBar.length -1){
        out.push((last_c+1)+"+ ");
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

            var VoteMap = Votes.filter(function(v){
                return v.姓名 == "<?=$party?>" && v.票數 != 0;
            }).reduce(function(now,v){

		now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] = now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] || [];

                now[v.縣市+"-"+v.鄉鎮+"-"+v.村里].push(v);

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

                var localVotes = VoteMap[CityName+"-"+AreaName+"-" +TownName] || [];
		
                var count = 0;
                if (localVotes.length) {
                    count = localVotes.reduce(function (now,next) {
                        now += parseInt(next.票數,10);

                        return now;
                    },0);
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
        $('#content').html('<div>' + Cunli + ' ：' + event.feature.getProperty('num') + ' 票</div>').removeClass('text-muted');
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
