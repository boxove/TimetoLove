<?php
// ==================== 爱情记事配置区：常改内容都在这里 ====================
$site = [
    'title' => '时光予你',
    'keywords' => '爱情纪念日,生日倒计时,情侣主页',
    'description' => '记录 Fan 和 Qing 相爱的美好回忆。',
    'favicon' => './img/ico.png',
    'logo' => 'F&Q',
    'intro' => '这里记录了 %s 和 %s 相爱的 <a href="./love100.php">100件事</a><br>相信我们还会留下更多美好的回忆',
];

$people = [
    'Fan' => ['name' => 'Fan', 'lunarYear' => 2001, 'lunarMonth' => 3, 'lunarDay' => 30, 'image' => './img/Fan.png'],
    'Qing' => ['name' => 'Qing', 'lunarYear' => 2002, 'lunarMonth' => 10, 'lunarDay' => 22, 'image' => './img/Qing.png'],
];

$anniversary = ['lunarYear' => 2025, 'lunarMonth' => 10, 'lunarDay' => 18, 'image' => './img/ZhouNian.png'];

$pastEvents = [
    ['title' => '一次初见，一见钟情', 'date' => '2025-10-18', 'image' => './img/chujian.png'],
    ['title' => '圆满礼成，未来可期', 'date' => '2026-09-12', 'image' => './img/licheng.png'],
];

$mainPeople = array_slice($people, 0, 2);
$mainPeopleNames = array_values(array_map(function ($person) {
    return $person['name'];
}, $mainPeople));

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$pageData = [
    'people' => $people,
    'anniversary' => $anniversary,
    'pastEvents' => $pastEvents,
];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo e($site['title']); ?></title>
    <meta name="keywords" content="<?php echo e($site['keywords']); ?>">
    <meta name="description" content="<?php echo e($site['description']); ?>">
    <link rel="shortcut icon" href="<?php echo e($site['favicon']); ?>">
    <link rel="stylesheet" href="./css/love.css">
</head>
<body class="love-page">
    <div class="container grid-sm s-content header love-hero">
        <div class="column col-12">
            <div class="hero-card">
                <div class="hero-copy">
                    <p class="eyebrow">Time to Love</p>
                    <h1 class="logo">
                        <i class="ico i-love"></i>
                        <a href="./love.php"><?php echo e($site['logo']); ?></a>
                    </h1>
                    <p class="description">
                        <?php echo sprintf($site['intro'], '<a href="#">' . e($mainPeopleNames[0] ?? '') . '</a>', '<a href="#">' . e($mainPeopleNames[1] ?? '') . '</a>'); ?>
                    </p>
                </div>
                <div class="hero-progress">
                    <span class="progress-number">F&Q</span>
                    <span class="progress-label">一起认真生活</span>
                    <div class="progress-track">
                        <span style="width: 100%;"></span>
                    </div>
                </div>
                <div class="hero-stats" aria-label="爱情纪念统计">
                    <span><strong><?php echo count($people); ?></strong> 个生日</span>
                    <span><strong>1</strong> 个周年</span>
                    <span><strong><?php echo count($pastEvents); ?></strong> 段回忆</span>
                </div>
            </div>
        </div>
    </div>

    <main class="container grid-sm s-content">
        <div class="column col-12">
            <div class="section-head">
                <p>重要时刻</p>
                <span>把值得期待的日子放在眼前</span>
            </div>
            <div class="links">
                <ul>
                    <?php foreach ($people as $key => $person): ?>
                    <li>
                        <a>
                            <img src="<?php echo e($person['image']); ?>" alt="<?php echo e($person['name']); ?>">
                            <h4 id="<?php echo e($key); ?>Title"><?php echo e($person['name']); ?>的生日</h4>
                            <p id="<?php echo $key; ?>Countdown"></p>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <li>
                        <a>
                            <img src="<?php echo e($anniversary['image']); ?>" alt="周年纪念日">
                            <h4 id="anniversaryTitle">周年纪念日</h4>
                            <p id="anniversaryCountdown"></p>
                        </a>
                    </li>
                    <?php foreach ($pastEvents as $index => $event): ?>
                    <li>
                        <a>
                            <img src="<?php echo e($event['image']); ?>" alt="<?php echo e($event['title']); ?>">
                            <h4><?php echo e($event['title']); ?></h4>
                            <p id="pastEvent<?php echo $index; ?>"></p>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

    <div class="container grid-sm s-content footer">
        <div class="column col-12">
            <p>Copyright © <?php echo date('Y'); ?><a class="top" href="#">返回顶部</a></p>
        </div>
    </div>

    <script>
    const LOVE_DATA = <?php echo json_encode($pageData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

    const lunarTool = (() => {
        const lunarInfo = [0x04bd8,0x04ae0,0x0a570,0x054d5,0x0d260,0x0d950,0x16554,0x056a0,0x09ad0,0x055d2,0x04ae0,0x0a5b6,0x0a4d0,0x0d250,0x1d255,0x0b540,0x0d6a0,0x0ada2,0x095b0,0x14977,0x04970,0x0a4b0,0x0b4b5,0x06a50,0x06d40,0x1ab54,0x02b60,0x09570,0x052f2,0x04970,0x06566,0x0d4a0,0x0ea50,0x06e95,0x05ad0,0x02b60,0x186e3,0x092e0,0x1c8d7,0x0c950,0x0d4a0,0x1d8a6,0x0b550,0x056a0,0x1a5b4,0x025d0,0x092d0,0x0d2b2,0x0a950,0x0b557,0x06ca0,0x0b550,0x15355,0x04da0,0x0a5d0,0x14573,0x052d0,0x0a9a8,0x0e950,0x06aa0,0x0aea6,0x0ab50,0x04b60,0x0aae4,0x0a570,0x05260,0x0f263,0x0d950,0x05b57,0x056a0,0x096d0,0x04dd5,0x04ad0,0x0a4d0,0x0d4d4,0x0d250,0x0d558,0x0b540,0x0b5a0,0x195a6,0x095b0,0x049b0,0x0a974,0x0a4b0,0x0b27a,0x06a50,0x06d40,0x0af46,0x0ab60,0x09570,0x04af5,0x04970,0x064b0,0x074a3,0x0ea50,0x06b58,0x055c0,0x0ab60,0x096d5,0x092e0,0x0c960,0x0d954,0x0d4a0,0x0da50,0x07552,0x056a0,0x0abb7,0x025d0,0x092d0,0x0cab5,0x0a950,0x0b4a0,0x0baa4,0x0ad50,0x055d9,0x04ba0,0x0a5b0,0x15176,0x052b0,0x0a930,0x07954,0x06aa0,0x0ad50,0x05b52,0x04b60,0x0a6e6,0x0a4e0,0x0d260,0x0ea65,0x0d530,0x05aa0,0x076a3,0x096d0,0x04bd7,0x04ad0,0x0a4d0,0x1d0b6,0x0d250,0x0d520,0x0dd45,0x0b5a0,0x056d0,0x055b2,0x049b0,0x0a577,0x0a4b0,0x0aa50,0x1b255,0x06d20,0x0ada0];
        const baseDate = new Date(1900, 0, 31);

        function leapMonth(year) {
            return lunarInfo[year - 1900] & 0xf;
        }

        function leapDays(year) {
            return leapMonth(year) ? ((lunarInfo[year - 1900] & 0x10000) ? 30 : 29) : 0;
        }

        function monthDays(year, month) {
            return (lunarInfo[year - 1900] & (0x10000 >> month)) ? 30 : 29;
        }

        function lunarYearDays(year) {
            let sum = 348;
            for (let i = 0x8000; i > 0x8; i >>= 1) {
                sum += (lunarInfo[year - 1900] & i) ? 1 : 0;
            }
            return sum + leapDays(year);
        }

        function lunarToSolar(year, month, day) {
            let offset = 0;
            for (let i = 1900; i < year; i++) {
                offset += lunarYearDays(i);
            }

            const leap = leapMonth(year);
            let includedLeap = false;
            for (let i = 1; i < month; i++) {
                if (leap > 0 && i === leap + 1 && !includedLeap) {
                    offset += leapDays(year);
                    includedLeap = true;
                    i--;
                } else {
                    offset += monthDays(year, i);
                }
            }
            if (leap > 0 && month > leap && !includedLeap) {
                offset += leapDays(year);
            }
            offset += day - 1;
            return new Date(baseDate.getTime() + offset * 86400000);
        }

        function nextSolarDate(month, day) {
            const today = toNaturalDate(new Date());
            let target = toNaturalDate(lunarToSolar(today.getFullYear(), month, day));
            if (target < today) {
                target = toNaturalDate(lunarToSolar(today.getFullYear() + 1, month, day));
            }
            return target;
        }

        return { lunarToSolar, nextSolarDate };
    })();

    function toNaturalDate(date) {
        return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }

    function naturalDaysUntil(targetDate) {
        return Math.round((toNaturalDate(targetDate) - toNaturalDate(new Date())) / 86400000);
    }

    function calcBirthday(person) {
        const target = lunarTool.nextSolarDate(person.lunarMonth, person.lunarDay);
        return {
            age: target.getFullYear() - person.lunarYear,
            days: naturalDaysUntil(target),
        };
    }

    function calcAnniversary(item) {
        const today = toNaturalDate(new Date());
        const year = today.getFullYear();
        let target = toNaturalDate(lunarTool.lunarToSolar(year, item.lunarMonth, item.lunarDay));
        let years = year - item.lunarYear;

        if (target < today) {
            target = toNaturalDate(lunarTool.lunarToSolar(year + 1, item.lunarMonth, item.lunarDay));
            years += 1;
        }

        return { years, days: naturalDaysUntil(target) };
    }

    function calcPast(dateString) {
        const start = toNaturalDate(new Date(`${dateString}T00:00:00`));
        const days = Math.floor((toNaturalDate(new Date()) - start) / 86400000);
        const years = Math.floor(days / 365.25);
        const restDays = Math.round(days - years * 365.25);
        return `${years}年${restDays}天`;
    }

    function countdownText(days) {
        return days <= 0 ? '今天' : `还有 ${days} 天`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        Object.entries(LOVE_DATA.people).forEach(([key, person]) => {
            const titleEl = document.getElementById(`${key}Title`);
            const countdownEl = document.getElementById(`${key}Countdown`);
            if (!titleEl || !countdownEl) {
                return;
            }
            const result = calcBirthday(person);
            titleEl.innerText = `${person.name}的${result.age}岁生日`;
            countdownEl.innerText = countdownText(result.days);
        });

        const anniversary = calcAnniversary(LOVE_DATA.anniversary);
        document.getElementById('anniversaryTitle').innerText = `${anniversary.years}周年纪念日`;
        document.getElementById('anniversaryCountdown').innerText = countdownText(anniversary.days);

        LOVE_DATA.pastEvents.forEach((event, index) => {
            document.getElementById(`pastEvent${index}`).innerText = `已经 ${calcPast(event.date)}`;
        });
    });
    </script>
</body>
</html>
