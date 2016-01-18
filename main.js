
var map,
        currentPlayIndex = false,
        cunli;

var Votes = [];

$.get('https://cdn.rawgit.com/tony1223/crawl2016votes/master/outputs/votes_all.json', function (data) {
    Votes = data;
});
var cunli_data = null;

var pcunli = $.get('cunli2.json');


// $.getJSON("../outputs/votes_all.json",function(data){
//     Votes = data;
// });

function initialize() {

    /*map setting*/
    $('#map-canvas').height(window.outerHeight / 2.2);

    map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 10,
        center: {lat: 23.00, lng: 120.30}
    });


    pcunli.then(function(data){
        cunli_data = data;
        cunli = map.data.addGeoJson(topojson.feature(cunli_data, cunli_data.objects.cunli));

        var areas = [];
        cunli.forEach(function (value) {
            var AreaName = value.getProperty('T_Name'),
                    TownName = value.getProperty('V_Name'),
                    count = 0;

            var localVotes = Votes.filter(function(v){
                return v.areaname == AreaName && v.villagename == TownName;
            });
            var count = 0;
            if (localVotes.length) {
                count = localVotes.reduce(function (now,next) {
                    
                    next["v"]["區域立委"].filter(function(n){
                        return n.pt == "中國國民黨";
                    }).forEach(function(n){
                        now += parseInt(n.c.replace(","),10);
                    });

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
                fillOpacity: 0.6,
                strokeColor: 'gray',
                strokeWeight: 1
            }
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