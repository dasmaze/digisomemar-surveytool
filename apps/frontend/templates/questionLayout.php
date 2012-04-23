<h2><?php echo $question->title ?></h2>
<?php 
if($question->multiple) {
    echo "<select multiple=\"multiple\">";
} else {
    echo "<select>";
} 

for($i = 0; $i < length($question->answers); $i++) {
    echo "<option>" . $question->answers[$i]->title . "</option>";
}

echo "</select>";
?>

