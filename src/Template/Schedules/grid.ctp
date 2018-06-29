<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
var_dump($schedules);
?>
<style>
        div.schedule-grid {
            min-width: 900px;
        }
        table, tr, td {
            
            border-spacing:0;
            padding:0;
            margin:0;
        }
        table.time-grid {
            table-layout: fixed;
            display:table;
            min-width:100%;
            border-bottom: solid 2px black;
        }
        tr.hour td {
            width:100%;
            background-color: #FFc233;
            border-top: solid 2px black;
            height: 30px;
            border-right: solid 2px black;
        }
        tr.half-hour td {
            width:100%;
            background-color: #FCDDA9;
            border-top: solid 1px gray;
            height: 30px;
            border-right: solid 2px black;
        }
        tr td.time {
            text-align:center;
            background-color:white;
            max-width:80px;
            border-right: solid 1px gray;
            border-left: solid 2px black;
        }
    </style>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Conferences'), ['controller' => 'Conferences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Location Room Names'), ['controller' => 'LocationRoomNames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Speakers'), ['controller' => 'Speakers', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">

    <div class="schedule-grid">
        <table class="time-grid">
            <th></th>
<?php
    $numRooms = 0;
    $rooms = array();
    foreach($locationRoomNames as $room) {
?>
            <th><?= $room->room_name; ?></th>
<?php
        $rooms[$numRooms] = $room->id;
        $numRooms++;
    }
?>
<?php
    for ($i=0; $i < 24; $i++) {
        $time_hour=date('g:i a', mktime($i,0,0));
        $time_half = date('g:i a', mktime($i,30,0));
?>
            <tr class="hour">
                <td class="time"><?= $time_hour;?></td>
<?php
        for($j=0; $j < count($rooms); $j++) {
            $id_value = str_pad($i,2,"0",STR_PAD_LEFT)."00-".$rooms[$j];
?>
                <td id='<?= $id_value; ?>' onClick="setSchedule('<?= $id_value; ?>')"><?= $id_value; ?></td>
<?php
        }
?>
            </tr>
            <tr class="half-hour">
                 <td class="time"><?= $time_half;?></td>
<?php
        for($j=0; $j < count($rooms); $j++) {
                $id_value = str_pad($i,2,"0",STR_PAD_LEFT)."30-".$rooms[$j];
?>
                <td id='<?= $id_value; ?>' onClick="setSchedule('<?= $id_value; ?>')"></td>
<?php
        }
?>
            </tr>
<?php
    }
?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $('document').ready(function() {
            var schedules = <?= json_encode($schedules); ?>;
            var datetime, id;
            for(var i = 0; i < schedules.length; i++){

                datetime = schedules[i]['start_date_time'].split(/[- :T+]/);
                id = "#" + datetime[3] + datetime[4] + "-" + schedules[i]['room_id'];
console.log(id);
                $(id).html(schedules[i]['title']);
            }
        });
        function setSchedule(timeroom) {
console.log(timeroom);
            time = timeroom.substring(0, timeroom.indexOf("-"));
            room = timeroom.substr(timeroom.lastIndexOf("-") + 1);
            alert(time + "-" + room);
        }
    </script>
</div>
