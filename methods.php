$api->post('/restaurant', function(Request $request) use ($app) {
    $data = $request->request->all();

    $validator = new Assert\Collection([
        'title' => [new Assert\NotBlank(), new Assert\Length(['max' => 255])],
        'address' => [new Assert\NotBlank(), new Assert\Length(['max' => 255])],
        'description' => [new Assert\NotBlank(), new Assert\Length(['max' => 255])],
        'type' => [new Assert\NotBlank(), new Assert\Length(['max' => 255])]
    ]);
    $errors = $app['validator']->validateValue($data, $validator);

    if(count($errors) > 0) {
        $errorList = [];
        /** @var Symfony\Component\Validator\ConstraintViolation $error */
        foreach($errors as $error) {
            $errorList[$error->getPropertyPath()] = $error->getMessage();
        }
        return $app->json($errorList, 400);
    }
    else {
        $app['db']->insert('restaurant',
            [
                'title' => $data['title'],
                'address' => $data['address'],
                'description' => $data['description'],
                'type' => $data['type']
            ]);
        $id = $app['db']->lastInsertId();
        return new Response(null, 201, ['Location' => '/v1/restapi/'.$id]);
    }
});
