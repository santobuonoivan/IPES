<?php


use Slim\Http\Request;
use Slim\Http\Response;

// use \Firebase\JWT\JWT;

/*
$app->post('/login', function (Request $request, Response $response, array $args) {

    $input = $request->getParsedBody();
    $sql = "SELECT * FROM users WHERE email= :email";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("email", $input['email']);
    $sth->execute();
    $user = $sth->fetchObject();

    // verify email address.
    if(!$user) {
        return $this->response->withJson(['error' => true, 'message' => 'These credentials do not match our records.']);
    }

    // verify password.
    if (!password_verify($input['password'],$user->password)) {
        return $this->response->withJson(['error' => true, 'message' => 'These credentials do not match our records.']);
    }

    $settings = $this->get('settings'); // get settings array.

    $token = JWT::encode(['id' => $user->id, 'email' => $user->email], $settings['jwt']['secret'], "HS256");

    return $this->response->withJson(['token' => $token]);

});
*/

// Routes

/*
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/


$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
# Tags
        $app->get('/tags', 'obtenerTags');
        $app->get('/tag/{id}', 'obtenerTag');
        $app->post('/creartag', 'agregarTag');
        $app->put('/actualizartag/{id}', 'actualizarTag');
        $app->delete('/eliminartag/{id}', 'eliminarTag');

# Contratos
        $app->get('/contratos', 'listContratos');
        $app->get('/contrato/{id}/documentos', 'listDocumentosXContrato');

# Documentos
        $app->post('/documento', 'agregarDocumento'); // Si se le pasa el id lo usa, si no le pone un uuid
        $app->get('/documento/{id}', 'obtenerDocumento');
        $app->get('/documentos', 'listDocumentos');
        $app->get('/documento/{id}/text_raw', 'obtenerDocTextRaw');
        $app->get('/documento/{id}/text_validado', 'obtenerDocTextValidado');
        $app->get('/documento/{id}/text_editado', 'obtenerDocTextEditado');

        $app->get('/documento/{id}/analisis', 'ListDocAnalisis');
        $app->get('/documento/{id_d}/analisis/{id_a}', 'obtenerDocAnalisis');
        $app->put('/documento/{id}/text_raw', 'UpdateDocTextRaw');
        $app->put('/documento/{id}/text_validado', 'UpdateDocTextValidado');
        $app->put('/documento/{id}/text_editado', 'UpdateDocTextEditado');

        $app->put('/documento/{id_d}/contrato/{id_c}', 'AsignoDocAContrato');
        $app->put('/documento/{id}', 'updateDoc');
        $app->put('/documento/{id}/analisis', 'InsertAnalisis');

        $app->put('/documento/{id}/OCR', 'MakeOCRDocument');
#    $app->put('/documento/{id}/text_ocr','UpdateDocTextOCR');

        $app->get('/documentos/search', 'searchDoc');

# Texto del documento
#    $app->get('/contrato/{id_c}/documento/{id_d}', 'textoDocumento');

    });
});




/* consumido
 *
 *
 * require __DIR__ . '/../../src/routes.php';
 */

