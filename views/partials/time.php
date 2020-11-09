<?php
function formatDateAgo($value)
 {
 $time = strtotime($value);
 $d = new \DateTime($value);

 $weekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
 $months = ['January','Febuary','March','April','May','June','July','August','September','October','November','December'];
 if ($time > strtotime('-2 minutes'))
 {
     return 'A few seconds ago';
 }
 elseif ($time > strtotime('-30 minutes'))
 {
     return 'Today '. floor((strtotime('now') - $time)/60) .'&nbsp;minutes ago';
 }
 elseif ($time > strtotime('today'))
 {
     return $d->format('G:i');
 }
 elseif ($time > strtotime('yesterday'))
 {
     return 'Yesterday, ' . $d->format('G:i');
 }
 elseif ($time > strtotime('this week'))
 {
     return $weekDays[$d->format('N') - 1] . ', ' . $d->format('G:i');
 }
 else
 {
     return $d->format('j') . ' ' . $months[$d->format('n') - 1] . ', ' . $d->format('G:i');
 }
}
