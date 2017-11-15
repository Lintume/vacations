<?php

require_once __DIR__ . '/../db/connectionDB.php';

class User {
	private $table  = 'users';

	public function getAllUsers() {
		try {
			$connect = new connectionDB();
            $q = "SELECT users.id, users.name, users.vacation_limit, 
sum(CASE WHEN requests.approved = 1 THEN requests.vacation_request ELSE 0 END) as used_limit, 
(users.vacation_limit - (sum(CASE WHEN requests.approved = 1 THEN requests.vacation_request ELSE 0 END))) as days_left
                    FROM $this->table 
                    LEFT JOIN requests on users.id = requests.user_id 
                    group by users.name, users.vacation_limit, users.id";
             $res = $connect->conn->query($q)->fetch_all(MYSQLI_ASSOC);
            $connect->close();
			return $res;
		} catch (Exception $e) {
            $connect->close();
			throw $e;
		}
	}

	public function getUser($id) {
        try {
            $connect = new connectionDB();
            $sql = "SELECT * FROM $this->table where id = $id";
            $user = $connect->conn->query($sql)->fetch_all(MYSQLI_ASSOC);
            $connect->close();
            return $user[0];
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
	}

	public function createUser($name, $vacation_limit) {
		try {
            $connect = new connectionDB();
            $sql = "INSERT INTO $this->table (name, vacation_limit) VALUES('$name',$vacation_limit);";
			$user = $connect->conn->query($sql);
            $connect->close();
			return $user;
		} catch (Exception $e) {
            $connect->close();
			throw $e;
		}
	}

    public function updateUser($name, $vacation_limit, $id) {
        try {
            $connect = new connectionDB();
            $sql = "UPDATE $this->table SET 
                name='$name', 
                vacation_limit='$vacation_limit' 
                where id = $id";
            $user = $connect->conn->query($sql);
            $connect->close();
            return $user;
        } catch (Exception $e) {
            $connect->close();
            throw $e;
        }
    }

	public function deleteUser($id) {
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