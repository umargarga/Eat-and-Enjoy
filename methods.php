
$api->get('/restaurant', function () use ($app) {
    $sql = 'SELECT * FROM restaurant';
    $restautant = $app['db']->fetchAll($sql);
    return $app->json(array('restaurant' => $restaurant));
});
