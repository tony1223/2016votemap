<?php 
  $name = htmlspecialchars($_GET["n"]);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>台灣 2016 [<?=$name?>] 區域立委選名投票分布地圖</title>
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
                <h1>2016 區域立委 [<?=$name?>] 選民選票分布地圖</h1>


		看看其他立委候選人的地圖
<select onchange="self.location.href=this.value;">
	<option>請選擇</option>
<option value='http://tonyq.org/2016/people.php?n=陳雪生'>連江縣：陳雪生</option>
<option value='http://tonyq.org/2016/people.php?n=林金官'>連江縣：林金官</option>
<option value='http://tonyq.org/2016/people.php?n=蘇柏豪'>連江縣：蘇柏豪</option>
<option value='http://tonyq.org/2016/people.php?n=張春寶'>連江縣：張春寶</option>
<option value='http://tonyq.org/2016/people.php?n=洪志恒'>金門縣：洪志恒</option>
<option value='http://tonyq.org/2016/people.php?n=陳滄江'>金門縣：陳滄江</option>
<option value='http://tonyq.org/2016/people.php?n=高丹樺'>金門縣：高丹樺</option>
<option value='http://tonyq.org/2016/people.php?n=張中法'>金門縣：張中法</option>
<option value='http://tonyq.org/2016/people.php?n=楊鎮浯'>金門縣：楊鎮浯</option>
<option value='http://tonyq.org/2016/people.php?n=陳仲立'>金門縣：陳仲立</option>
<option value='http://tonyq.org/2016/people.php?n=陳德輝'>金門縣：陳德輝</option>
<option value='http://tonyq.org/2016/people.php?n=吳成典'>金門縣：吳成典</option>
<option value='http://tonyq.org/2016/people.php?n=陳歐珀'>宜蘭縣：陳歐珀</option>
<option value='http://tonyq.org/2016/people.php?n=孫博萮'>宜蘭縣：孫博萮</option>
<option value='http://tonyq.org/2016/people.php?n=郭儒釗'>宜蘭縣：郭儒釗</option>
<option value='http://tonyq.org/2016/people.php?n=李志鏞'>宜蘭縣：李志鏞</option>
<option value='http://tonyq.org/2016/people.php?n=林獻山'>宜蘭縣：林獻山</option>
<option value='http://tonyq.org/2016/people.php?n=吳子維'>宜蘭縣：吳子維</option>
<option value='http://tonyq.org/2016/people.php?n=吳紹文'>宜蘭縣：吳紹文</option>
<option value='http://tonyq.org/2016/people.php?n=邱錫奎'>宜蘭縣：邱錫奎</option>
<option value='http://tonyq.org/2016/people.php?n=林為洲'>新竹縣：林為洲</option>
<option value='http://tonyq.org/2016/people.php?n=黃秀龍'>新竹縣：黃秀龍</option>
<option value='http://tonyq.org/2016/people.php?n=鄭永金'>新竹縣：鄭永金</option>
<option value='http://tonyq.org/2016/people.php?n=范振揆'>新竹縣：范振揆</option>
<option value='http://tonyq.org/2016/people.php?n=蘇雯英'>新竹縣：蘇雯英</option>
<option value='http://tonyq.org/2016/people.php?n=李宗華'>新竹縣：李宗華</option>
<option value='http://tonyq.org/2016/people.php?n=卓恩宗'>新竹縣：卓恩宗</option>
<option value='http://tonyq.org/2016/people.php?n=邱靖雅'>新竹縣：邱靖雅</option>
<option value='http://tonyq.org/2016/people.php?n=戴文祥'>苗栗縣：戴文祥</option>
<option value='http://tonyq.org/2016/people.php?n=徐志榮'>苗栗縣：徐志榮</option>
<option value='http://tonyq.org/2016/people.php?n=周書涵'>苗栗縣：周書涵</option>
<option value='http://tonyq.org/2016/people.php?n=吳宜臻'>苗栗縣：吳宜臻</option>
<option value='http://tonyq.org/2016/people.php?n=劉文忠'>苗栗縣：劉文忠</option>
<option value='http://tonyq.org/2016/people.php?n=杜文卿'>苗栗縣：杜文卿</option>
<option value='http://tonyq.org/2016/people.php?n=康世儒'>苗栗縣：康世儒</option>
<option value='http://tonyq.org/2016/people.php?n=黃玉燕'>苗栗縣：黃玉燕</option>
<option value='http://tonyq.org/2016/people.php?n=陳超明'>苗栗縣：陳超明</option>
<option value='http://tonyq.org/2016/people.php?n=林一方'>苗栗縣：林一方</option>
<option value='http://tonyq.org/2016/people.php?n=張耀元'>彰化縣：張耀元</option>
<option value='http://tonyq.org/2016/people.php?n=林滄敏'>彰化縣：林滄敏</option>
<option value='http://tonyq.org/2016/people.php?n=黃秀芳'>彰化縣：黃秀芳</option>
<option value='http://tonyq.org/2016/people.php?n=許永金'>彰化縣：許永金</option>
<option value='http://tonyq.org/2016/people.php?n=黄玉芬'>彰化縣：黄玉芬</option>
<option value='http://tonyq.org/2016/people.php?n=劉泳君'>彰化縣：劉泳君</option>
<option value='http://tonyq.org/2016/people.php?n=温國銘'>彰化縣：温國銘</option>
<option value='http://tonyq.org/2016/people.php?n=陳文彬'>彰化縣：陳文彬</option>
<option value='http://tonyq.org/2016/people.php?n=王惠美'>彰化縣：王惠美</option>
<option value='http://tonyq.org/2016/people.php?n=陳素月'>彰化縣：陳素月</option>
<option value='http://tonyq.org/2016/people.php?n=張錦昆'>彰化縣：張錦昆</option>
<option value='http://tonyq.org/2016/people.php?n=洪遊江'>彰化縣：洪遊江</option>
<option value='http://tonyq.org/2016/people.php?n=鄭汝芬'>彰化縣：鄭汝芬</option>
<option value='http://tonyq.org/2016/people.php?n=陳朝容'>彰化縣：陳朝容</option>
<option value='http://tonyq.org/2016/people.php?n=張益勝'>彰化縣：張益勝</option>
<option value='http://tonyq.org/2016/people.php?n=洪宗熠'>彰化縣：洪宗熠</option>
<option value='http://tonyq.org/2016/people.php?n=蔡煌瑯'>南投縣：蔡煌瑯</option>
<option value='http://tonyq.org/2016/people.php?n=許淑華'>南投縣：許淑華</option>
<option value='http://tonyq.org/2016/people.php?n=馬文君'>南投縣：馬文君</option>
<option value='http://tonyq.org/2016/people.php?n=張國鑫'>南投縣：張國鑫</option>
<option value='http://tonyq.org/2016/people.php?n=王煒婷'>雲林縣：王煒婷</option>
<option value='http://tonyq.org/2016/people.php?n=張佳偉'>雲林縣：張佳偉</option>
<option value='http://tonyq.org/2016/people.php?n=吳威志'>雲林縣：吳威志</option>
<option value='http://tonyq.org/2016/people.php?n=劉建國'>雲林縣：劉建國</option>
<option value='http://tonyq.org/2016/people.php?n=蘇治芬'>雲林縣：蘇治芬</option>
<option value='http://tonyq.org/2016/people.php?n=張鎔麒'>雲林縣：張鎔麒</option>
<option value='http://tonyq.org/2016/people.php?n=林富源'>雲林縣：林富源</option>
<option value='http://tonyq.org/2016/people.php?n=邱崑龍'>嘉義縣：邱崑龍</option>
<option value='http://tonyq.org/2016/people.php?n=蔡易餘'>嘉義縣：蔡易餘</option>
<option value='http://tonyq.org/2016/people.php?n=林江釧'>嘉義縣：林江釧</option>
<option value='http://tonyq.org/2016/people.php?n=陳明文'>嘉義縣：陳明文</option>
<option value='http://tonyq.org/2016/people.php?n=賴競民'>嘉義縣：賴競民</option>
<option value='http://tonyq.org/2016/people.php?n=林于玲'>嘉義縣：林于玲</option>
<option value='http://tonyq.org/2016/people.php?n=鍾佳濱'>屏東縣：鍾佳濱</option>
<option value='http://tonyq.org/2016/people.php?n=王進士'>屏東縣：王進士</option>
<option value='http://tonyq.org/2016/people.php?n=廖婉汝'>屏東縣：廖婉汝</option>
<option value='http://tonyq.org/2016/people.php?n=蘇震清'>屏東縣：蘇震清</option>
<option value='http://tonyq.org/2016/people.php?n=黃昭展'>屏東縣：黃昭展</option>
<option value='http://tonyq.org/2016/people.php?n=張兆陽'>屏東縣：張兆陽</option>
<option value='http://tonyq.org/2016/people.php?n=莊瑞雄'>屏東縣：莊瑞雄</option>
<option value='http://tonyq.org/2016/people.php?n=許謹如'>屏東縣：許謹如</option>
<option value='http://tonyq.org/2016/people.php?n=丁勇智'>屏東縣：丁勇智</option>
<option value='http://tonyq.org/2016/people.php?n=陳建閣'>臺東縣：陳建閣</option>
<option value='http://tonyq.org/2016/people.php?n=劉櫂豪'>臺東縣：劉櫂豪</option>
<option value='http://tonyq.org/2016/people.php?n=黄師鵬'>花蓮縣：黄師鵬</option>
<option value='http://tonyq.org/2016/people.php?n=蕭美琴'>花蓮縣：蕭美琴</option>
<option value='http://tonyq.org/2016/people.php?n=楊悟空'>花蓮縣：楊悟空</option>
<option value='http://tonyq.org/2016/people.php?n=王廷升'>花蓮縣：王廷升</option>
<option value='http://tonyq.org/2016/people.php?n=冼義哲'>澎湖縣：冼義哲</option>
<option value='http://tonyq.org/2016/people.php?n=楊曜'>澎湖縣：楊曜</option>
<option value='http://tonyq.org/2016/people.php?n=黃漢東'>澎湖縣：黃漢東</option>
<option value='http://tonyq.org/2016/people.php?n=陳雙全'>澎湖縣：陳雙全</option>
<option value='http://tonyq.org/2016/people.php?n=楊石城'>基隆市：楊石城</option>
<option value='http://tonyq.org/2016/people.php?n=劉文雄'>基隆市：劉文雄</option>
<option value='http://tonyq.org/2016/people.php?n=郝龍斌'>基隆市：郝龍斌</option>
<option value='http://tonyq.org/2016/people.php?n=蔡適應'>基隆市：蔡適應</option>
<option value='http://tonyq.org/2016/people.php?n=柯建銘'>新竹市：柯建銘</option>
<option value='http://tonyq.org/2016/people.php?n=曾耀澂'>新竹市：曾耀澂</option>
<option value='http://tonyq.org/2016/people.php?n=林家宇'>新竹市：林家宇</option>
<option value='http://tonyq.org/2016/people.php?n=歐崇敬'>新竹市：歐崇敬</option>
<option value='http://tonyq.org/2016/people.php?n=魏揚'>新竹市：魏揚</option>
<option value='http://tonyq.org/2016/people.php?n=吳淑敏'>新竹市：吳淑敏</option>
<option value='http://tonyq.org/2016/people.php?n=黃源甫'>新竹市：黃源甫</option>
<option value='http://tonyq.org/2016/people.php?n=王榮德'>新竹市：王榮德</option>
<option value='http://tonyq.org/2016/people.php?n=鄭正鈐'>新竹市：鄭正鈐</option>
<option value='http://tonyq.org/2016/people.php?n=邱顯智'>新竹市：邱顯智</option>
<option value='http://tonyq.org/2016/people.php?n=吳育仁'>嘉義市：吳育仁</option>
<option value='http://tonyq.org/2016/people.php?n=翁壽良'>嘉義市：翁壽良</option>
<option value='http://tonyq.org/2016/people.php?n=李俊俋'>嘉義市：李俊俋</option>
<option value='http://tonyq.org/2016/people.php?n=黃宏成台灣阿成世界偉人財神總統'>嘉義市：黃宏成台灣阿成世界偉人財神總統</option>
<option value='http://tonyq.org/2016/people.php?n=高士恩'>臺北市：高士恩</option>
<option value='http://tonyq.org/2016/people.php?n=潘建志'>臺北市：潘建志</option>
<option value='http://tonyq.org/2016/people.php?n=林新凱'>臺北市：林新凱</option>
<option value='http://tonyq.org/2016/people.php?n=趙燕傑'>臺北市：趙燕傑</option>
<option value='http://tonyq.org/2016/people.php?n=邱正浩'>臺北市：邱正浩</option>
<option value='http://tonyq.org/2016/people.php?n=陳科引'>臺北市：陳科引</option>
<option value='http://tonyq.org/2016/people.php?n=李晏榕'>臺北市：李晏榕</option>
<option value='http://tonyq.org/2016/people.php?n=李成嶽'>臺北市：李成嶽</option>
<option value='http://tonyq.org/2016/people.php?n=黃麗香'>臺北市：黃麗香</option>
<option value='http://tonyq.org/2016/people.php?n=蔣萬安'>臺北市：蔣萬安</option>
<option value='http://tonyq.org/2016/people.php?n=林文傑'>臺北市：林文傑</option>
<option value='http://tonyq.org/2016/people.php?n=呂欣潔'>臺北市：呂欣潔</option>
<option value='http://tonyq.org/2016/people.php?n=詹益正'>臺北市：詹益正</option>
<option value='http://tonyq.org/2016/people.php?n=蘇承英'>臺北市：蘇承英</option>
<option value='http://tonyq.org/2016/people.php?n=范揚律'>臺北市：范揚律</option>
<option value='http://tonyq.org/2016/people.php?n=林芷芬'>臺北市：林芷芬</option>
<option value='http://tonyq.org/2016/people.php?n=費鴻泰'>臺北市：費鴻泰</option>
<option value='http://tonyq.org/2016/people.php?n=楊實秋'>臺北市：楊實秋</option>
<option value='http://tonyq.org/2016/people.php?n=陳家宏'>臺北市：陳家宏</option>
<option value='http://tonyq.org/2016/people.php?n=范雲'>臺北市：范雲</option>
<option value='http://tonyq.org/2016/people.php?n=龎維良'>臺北市：龎維良</option>
<option value='http://tonyq.org/2016/people.php?n=趙衍慶'>臺北市：趙衍慶</option>
<option value='http://tonyq.org/2016/people.php?n=林珍妤'>臺北市：林珍妤</option>
<option value='http://tonyq.org/2016/people.php?n=周芳如'>臺北市：周芳如</option>
<option value='http://tonyq.org/2016/people.php?n=蔣慰慈'>臺北市：蔣慰慈</option>
<option value='http://tonyq.org/2016/people.php?n=鄭村棋'>臺北市：鄭村棋</option>
<option value='http://tonyq.org/2016/people.php?n=曾獻瑩'>臺北市：曾獻瑩</option>
<option value='http://tonyq.org/2016/people.php?n=蔣乃辛'>臺北市：蔣乃辛</option>
<option value='http://tonyq.org/2016/people.php?n=古文發'>臺北市：古文發</option>
<option value='http://tonyq.org/2016/people.php?n=吳旭智'>臺北市：吳旭智</option>
<option value='http://tonyq.org/2016/people.php?n=李慶元'>臺北市：李慶元</option>
<option value='http://tonyq.org/2016/people.php?n=賴樹聲'>臺北市：賴樹聲</option>
<option value='http://tonyq.org/2016/people.php?n=苗博雅'>臺北市：苗博雅</option>
<option value='http://tonyq.org/2016/people.php?n=賴士葆'>臺北市：賴士葆</option>
<option value='http://tonyq.org/2016/people.php?n=陳如聖'>臺北市：陳如聖</option>
<option value='http://tonyq.org/2016/people.php?n=方景鈞'>臺北市：方景鈞</option>
<option value='http://tonyq.org/2016/people.php?n=林郁方'>臺北市：林郁方</option>
<option value='http://tonyq.org/2016/people.php?n=李家幸'>臺北市：李家幸</option>
<option value='http://tonyq.org/2016/people.php?n=黃福卿'>臺北市：黃福卿</option>
<option value='http://tonyq.org/2016/people.php?n=洪顯政'>臺北市：洪顯政</option>
<option value='http://tonyq.org/2016/people.php?n=龔偉綸'>臺北市：龔偉綸</option>
<option value='http://tonyq.org/2016/people.php?n=林昶佐'>臺北市：林昶佐</option>
<option value='http://tonyq.org/2016/people.php?n=尤瑞敏'>臺北市：尤瑞敏</option>
<option value='http://tonyq.org/2016/people.php?n=王銘宗'>臺北市：王銘宗</option>
<option value='http://tonyq.org/2016/people.php?n=陳民乾'>臺北市：陳民乾</option>
<option value='http://tonyq.org/2016/people.php?n=吳俊德'>臺北市：吳俊德</option>
<option value='http://tonyq.org/2016/people.php?n=林幸蓉'>臺北市：林幸蓉</option>
<option value='http://tonyq.org/2016/people.php?n=潘懷宗'>臺北市：潘懷宗</option>
<option value='http://tonyq.org/2016/people.php?n=姚文智'>臺北市：姚文智</option>
<option value='http://tonyq.org/2016/people.php?n=陳建斌'>臺北市：陳建斌</option>
<option value='http://tonyq.org/2016/people.php?n=何偉'>臺北市：何偉</option>
<option value='http://tonyq.org/2016/people.php?n=陳尚志'>臺北市：陳尚志</option>
<option value='http://tonyq.org/2016/people.php?n=黃珊珊'>臺北市：黃珊珊</option>
<option value='http://tonyq.org/2016/people.php?n=李岳峰'>臺北市：李岳峰</option>
<option value='http://tonyq.org/2016/people.php?n=陳兆銘'>臺北市：陳兆銘</option>
<option value='http://tonyq.org/2016/people.php?n=李彥秀'>臺北市：李彥秀</option>
<option value='http://tonyq.org/2016/people.php?n=蕭亞譚'>臺北市：蕭亞譚</option>
<option value='http://tonyq.org/2016/people.php?n=林少馳'>臺北市：林少馳</option>
<option value='http://tonyq.org/2016/people.php?n=丁守中'>臺北市：丁守中</option>
<option value='http://tonyq.org/2016/people.php?n=吳思瑤'>臺北市：吳思瑤</option>
<option value='http://tonyq.org/2016/people.php?n=黃清原'>臺北市：黃清原</option>
<option value='http://tonyq.org/2016/people.php?n=王靜亞'>臺北市：王靜亞</option>
<option value='http://tonyq.org/2016/people.php?n=吳忠錚'>臺北市：吳忠錚</option>
<option value='http://tonyq.org/2016/people.php?n=蔡金晏'>高雄市：蔡金晏</option>
<option value='http://tonyq.org/2016/people.php?n=管碧玲'>高雄市：管碧玲</option>
<option value='http://tonyq.org/2016/people.php?n=楊宗穎'>高雄市：楊宗穎</option>
<option value='http://tonyq.org/2016/people.php?n=王新昌'>高雄市：王新昌</option>
<option value='http://tonyq.org/2016/people.php?n=梁蓓禎'>高雄市：梁蓓禎</option>
<option value='http://tonyq.org/2016/people.php?n=柳淑芳'>高雄市：柳淑芳</option>
<option value='http://tonyq.org/2016/people.php?n=張顯耀'>高雄市：張顯耀</option>
<option value='http://tonyq.org/2016/people.php?n=劉世芳'>高雄市：劉世芳</option>
<option value='http://tonyq.org/2016/people.php?n=莊明憲'>高雄市：莊明憲</option>
<option value='http://tonyq.org/2016/people.php?n=黃柏霖'>高雄市：黃柏霖</option>
<option value='http://tonyq.org/2016/people.php?n=李昆澤'>高雄市：李昆澤</option>
<option value='http://tonyq.org/2016/people.php?n=楊翰奇'>高雄市：楊翰奇</option>
<option value='http://tonyq.org/2016/people.php?n=趙天麟'>高雄市：趙天麟</option>
<option value='http://tonyq.org/2016/people.php?n=陳素莉'>高雄市：陳素莉</option>
<option value='http://tonyq.org/2016/people.php?n=莊啟旺'>高雄市：莊啟旺</option>
<option value='http://tonyq.org/2016/people.php?n=陳惠敏'>高雄市：陳惠敏</option>
<option value='http://tonyq.org/2016/people.php?n=林景元'>高雄市：林景元</option>
<option value='http://tonyq.org/2016/people.php?n=林宗彥'>高雄市：林宗彥</option>
<option value='http://tonyq.org/2016/people.php?n=賴瑞隆'>高雄市：賴瑞隆</option>
<option value='http://tonyq.org/2016/people.php?n=林國正'>高雄市：林國正</option>
<option value='http://tonyq.org/2016/people.php?n=蔡媽福'>高雄市：蔡媽福</option>
<option value='http://tonyq.org/2016/people.php?n=劉義雄'>高雄市：劉義雄</option>
<option value='http://tonyq.org/2016/people.php?n=張育華'>高雄市：張育華</option>
<option value='http://tonyq.org/2016/people.php?n=陳函谷'>高雄市：陳函谷</option>
<option value='http://tonyq.org/2016/people.php?n=黃璽文'>高雄市：黃璽文</option>
<option value='http://tonyq.org/2016/people.php?n=馬凱妮'>高雄市：馬凱妮</option>
<option value='http://tonyq.org/2016/people.php?n=汪婷萱'>高雄市：汪婷萱</option>
<option value='http://tonyq.org/2016/people.php?n=許智傑'>高雄市：許智傑</option>
<option value='http://tonyq.org/2016/people.php?n=郭倫豪'>高雄市：郭倫豪</option>
<option value='http://tonyq.org/2016/people.php?n=林俊揚'>高雄市：林俊揚</option>
<option value='http://tonyq.org/2016/people.php?n=林岱樺'>高雄市：林岱樺</option>
<option value='http://tonyq.org/2016/people.php?n=邱議瑩'>高雄市：邱議瑩</option>
<option value='http://tonyq.org/2016/people.php?n=鍾易仲'>高雄市：鍾易仲</option>
<option value='http://tonyq.org/2016/people.php?n=劉子麟'>高雄市：劉子麟</option>
<option value='http://tonyq.org/2016/people.php?n=莊婷欣'>高雄市：莊婷欣</option>
<option value='http://tonyq.org/2016/people.php?n=邱志偉'>高雄市：邱志偉</option>
<option value='http://tonyq.org/2016/people.php?n=黃韻涵'>高雄市：黃韻涵</option>
<option value='http://tonyq.org/2016/people.php?n=黃金玲'>高雄市：黃金玲</option>
<option value='http://tonyq.org/2016/people.php?n=李柏融'>高雄市：李柏融</option>
<option value='http://tonyq.org/2016/people.php?n=曾盈豐'>高雄市：曾盈豐</option>
<option value='http://tonyq.org/2016/people.php?n=姚玉霜'>新北市：姚玉霜</option>
<option value='http://tonyq.org/2016/people.php?n=李建明'>新北市：李建明</option>
<option value='http://tonyq.org/2016/people.php?n=游信義'>新北市：游信義</option>
<option value='http://tonyq.org/2016/people.php?n=康仁俊'>新北市：康仁俊</option>
<option value='http://tonyq.org/2016/people.php?n=莊豐銘'>新北市：莊豐銘</option>
<option value='http://tonyq.org/2016/people.php?n=李貴寶'>新北市：李貴寶</option>
<option value='http://tonyq.org/2016/people.php?n=黃鈞民'>新北市：黃鈞民</option>
<option value='http://tonyq.org/2016/people.php?n=林國春'>新北市：林國春</option>
<option value='http://tonyq.org/2016/people.php?n=張宏陸'>新北市：張宏陸</option>
<option value='http://tonyq.org/2016/people.php?n=汪成華'>新北市：汪成華</option>
<option value='http://tonyq.org/2016/people.php?n=羅致政'>新北市：羅致政</option>
<option value='http://tonyq.org/2016/people.php?n=李婉鈺'>新北市：李婉鈺</option>
<option value='http://tonyq.org/2016/people.php?n=江惠貞'>新北市：江惠貞</option>
<option value='http://tonyq.org/2016/people.php?n=陳長發'>新北市：陳長發</option>
<option value='http://tonyq.org/2016/people.php?n=蕭忠漢'>新北市：蕭忠漢</option>
<option value='http://tonyq.org/2016/people.php?n=李乾龍'>新北市：李乾龍</option>
<option value='http://tonyq.org/2016/people.php?n=高志鵬'>新北市：高志鵬</option>
<option value='http://tonyq.org/2016/people.php?n=張碩文'>新北市：張碩文</option>
<option value='http://tonyq.org/2016/people.php?n=林其瑩'>新北市：林其瑩</option>
<option value='http://tonyq.org/2016/people.php?n=姚胤宏'>新北市：姚胤宏</option>
<option value='http://tonyq.org/2016/people.php?n=黃茂'>新北市：黃茂</option>
<option value='http://tonyq.org/2016/people.php?n=蘇卿彥'>新北市：蘇卿彥</option>
<option value='http://tonyq.org/2016/people.php?n=陳明義'>新北市：陳明義</option>
<option value='http://tonyq.org/2016/people.php?n=林淑芬'>新北市：林淑芬</option>
<option value='http://tonyq.org/2016/people.php?n=江永昌'>新北市：江永昌</option>
<option value='http://tonyq.org/2016/people.php?n=張慶忠'>新北市：張慶忠</option>
<option value='http://tonyq.org/2016/people.php?n=童正億'>新北市：童正億</option>
<option value='http://tonyq.org/2016/people.php?n=吳金魁'>新北市：吳金魁</option>
<option value='http://tonyq.org/2016/people.php?n=林建志'>新北市：林建志</option>
<option value='http://tonyq.org/2016/people.php?n=邵伯祥'>新北市：邵伯祥</option>
<option value='http://tonyq.org/2016/people.php?n=董建一'>新北市：董建一</option>
<option value='http://tonyq.org/2016/people.php?n=張菁芳'>新北市：張菁芳</option>
<option value='http://tonyq.org/2016/people.php?n=曾文聖'>新北市：曾文聖</option>
<option value='http://tonyq.org/2016/people.php?n=林德福'>新北市：林德福</option>
<option value='http://tonyq.org/2016/people.php?n=李幸長'>新北市：李幸長</option>
<option value='http://tonyq.org/2016/people.php?n=賈伯楷'>新北市：賈伯楷</option>
<option value='http://tonyq.org/2016/people.php?n=吳秉叡'>新北市：吳秉叡</option>
<option value='http://tonyq.org/2016/people.php?n=王斯儀'>新北市：王斯儀</option>
<option value='http://tonyq.org/2016/people.php?n=陳茂嘉'>新北市：陳茂嘉</option>
<option value='http://tonyq.org/2016/people.php?n=劉鳳章'>新北市：劉鳳章</option>
<option value='http://tonyq.org/2016/people.php?n=林麗容'>新北市：林麗容</option>
<option value='http://tonyq.org/2016/people.php?n=邱鴻玕'>新北市：邱鴻玕</option>
<option value='http://tonyq.org/2016/people.php?n=蘇巧慧'>新北市：蘇巧慧</option>
<option value='http://tonyq.org/2016/people.php?n=郭柏瑜'>新北市：郭柏瑜</option>
<option value='http://tonyq.org/2016/people.php?n=黃志雄'>新北市：黃志雄</option>
<option value='http://tonyq.org/2016/people.php?n=羅明才'>新北市：羅明才</option>
<option value='http://tonyq.org/2016/people.php?n=曾柏瑜'>新北市：曾柏瑜</option>
<option value='http://tonyq.org/2016/people.php?n=陳永福'>新北市：陳永福</option>
<option value='http://tonyq.org/2016/people.php?n=盧嘉辰'>新北市：盧嘉辰</option>
<option value='http://tonyq.org/2016/people.php?n=吳琪銘'>新北市：吳琪銘</option>
<option value='http://tonyq.org/2016/people.php?n=黃魯光'>新北市：黃魯光</option>
<option value='http://tonyq.org/2016/people.php?n=吳育昇'>新北市：吳育昇</option>
<option value='http://tonyq.org/2016/people.php?n=蘇通達'>新北市：蘇通達</option>
<option value='http://tonyq.org/2016/people.php?n=洪志成'>新北市：洪志成</option>
<option value='http://tonyq.org/2016/people.php?n=呂孫綾'>新北市：呂孫綾</option>
<option value='http://tonyq.org/2016/people.php?n=陳立基'>新北市：陳立基</option>
<option value='http://tonyq.org/2016/people.php?n=陳筠棻'>新北市：陳筠棻</option>
<option value='http://tonyq.org/2016/people.php?n=鐘國誌'>新北市：鐘國誌</option>
<option value='http://tonyq.org/2016/people.php?n=李慶華'>新北市：李慶華</option>
<option value='http://tonyq.org/2016/people.php?n=黃國昌'>新北市：黃國昌</option>
<option value='http://tonyq.org/2016/people.php?n=陳永順'>新北市：陳永順</option>
<option value='http://tonyq.org/2016/people.php?n=黃國書'>臺中市：黃國書</option>
<option value='http://tonyq.org/2016/people.php?n=沈智慧'>臺中市：沈智慧</option>
<option value='http://tonyq.org/2016/people.php?n=賀姿華'>臺中市：賀姿華</option>
<option value='http://tonyq.org/2016/people.php?n=簡孟軒'>臺中市：簡孟軒</option>
<option value='http://tonyq.org/2016/people.php?n=苗豐隆'>臺中市：苗豐隆</option>
<option value='http://tonyq.org/2016/people.php?n=盧秀燕'>臺中市：盧秀燕</option>
<option value='http://tonyq.org/2016/people.php?n=劉國隆'>臺中市：劉國隆</option>
<option value='http://tonyq.org/2016/people.php?n=吳淑慧'>臺中市：吳淑慧</option>
<option value='http://tonyq.org/2016/people.php?n=張廖萬堅'>臺中市：張廖萬堅</option>
<option value='http://tonyq.org/2016/people.php?n=蔡錦隆'>臺中市：蔡錦隆</option>
<option value='http://tonyq.org/2016/people.php?n=葉春幸'>臺中市：葉春幸</option>
<option value='http://tonyq.org/2016/people.php?n=顏惠莉'>臺中市：顏惠莉</option>
<option value='http://tonyq.org/2016/people.php?n=游壽元'>臺中市：游壽元</option>
<option value='http://tonyq.org/2016/people.php?n=王政棋'>臺中市：王政棋</option>
<option value='http://tonyq.org/2016/people.php?n=江啟臣'>臺中市：江啟臣</option>
<option value='http://tonyq.org/2016/people.php?n=謝志忠'>臺中市：謝志忠</option>
<option value='http://tonyq.org/2016/people.php?n=黃金推'>臺中市：黃金推</option>
<option value='http://tonyq.org/2016/people.php?n=王淑芬'>臺中市：王淑芬</option>
<option value='http://tonyq.org/2016/people.php?n=陳軍元'>臺中市：陳軍元</option>
<option value='http://tonyq.org/2016/people.php?n=蔡其昌'>臺中市：蔡其昌</option>
<option value='http://tonyq.org/2016/people.php?n=顏秋月'>臺中市：顏秋月</option>
<option value='http://tonyq.org/2016/people.php?n=陳世凱'>臺中市：陳世凱</option>
<option value='http://tonyq.org/2016/people.php?n=顏寬恒'>臺中市：顏寬恒</option>
<option value='http://tonyq.org/2016/people.php?n=鍾文龍'>臺中市：鍾文龍</option>
<option value='http://tonyq.org/2016/people.php?n=紀國棟'>臺中市：紀國棟</option>
<option value='http://tonyq.org/2016/people.php?n=楊瓊瓔'>臺中市：楊瓊瓔</option>
<option value='http://tonyq.org/2016/people.php?n=黃信吉'>臺中市：黃信吉</option>
<option value='http://tonyq.org/2016/people.php?n=洪慈庸'>臺中市：洪慈庸</option>
<option value='http://tonyq.org/2016/people.php?n=何欣純'>臺中市：何欣純</option>
<option value='http://tonyq.org/2016/people.php?n=賴義鍠'>臺中市：賴義鍠</option>
<option value='http://tonyq.org/2016/people.php?n=石大哉'>臺中市：石大哉</option>
<option value='http://tonyq.org/2016/people.php?n=黃瑞坤'>臺南市：黃瑞坤</option>
<option value='http://tonyq.org/2016/people.php?n=陳柏志'>臺南市：陳柏志</option>
<option value='http://tonyq.org/2016/people.php?n=林德旺'>臺南市：林德旺</option>
<option value='http://tonyq.org/2016/people.php?n=葉宜津'>臺南市：葉宜津</option>
<option value='http://tonyq.org/2016/people.php?n=黃偉哲'>臺南市：黃偉哲</option>
<option value='http://tonyq.org/2016/people.php?n=黃耀盛'>臺南市：黃耀盛</option>
<option value='http://tonyq.org/2016/people.php?n=黃泯甄'>臺南市：黃泯甄</option>
<option value='http://tonyq.org/2016/people.php?n=黃憲清'>臺南市：黃憲清</option>
<option value='http://tonyq.org/2016/people.php?n=王國棟'>臺南市：王國棟</option>
<option value='http://tonyq.org/2016/people.php?n=王定宇'>臺南市：王定宇</option>
<option value='http://tonyq.org/2016/people.php?n=晏揚清'>臺南市：晏揚清</option>
<option value='http://tonyq.org/2016/people.php?n=林易煌'>臺南市：林易煌</option>
<option value='http://tonyq.org/2016/people.php?n=李盈蒔'>臺南市：李盈蒔</option>
<option value='http://tonyq.org/2016/people.php?n=林俊憲'>臺南市：林俊憲</option>
<option value='http://tonyq.org/2016/people.php?n=傅建峰'>臺南市：傅建峰</option>
<option value='http://tonyq.org/2016/people.php?n=陳淑慧'>臺南市：陳淑慧</option>
<option value='http://tonyq.org/2016/people.php?n=陳皇州'>臺南市：陳皇州</option>
<option value='http://tonyq.org/2016/people.php?n=楊智達'>臺南市：楊智達</option>
<option value='http://tonyq.org/2016/people.php?n=蔡郁芝'>臺南市：蔡郁芝</option>
<option value='http://tonyq.org/2016/people.php?n=謝龍介'>臺南市：謝龍介</option>
<option value='http://tonyq.org/2016/people.php?n=鄧秀寶'>臺南市：鄧秀寶</option>
<option value='http://tonyq.org/2016/people.php?n=陳亭妃'>臺南市：陳亭妃</option>
<option value='http://tonyq.org/2016/people.php?n=翁琬甯'>臺南市：翁琬甯</option>
<option value='http://tonyq.org/2016/people.php?n=楊麗環'>桃園市：楊麗環</option>
<option value='http://tonyq.org/2016/people.php?n=鄭寶清'>桃園市：鄭寶清</option>
<option value='http://tonyq.org/2016/people.php?n=鄭運鵬'>桃園市：鄭運鵬</option>
<option value='http://tonyq.org/2016/people.php?n=陳根德'>桃園市：陳根德</option>
<option value='http://tonyq.org/2016/people.php?n=王寶萱'>桃園市：王寶萱</option>
<option value='http://tonyq.org/2016/people.php?n=陳宏瑞'>桃園市：陳宏瑞</option>
<option value='http://tonyq.org/2016/people.php?n=徐景文'>桃園市：徐景文</option>
<option value='http://tonyq.org/2016/people.php?n=賴立竹'>桃園市：賴立竹</option>
<option value='http://tonyq.org/2016/people.php?n=余能生'>桃園市：余能生</option>
<option value='http://tonyq.org/2016/people.php?n=陳學聖'>桃園市：陳學聖</option>
<option value='http://tonyq.org/2016/people.php?n=鄭振源'>桃園市：鄭振源</option>
<option value='http://tonyq.org/2016/people.php?n=趙正宇'>桃園市：趙正宇</option>
<option value='http://tonyq.org/2016/people.php?n=藍大山'>桃園市：藍大山</option>
<option value='http://tonyq.org/2016/people.php?n=孫大千'>桃園市：孫大千</option>
<option value='http://tonyq.org/2016/people.php?n=楊金軒'>桃園市：楊金軒</option>
<option value='http://tonyq.org/2016/people.php?n=呂東杰'>桃園市：呂東杰</option>
<option value='http://tonyq.org/2016/people.php?n=陳佩俞'>桃園市：陳佩俞</option>
<option value='http://tonyq.org/2016/people.php?n=吳振槖'>桃園市：吳振槖</option>
<option value='http://tonyq.org/2016/people.php?n=廖正井'>桃園市：廖正井</option>
<option value='http://tonyq.org/2016/people.php?n=張康儀'>桃園市：張康儀</option>
<option value='http://tonyq.org/2016/people.php?n=陳賴素美'>桃園市：陳賴素美</option>
<option value='http://tonyq.org/2016/people.php?n=黃維春'>桃園市：黃維春</option>
<option value='http://tonyq.org/2016/people.php?n=呂玉玲'>桃園市：呂玉玲</option>
<option value='http://tonyq.org/2016/people.php?n=蕭家亮'>桃園市：蕭家亮</option>
<option value='http://tonyq.org/2016/people.php?n=張誠'>桃園市：張誠</option>
<option value='http://tonyq.org/2016/people.php?n=張肇良'>桃園市：張肇良</option>
<option value='http://tonyq.org/2016/people.php?n=黃志浩'>桃園市：黃志浩</option>
<option value='http://tonyq.org/2016/people.php?n=黃國華'>桃園市：黃國華</option>
</select>

<Br />
<Br />
<p>其他不同類型地圖： 
<a href="http://tonyq.org/2016/party_pk.php?p=信心希望聯盟vs綠黨社會民主黨聯盟" >看兩政黨 PK 地圖</a>
、<a href="http://tonyq.org/2016/party_percent.php?n=信心希望聯盟" >政黨比例地圖</a>
、<a href="http://tonyq.org/2016/party.php?n=信心希望聯盟" >政黨票數地圖</a>
</p>
                <div id="map-canvas" class="col-md-12"></div>
                <div id="detail" class="col-md-12">
                    <h2 id="content" class="text-muted">在地圖上滑動或點選以顯示數據</h2>



<div class="fb-like" data-href="http://tonyq.org/2016/people.php?n=<?=$name?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>


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


var pvote = $.get('https://cdn.rawgit.com/tony1223/crawl2016votes/7d4319e25fad05ed34f3ce28b710855746de88fe/outputs/votes_type_區域立委.json');
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

<?php }else{  ?>

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
        zoom: 12,
        center: {lat: 23.00, lng: 120.30}
    });

    pcunli.then(function(data){

        pvote.then(function(Votes){

            var VoteMap = Votes.filter(function(v){
                return v.姓名 == "<?=$name?>" && v.票數 != 0;
            }).reduce(function(now,v){
                now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] = now[v.縣市+"-"+v.鄉鎮+"-"+v.村里] || [];

                now[v.縣市+"-"+v.鄉鎮+"-"+v.村里].push(v);
                return now;
            },{});


            cunli_data = data;
            cunli = map.data.addGeoJson(topojson.feature(cunli_data, cunli_data.objects.cunli));

            var set = false;
            var areas = [];
            cunli.forEach(function (value) {
                var AreaName = value.getProperty('T_Name'),
                        TownName = value.getProperty('V_Name'),
			CityName = value.getProperty("C_Name"),
                        count = 0;

                var localVotes = VoteMap[CityName+"-"+AreaName+"-" +TownName] || [];
                var count = 0;
                if (localVotes.length) {

                    if(!set){
                        try{
                            var latlng = value.getGeometry().getArray()[0].getArray()[0];
                            map.setCenter(latlng);
                            set = true;
                        }catch(ex){
                            //fail to normal
                        }
                    }   
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


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=218334411502";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    </body>
</html>



