<?php
include('getmessages_lang.php');
?>
<button style="float: <?php if($lang == "ar"){echo 'left';}else{echo 'right';} ?>;" onclick="sendnewmessage()" class="ui button inverted labeled icon left green"><i class="send icon"></i> <?php echo $sendnewmessage; ?></button>
<br><br>
<table class='ui table striped celled'>
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo $th_1; ?></th>
            <th><?php echo $th_2; ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
include('../db.php');

$id=$_COOKIE['id'];
$sql = "SELECT * FROM messages WHERE to_user_id='$id' AND to_type='students'";
$i = 1;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$sqls = "SELECT * FROM $row[from_type] WHERE id='$row[from_user_id]'";
$results = $conn->query($sqls);   
if ($results->num_rows > 0) {
while($rows = $results->fetch_assoc()) {

      echo "<tr><td>";
      echo $i;$i++;
      echo "</td><td>$row[message]</td><td>$rows[name] $rows[fn]</td>";
      echo "<td>";
      if("$row[vu]" == ""){
      echo "<button class='ui button inverted labeled icon left blue' onclick=".'"vumessage('."'$row[id]'".')"'."><i class='eye icon'></i> $vu_btn_text</button>";
      }else{
      echo $msgvu;
      }
      echo "</td></tr>";

}}else{
    echo "<tr><td colspan='4'>No user found..</td></tr>";
}
  }}else{
      echo "<tr><td colspan='4'>No messages found..</td></tr>";
  }
$conn->close();
?>
</tbody>
</table>