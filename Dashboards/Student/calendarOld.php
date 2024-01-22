<?php
include_once "connection.php";

if(isset($_POST['func']) && !empty($_POST['func'])){
    switch($_POST['func']){
        case 'getCalender':
            getCalender($_POST['year'],$_POST['month']);
            break;
        case 'getEvents':
            getEvents($_POST['date']);
            break;
        default:
            break;
    }
}

function getCalender($year = '', $month = ''){
    $dateYear = ($year != '')?$year:date("Y");
    $dateMonth = ($month != '')?$month:date("m");
    $date = $dateYear.'-'.$dateMonth.'-01';
    $currentMonthFirstDay = date("N",strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;

    $prevMonth = date("m", strtotime('-1 month', strtotime($date)));
    $prevYear = date("Y", strtotime('-1 month', strtotime($date)));
    $nextMonth = date("m", strtotime('+1 month', strtotime($date)));
    $nextYear = date("Y", strtotime('+1 month', strtotime($date)));
    $currentMonth = date("m",strtotime($date));
    $currentYear = date("Y",strtotime($date));
    $currentDate = date("d",strtotime($date));

    $totalDaysOfMonth_prev = cal_days_in_month(CAL_GREGORIAN,$prevMonth,$dateYear);

    ?>

    <main class="calender_contain">
        <section class="title_bar">
            <a href="javascript:void(0);" class="titleBar_prev" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">

            </a>
            <div class="titleBarMonth">
                <select class="month_dropdown">
                    <?php echo getMonthList($dateMonth);?>
                </select>
            </div>
            <div class="titleBarYear">
                <select class="year_dropdown">
                    <?php echo getYearList($dateYear);?>
                </select>
            </div>
            <a href="javascript:void(0);" class="title-bar__next" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">
                <button class="titleBar_next">
                    <span class="material-symbols-outlined">arrow_right_alt</span>
                </button>
            </a>

        </section>
        <aside class="calender_sidebar" id="event_list">
            <?php echo getEvents(); ?>
        </aside>

        <select class="calender_days">
            <section class="calendar_topBar">
                <span class="topBar_days">Mon</span>
                <span class="topBar_days">Tue</span>
                <span class="topBar_days">Wed</span>
                <span class="topBar_days">Thu</span>
                <span class="topBar_days">Fri</span>
                <span class="topBar_days">Sat</span>
                <span class="topBar_days">Sun</span>
            </section>
            <?php
                $dayCount = 1;
                $eventNum = 0;

                echo '<section class="calendar_week">';
                for($cb=1;$cb<=$boxDisplay;$cb++){
                    if(($cb >= $currentMonthFirstDay ||$currentMonthFirstDay == 1) && $cb <=($totalDaysOfMonthDisplay)){

                        //current date
                        $currentDate =$dateYear. '-' .$dateMonth. '-'.$dayCount;

                        // getting the number of events based on the current day
                        global $conn;
                        $result = $conn->query("SELECT title FROM events WHERE date ='".$currentDate."' AND status =1");

                        $eventNum = $result->num_rows;

                        // Define date cell
                        if(strtotime($currentDate) == strtotime($date("Y-m-d"))){
                            echo'
                                <div class="calendar_day today" onclick="getEvents(\''.$currentDate.'\');">
                                    <span class="calendar_date">'.$dayCount.'</span>
                                    <span class="calendar_task calendar_task-today">'.$eventNum.' Events</span>
                                </div>';
                        }elseif($eventNum>0){
                            echo'
                                <div class="calendar_day event" onclick="getEvents(\''.$currentDate.'\');">
                                    <span class="calendar_date">'.$dayCount.'</span>
                                    <span class="calendar_task">'.$eventNum.' Events</span>
                                </div>';
                        }else{
                            echo'
                                <div class="calendar_day noEvent" onclick="getEvents(\''.$currentDate.'\');">
                                    <span class="calendar_date">'.$dayCount.'</span>
                                    <span class="calendar_task"></span>
                                </div>';
                        }
                        $dayCount++;
                    }else{
                        if($cb < $currentMonthFirstDay){
                            $inactiveDate = (($totalDaysOfMonth_prev - $currentMonthFirstDay)+1)+$cb;
                            $inactiveLabel = 'expired';
                        }else{
                            $inactiveDate = $cb - $totalDaysOfMonthDisplay;
                            $inactiveLabel = 'upcoming';
                        }
                        echo '
                            <div class="calendar_day inactive">
                                <span class="calendar_date">'.$inactiveDate.'</span>
                                <span class="calendar_task">'.$inactiveLabel.'</span>
                            </div>';


                    }
                    echo ($cb%7 == 0 && $cb != $boxDisplay)?'</section><section class="calendar_week">':'';

                }
                echo '</section>';
            ?>
            }

            ?>
        </select>
    </main>
    <script>
        function getCalendar(target_div,year,month){
            $.ajax({
                type:'POST',
                url:'calendar.php',
                data:'func=getCalender&year='+year+'&month='+month,
                success:function(html){
                    $('#'+target_div).html(html);
                }
            });
        }

        function getEvents(date){
            $.ajax({
                type:'POST',
                url:'calendar.php',
                data:'func=getEvents&date='+date,
                success:function(html){
                    $('#event_list').html(html);
                }
            });
        }

        $(document).ready(function(){
            $('.month_dropdown').on('change',function(){
                getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
            });
            $('.year_dropdown').on('change',function(){
                getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
            });
        });
    </script>
    <?php
}

function getMonthList($selected = ''){
    $options = '';
    for($i=1;$i<=12;$i++){
        $value = ($i < 10)?'0'.$i:$i;
        $selectedOpt = ($value == $selected)?'selected':'';
        $options .= '<option value="'.$value.'"'.$selectedOpt.'>'.date('F',strtotime('2019-'.$value.'-1')).'</option>';
    }
    return $options;
}

function getYearList($selected = ''){
    $options = '';
    for($i=2019;$i<=2025;$i++){
        $selectedOpt = ($i == $selected)?'selected':'';
        $options .= '<option value="'.$i.'"'.$selectedOpt.'>'.$i.'</option>';
    }
    return $options;
}

function getEvents($date = ''): void
{
    $eventListHTML = '';
    $currentDate = ($date != '')?$date:date("Y-m-d");
    // getting the number of events based on the current day
    global $conn;
    $result = $conn->query("SELECT title FROM events WHERE date ='".$currentDate."' AND status =1");
    if($result->num_rows > 0){
        $eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($currentDate)).'</h2>';
        $eventListHTML .= '<ul>';
        while($row = $result->fetch_assoc()){
            $eventListHTML .= '<li>'.$row['title'].'</li>';
        }
        $eventListHTML .= '</ul>';
    }
    echo $eventListHTML;
}
?>


