<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<style>
        div.schedule-grid {
            width: 800px;
        }
        table, tr, td {
            border-spacing:0;
            padding:0;
            margin:0;
        }
        table.time-grid {
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
            background-color:white;
            width:80px;
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
            echo $numRooms;
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
?>
                <td onClick="setSchedule('<?= $i."00-".$rooms[$j]; ?>')"></td>
<?php
        }
?>
            </tr>
            <tr class="half-hour">
                <td class="time"><?= $time_half; ?></td>
<?php
        for($j=0; $j < count($rooms); $j++) {
?>
                <td onClick="setSchedule('<?= $i."30-".$rooms[$j]; ?>')"></td>
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
        function setSchedule($timeroom) {
console.log($timeroom);
            $time = $timeroom.substring(0, $timeroom.indexOf("-"));
            $room = $timeroom.substr($timeroom.length - $timeroom.indexOf("-"));
            alert($time + "-" + $room);
        }
    </script>
</div>
