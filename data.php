<?Php
require "config.php"; // Database Connection

// query UEB's Analysts without admin
$sql="SELECT id, fname, lname FROM users WHERE id  IN ( SELECT user_id FROM user_permission_matches WHERE permission_id > 2 ) AND NOT id=1"; 

//query just clients (client=permission=1)
$sql2="SELECT U.id, U.fname, U.lname
FROM users as U
WHERE U.id  NOT IN (
  SELECT P.user_id 
  FROM user_permission_matches AS P
  WHERE P.permission_id != 1
);";

$row=$dbo->prepare($sql);
$row2=$dbo->prepare($sql2);

$row->execute();
$row2->execute();

$result=$row->fetchAll(PDO::FETCH_ASSOC);
$result2=$row2->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(array('analysts'=>$result, 'clients'=>$result2));


?>