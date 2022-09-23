<?php
require_once "../vendor/econea/nusoap/src/nusoap.php";
$namespace = "registerSOAP";
$server = new soap_server();
$server->configureWSDL("register", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
    "request",
    "complexType",
    "struct",
    "all",
    "",
    array(
        "document" => array("name" => "document", "type" => "xsd:string"),
        "fullname" => array("name" => "fullname", "type" => "xsd:string"),
        "email" => array("name" => "email", "type" => "xsd:string"),
        "phone" => array("name" => "phone", "type" => "xsd:string"),
    )
);

$server->wsdl->addComplexType(
    "response",
    "complexType",
    "struct",
    "all",
    "",
    array(
        "resultado" => array("name" => "resultado", "type" => "xsd:boolean"),
    )
);

$server->register(
    "registerService",
    array("register" => "tns:request"),
    array("register" => "tns:response"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Registrar nuevo cliente"
);

function registerService($request)
{
    require_once __DIR__ . '/../repositories/customer-repository.php';
    $customerRepository = new CustomerRepository();
    $customerRepository->Create($request['document'], $request['fullname'], $request['email'], $request['phone']);
    return array(
        "Resultado" => true
    );
}

$POST_DATA = file_get_contents("php://input");
$server->service($POST_DATA);
exit();