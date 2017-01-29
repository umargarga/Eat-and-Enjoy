$api->get('/companies/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM company WHERE CompanyID = $id";
    $company = $app['db']->fetchAll($sql);
    return $app->json(array('company' => $company));
    //$value = $app->json($users);
    //return $value;
});
