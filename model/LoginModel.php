

<?php
class LoginModel extends Model

{
function getUser($userName)
  {
  $sentencia = $this->db->prepare("select * from usuario where usuario = ? limit 1");
  $sentencia->execute([$userName]);
  return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
