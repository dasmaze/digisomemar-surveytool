<td> <?php echo $answer->getText() ?> </td>
<td> <?php echo $answer->getClickCount() ?> </td>
<?php $percent = ($answer->getClickCount() == 0) ? 0 : $answer->getClickCount()/$votes * 100 ?>
<td> <?php echo round($percent, 2) ?>&nbsp;%</td>
<td> <div style="background-color: red; height: 5px; width: <?php echo $percent ?>px"> </td>
