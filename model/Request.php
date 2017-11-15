<?php

require_once  __DIR__.'/../seeds/db/connectionDB.php';
class Request {
	private $table  = 'requests';

	public function getAllRequest() {
		try {
			$connect = new connectionDB();
			$q = "SELECT * FROM $this->table";
            $res = $connect->conn->query($q)->fetch_all(MYSQLI_ASSOC);
            $connect->close();
			return $res;
		} catch (Exception $e) {
            $connect->close();
			throw $e;
		}
	}

	public function getRequest($id) {
        try {
            $connect = new connectionDB();
            $sql = "SELECT * FROM $this->table where id = $id";
            $request = $connect->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
            $connect->close();
            return $request[0];
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
	}

	public function createRequest($user_id, $vacation_request) {
        try {
            $connect = new connectionDB();
            $sql = "INSERT INTO $this->table (user_id, vacation_request) VALUES('$user_id',$vacation_request);";
            $request = $connect->conn->query($sql);
            $connect->close();
            return $request;
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
	}

    public function updateRequest($user_id, $vacation_request, $approved, $id) {
        try {
            $connect = new connectionDB();
            $sql = "UPDATE $this->table SET user_id='$user_id', vacation_request='$vacation_request', approved='$approved'  where id = $id";
            $request = $connect->conn->query($sql);
            $connect->close();
            return $request;
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
    }

	public function deleteRequest($id) {
        try {
            $connect = new connectionDB();
            $q = "DELETE FROM $this->table WHERE id = $id";
            $connect->conn->query($q);
            $connect->close();
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
	}
}