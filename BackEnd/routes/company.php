<?php

// <!-- CREATE TABLE `rzhou7`.`contact` (
//   `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
//   `update_time` TIMESTAMP NULL,
//   `id` INT NOT NULL AUTO_INCREMENT,
//   `name` VARCHAR(45) NOT NULL,
//   `email` VARCHAR(45) NOT NULL,
//   `subject` VARCHAR(45) NULL,
//   `message` VARCHAR(45) NULL,
//   PRIMARY KEY (`id`)); -->

$app->get('/api/company', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('company');
	$stmt = $selectStatement->execute();
	$companies= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $companies;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of insert
$app->post('/api/review', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$rating = $params['rating'];
    $caption = $params['caption'];
    $user_id = 1;
    $movie_id = 1;

    $insertStatement = $pdo->insert(array(  'review_rating', 'review_caption', 'users_id', 'movie_id' ))
								->into('review')
								->values(array($rating, $caption, $user_id, $movie_id));
    $insert =  $insertStatement->execute();

	$res['insert'] = $insert; // id of the record
	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of delete
$app->post('/api/delete_company', function ($request, $response, $args) { //POST example

	$pdo =$this->pdo;
   $params = $request->getParsedBody();
   $id = $params['id'];

   $deleteStatement = $pdo->delete()
						->from('contact')
						->where('id', '=', $id);
   $delete =  $deleteStatement->execute();

   $res['delete'] = $delete; // no of rows affected

   $res['status'] = 'success';
   $response->write(json_encode($res));
   
   $pdo = null;
   return $response;
});

?>
