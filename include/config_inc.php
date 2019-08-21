<?php
  include "lib_inc.php";
  class config
  {
    var $server,
        $host,
        $user,
        $password,
        $database,
		$query;

    function config()
    {
      $this->host = $GLOBALS["db_hostname"];
      $this->user = $GLOBALS["db_NIP"];
      $this->password = $GLOBALS["db_password"];
      $this->database = $GLOBALS["db_name"];
      $this->open_db();
    }

    function open_db()
    {
      $this->server = @mysql_pconnect($this->host, $this->user, $this->password) or die("Can't connect to database");
      @mysql_select_db($this->database, $this->server);
    }

    function query($sqlQuery, $debug = 0)
    {
      $this->query = $sqlQuery;
      $this->open_db();

      $result = @mysql_query($sqlQuery, $this->server);
	  
      if( ($sqlQuery[0] == 'i') || ($sqlQuery[0] == 'I') )
        return mysql_insert_id();

      if( ($sqlQuery[0] == 'u') || ($sqlQuery[0] == 'U') )
        return mysql_affected_rows();
		
      while( $row = @mysql_fetch_array($result) )
        $data[] = $row;
		
      mysql_close($this->server);
      return $data;
    }

    function queryItem($sqlQuery, $debug = 0)
    {
      $result = $this->query($sqlQuery." LIMIT 0,1", $debug);
      return $result[0][0];
    }
	
	function debug(){
		echo $this->query;
	}
	
  }
  
  function db_isnull($data,$def=""){
	if (trim($data)!="") return sprintf("'%s'",$data);
	else if (trim($def)!="") return sprintf("'%s'",$def);
	else return "null";
  } 
?>