<?php

class AddressModel
{
	public static function getAddressById($id)
	{
		$db = new Database();
		$sql = "SELECT * FROM address WHERE id=".intval($id);

		$result = $db->query($sql);

		if($db->numRows($result) > 0)
		{
			return $db->fetchObject($result);
		}

		return null;
	}

	public static function getAddressesByUserId($userId)
	{
		$db = new Database();

		$sql = "SELECT * FROM address WHERE userId=".intval($userId);
		$result = $db->query($sql);

		if($db->numRows($result) > 0)
		{
			$addressesArray = array();

			while($row = $db->fetchObject($result))
			{
				$addressesArray[] = $row;
			}

			return $addressesArray;
		}

		return null;
	}

	public static function createNewAddress($data)
	{
		$db = new Database();

        $sql = "INSERT INTO address(userId,firstname,lastname, email, nickname) VALUES('".$db->escapeString($data['userId'])."','".$db->escapeString($data['firstname'])."','".$db->escapeString($data['lastname'])."','".$db->escapeString($data['email'])."','".$db->escapeString($data['nickname'])."')";
        $db->query($sql);

		$data['id'] = $db->insertId();

		return (object) $data;
	}

	public static function saveAddress($data)
	{
		$db = new Database();

        $sql = "UPDATE address SET firstname='".$db->escapeString($data['firstname'])."',lastname='".$db->escapeString($data['lastname'])."',email='".$db->escapeString($data['email'])."',nickname='".$db->escapeString($data['nickname'])."' WHERE id=".intval($data['id']);
		$db->query($sql);

		return (object) $data;
	}

	public static function deleteAddress($id)
	{
		$db = new Database();

		$sql = "DELETE FROM address WHERE id=".intval($id);
		$db->query($sql);
	}
}