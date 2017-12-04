<?php

	// $mb_id   = trim ($_POST['name']);

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
        // echo json_encode(array("id"=>$mb_id, "status"=>"success"));
        // echo json_encode($id_list);

		// $filtered = array_filter($id_list, function ($u) use ($excludeId) {
		// 	return $u['id'] != $excludeId;
		// });

		// echo array_filter($mb_id, $id_list);

		// $filtered = array_filter($id_list, function($e){
		// 	return $e==$mb_id;
		// });

		echo in_array($mb_id, $id_list);

		// echo $mb_id;
		// $odd = array_filter($id_list, function ($mb_id) {
  //   		return !$mb_id;
		// });

		// echo json_encode(array_filter($id_list, $mb_id));

		// echo $odd;

		// return true;
        // echo "succcess";
        // echo "success";
    }