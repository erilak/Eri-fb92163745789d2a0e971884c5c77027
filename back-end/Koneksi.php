<?php
/**
 * 
 */
class Koneksi
{
	
	public function conn(){
		try {
		    $dbh = new PDO('mysql:host=localhost;dbname=Eri-fb92163745789d2a0e971884c5c77027', "root", "");
		    /*foreach($dbh->query('SELECT * from FOO') as $row) {
		        print_r($row);
		    }
		    $dbh = null;*/
		    return $dbh;
		} catch (PDOException $e) {
		    return false;
		}

		return false;
	}

	public function select(){
		if ($this->conn()) {
			$query = $this->conn()->prepare("SELECT * FROM users");
	        $query->execute();
	        $data = $query->fetchAll();
	        return $data;
		}
		return null;
	}

	public function insert($userid, $waktu_login, $mac, $browser){
		if ($this->conn()) {
			$data = $this->conn()->prepare('INSERT INTO halaman (users_id,waktu_login,mac,browser) VALUES (?, ?, ?, ?)');
        
	        $data->bindParam(1, $userid);
	        $data->bindParam(2, $waktu_login);
	        $data->bindParam(3, $mac);
	        $data->bindParam(4, $browser);
	 
	        $data->execute();
	        return $data->rowCount();
		}
		return null;
	}

	public function delete($userid, $mac, $browser){
		if ($this->conn()) {
			$query = $this->conn()->prepare("DELETE FROM halaman where users_id=? and mac=? and browser=?");
 
	        $query->bindParam(1, $userid);
	        $query->bindParam(2, $mac);
	        $query->bindParam(3, $browser);
	 
	        $query->execute();
	        return $query->rowCount();
		}
		return null;
	}

	public function getMac(){
		$mac = exec('getmac'); 
  
		// Storing 'getmac' value in $MAC 
		$mac = strtok($mac, ' '); 
		  
		// Updating $MAC value using strtok function,  
		// strtok is used to split the string into tokens 
		// split character of strtok is defined as a space 
		// because getmac returns transport name after 
		// MAC address    
		return $mac;
	}

	public function getBrowser(){
		// echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

		/*$browser = get_browser(null, true);
		return $browser;*/
		return strtolower(str_replace(" ", "", $_SERVER['HTTP_USER_AGENT']));
	}
}



?>
