<?php

require_once '../models/Users.php';

$action = isset($_POST['action']) ? $_POST['action'] : false;

$response = [
	'message' => '',
	'success' => false,
	//'post' => $_POST
];

switch ($action) {
	case "create-user":
		$user = new  Users;

		//$response['method'] = $_SERVER['REQUEST_METHOD'];

		foreach ($_POST as $key => $value) {
			if (in_array($key, $user->fields)) {
				$user->{$key} = $value;
			}
		}

		if ($user->save()) {
			$response['success'] = true;
			$response['message'] = 'New user has been added with Id: ' . $user->lastInsertId;
		};

		break;
	case "select-user":

		$users = new  Users;
		$users->id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

		if ($users->id != 0) {

			$user = $users->read();
			if ($user) {
				$response['success'] = true;
				$response['data'] = $user;
			}
		}

		break;
	case "update-user":
		$users = new  Users;
		$users->id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

		foreach ($_POST as $key => $value) {
			if (in_array($key, $users->fields)) {
				$users->{$key} = $value;
			}
		}

		if ($users->id != 0) {
			$users->condition = " WHERE id=" . $users->id;
			if ($users->update()) {
				$response['success'] = true;
				$response['message'] = 'Record has been updated!';
				$response['sql'] = $users->sql;
			}
		}

		break;
	case "delete-user":

		$users = new  Users;
		$users->id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

		if ($users->id != 0) {
			$users->condition = " WHERE id=" . $users->id;
			if ($users->delete()) {
				$response['success'] = true;
				$response['message'] = 'Record has been deleted!';
			} else {
				$response['message'] = 'No changes have been made!';
			}
		}

		break;
	default:
		$response['message'] = "URL not found.";
}

echo json_encode($response);
