var soap = require('soap');

var url = 'http://localhost/epayco/php-soap/services/register.php?wsdl';
var options = {};
var args = { 'request' : { 'document':'doc 01', 'fullname':'willman rojas', 'email':'willman@rojas.com', 'phone':'987654321'} };

soap.createClient(url, function(err, client) {
    client.registerService(args, function(err, result) {
        console.log(result);
    });
});
