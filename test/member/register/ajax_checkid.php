<?php

	$mb_id = trim($_POST['name']);

	// $id_list = array(
	// 	array("id"=>'1111', "tel"=>'1111'),
	// 	array("id"=>'2222', "tel"=>'2222'),
	// 	array("id"=>'3333', "tel"=>'3333'),
	// 	array("id"=>'4444', "tel"=>'4444'),
	// 	array("id"=>'5555', "tel"=>'5555'),
	// );

	$id_list = array(1111, 2222, "3333", "4444", "5555");

	if (isset($_POST['name'])) {

		echo in_array($mb_id, $id_list);

    }