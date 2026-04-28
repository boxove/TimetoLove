<?php
// ==================== 首页配置区：常改内容都在这里 ====================
$site = [
    'title' => '时光予你',
    'keywords' => '时光予你，个人主页，爱情纪念，家庭纪念',
    'description' => '向日葵在没有太阳的晚上，还有谁向它伸出手。',
    'avatar' => './img/ico.png',
    'nickname' => '时光予你',
    'slogan' => '“你惊艳了我的时光，也温柔了我的岁月”',
    'location' => '中国·河南',
    'quote' => '最能让人感到快乐的事，莫过于经过一番努力后，所有东西正慢慢变成你想要的样子！',
    'quote_author' => 'Fan',
    'icp' => 'XICP备XXXX号',
    'icp_url' => 'https://beian.miit.gov.cn/',
];

$navLinks = [
    ['text' => '爱情记事', 'url' => './love.php'],
];

$qrCodes = [
    'AliPay' => './img/alipay.png',
    'WeChat' => './img/wechat.png',
    'QQ' => './img/qq.png',
];

$music = [
    'title' => '喜欢你',
    'author' => 'G.E.M.',
    'url' => 'https://s3plus.meituan.net/v1/mss_550586ef375b493da4aa79bebdfce4fa/csc-apply-file-web/prod/2024-10-18/727a573e-b632-4cb3-b1b6-4bc9f533be6c.mp3',
    'pic' => './img/tm.png',
    'lyrics' => <<<'LRC'
[ti:喜欢你]
[ar:G.E.M. 邓紫棋]
[al:喜欢你]
[00:00.00]喜欢你 - G.E.M. 邓紫棋
[00:03.00]作词：黄家驹 
[00:06.00]作曲：黄家驹 
[00:10.00]演唱：邓紫棋 
[00:12.30]细雨带风湿透黄昏的街道
[00:18.47]抹去雨水双眼无故地仰望
[00:23.99]望向孤单的晚灯
[00:27.35]是那伤感的记忆
[00:33.53]再次泛起心里无数的思念 
[00:39.58]以往片刻欢笑仍挂在脸上 
[00:45.33]愿你此刻可会知 
[00:48.77]是我衷心的说声
[00:53.78]喜欢你 那双眼动人 
[00:59.52]笑声更迷人 
[01:03.11]愿再可 轻抚你 
[01:09.15]那可爱面容 
[01:12.24]挽手说梦话 
[01:15.36]像昨天 你共我 
[01:26.04]满带理想的我曾经多冲动 
[01:32.27]屡怨与她相爱难有自由 
[01:37.72]愿你此刻可会知 
[01:41.12]是我衷心的说声 
[01:46.21]喜欢你 那双眼动人 
[01:52.26]笑声更迷人 
[01:55.31]愿再可 轻抚你 
[02:01.41]那可爱面容 
[02:04.50]挽手说梦话 
[02:07.60]像昨天 你共我 
[02:25.52]每晚夜里自我独行 
[02:29.31]随处荡 多冰冷 
[02:37.79]以往为了自我挣扎 
[02:41.60]从不知 她的痛苦 
[02:53.96]喜欢你 那双眼动人 
[02:59.92]笑声更迷人 
[03:03.02]愿再可 轻抚你 
[03:08.93]那可爱面容 
[03:12.23]挽手说梦话 
[03:14.29]像昨天 你共我
LRC,
];

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1,user-scalable=no">
    <title><?php echo e($site['title']); ?></title>
    <meta name="keywords" content="<?php echo e($site['keywords']); ?>">
    <meta name="description" itemprop="description" content="<?php echo e($site['description']); ?>" />
    <link rel="shortcut icon" href="<?php echo e($site['avatar']); ?>">
    <link rel="stylesheet" href="./css/style.css" media="screen" type="text/css">
</head>

<body>
    <div class="wrapper">
        <div class="main">
            <div class="container">
                <div class="intro">
                    <div class="user-warp img">
                        <img src="<?php echo e($site['avatar']); ?>" alt="<?php echo e($site['nickname']); ?>">
                    </div>
                    <div class="nickname"><?php echo e($site['nickname']); ?></div>
                    <div class="description">
                        <p><?php echo e($site['slogan']); ?></p>
                    </div>
                    <div class="zuobiao">
                        <i class="ico_map"></i>
                        <span><?php echo e($site['location']); ?></span>
                        <span style="margin-left: 10px;">
                            <input id="switch_default" type="checkbox" class="switch_default">
                            <label for="switch_default" class="toggleBtn"></label>
                        </span>
                    </div>
                    <div class="menu navbar-right links">
                        <?php foreach ($navLinks as $index => $link): ?>
                            <a href="<?php echo e($link['url']); ?>" target="<?php echo strpos($link['url'], 'http') === 0 ? '_blank' : '_self'; ?>"><?php echo e($link['text']); ?></a><?php echo $index < count($navLinks) - 1 ? '·' : ''; ?>
                        <?php endforeach; ?>
                        <center>
                            <div id="header"></div>
                            <div id="main">
                                <div class="demo">
                                    <div id="player3" class="aplayer">
                                        <pre class="aplayer-lrc-content"><?php echo e($music['lyrics']); ?></pre>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div style=" line-height: 20px;font-size: 9pt;">
                        <p><?php echo e($site['quote']); ?></p>
                        <p style="margin-left: 8rem;font-size: 8pt;"><small>——<?php echo e($site['quote_author']); ?></small></p>
                    </div>
                    <br>
                    <center>
                        <ul id="donateBox" class="list pos-f tr3">
                            <?php foreach ($qrCodes as $name => $url): ?>
                                <li id="<?php echo e($name); ?>"><?php echo e($name); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div id="QRBox" class="pos-f left-100">
                            <div id="MainBox"></div>
                        </div>Copyright © <?php echo date('Y'); ?></br>
    ICP：<a href="<?php echo e($site['icp_url']); ?>" target="_blank"><?php echo e($site['icp']); ?></a>
                    </center>
                </div>
            </div>
        </div>
        <footer id="footer" class="footer">
            <div class="stars">
                <?php for ($i = 0; $i < 50; $i++): ?>
                    <div class="star"></div>
                <?php endfor; ?>
            </div>
        </footer>
    </div>
</body>
<script src="./css/js/jquery.min.js"></script>
<script src="./css/js/clipboard.min.js"></script>
<script src="./css/js/APlayer.js"></script>
<script>
$(function(){
    var QRBox = $('#QRBox');
    var MainBox = $('#MainBox');
    var qrCodes = <?php echo json_encode($qrCodes, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;

    function showQR(QR) {
        if (QR) {
            MainBox.css('background-image', 'url(' + QR + ')');
        }
        $('#DonateText,#donateBox,#github').addClass('blur');
        QRBox.fadeIn(300, function (argument) {
            MainBox.addClass('showQR');
        });
    }

    $('#donateBox>li').click(function (event) {
        showQR(qrCodes[$(this).attr('id')]);
    });

    MainBox.click(function (event) {
        MainBox.removeClass('showQR').addClass('hideQR');
        setTimeout(function (a) {
            QRBox.fadeOut(300, function (argument) {
                MainBox.removeClass('hideQR');
            });
            $('#DonateText,#donateBox,#github').removeClass('blur');
        }, 600);
    });

    let ap3 = new APlayer({
        element: document.getElementById('player3'),
        narrow: false,
        autoplay: false,
        showlrc: true,
        preload: 'auto',
        music: <?php echo json_encode([
            'title' => $music['title'],
            'author' => $music['author'],
            'url' => $music['url'],
            'pic' => $music['pic'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
    });
    ap3.init();
    
    let _Blog = window._Blog || {};
    const currentTheme = window.localStorage && window.localStorage.getItem('theme');
    const isDark = currentTheme === 'dark';
    if (isDark) {
        document.getElementById("switch_default").checked = true;
    } else {
        document.getElementById("switch_default").checked = false;
    }
    _Blog.toggleTheme = function () {
        if (isDark) {
            document.getElementsByTagName('body')[0].classList.add('dark-theme');
        } else {
            document.getElementsByTagName('body')[0].classList.remove('dark-theme');
        }
        document.getElementsByClassName('toggleBtn')[0].addEventListener('click', () => {
            if (document.getElementsByTagName('body')[0].classList.contains('dark-theme')) {
                document.getElementsByTagName('body')[0].classList.remove('dark-theme');
            } else {
                document.getElementsByTagName('body')[0].classList.add('dark-theme');
            }
            window.localStorage && window.localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light',)
        })
    };
    _Blog.toggleTheme();
})
</script>
</html>
