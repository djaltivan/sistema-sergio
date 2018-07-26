 <?php
ini_set( 'display_errors', false );
error_reporting( 0 );
include('conectar.php');

   $login_cookie = $_COOKIE['login'];
	$local_cookie = $_COOKIE['local'];
	mysql_query("insert into log (datahora, user, log1, log2, tipo, local)values(now(),'".$login_cookie."',' ',' ','Gerou Backup','".$local."')");

 backup_database_tables('dbgestao.mysql.uhserver.com','felix','A4.b5@','dbgestao', '*');

// backup the db function
 function backup_database_tables($host,$user,$pass,$name,$tables)
 {

$link = mysql_connect($host,$user,$pass);
 mysql_select_db($name,$link);

//get all of the tables
 if($tables == '*')
 {
 $tables = array();
 $result = mysql_query('SHOW TABLES');
 while($row = mysql_fetch_row($result))
 {
 $tables[] = $row[0];
 }
 }
 else
 {
 $tables = is_array($tables) ? $tables : explode(',',$tables);
 }

//cycle through each table and format the data
 foreach($tables as $table)
 {
 $result = mysql_query('SELECT * FROM '.$table);
 $num_fields = mysql_num_fields($result);

$return.= 'DROP TABLE '.$table.';';
 $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
 $return.= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
 {
 while($row = mysql_fetch_row($result))
 {
 $return.= 'INSERT INTO '.$table.' VALUES(';
 for($j=0; $j<$num_fields; $j++)
 {
 $row[$j] = addslashes($row[$j]);
 $row[$j] = ereg_replace("\n","\\n",$row[$j]);
 if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
 if ($j<($num_fields-1)) { $return.= ','; }
 }
 $return.= ");\n";
 }
 }
 $return.="\n\n\n";
 }

//save the file
 $handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
 fwrite($handle,$return);
 fclose($handle);
 }
 ?>
 Backup efetuado com sucesso!
 <br><br>
 <?php
	$pasta = 'backup/';
	$arquivos = glob("$pasta{*.sql}", GLOB_BRACE);
	foreach($arquivos as $img){
	   echo $img . "<br />";
	}
?>
 <META http-equiv="refresh" content="3;URL=../config.php">