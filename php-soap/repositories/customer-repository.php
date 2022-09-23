<?php

//namespace soap\repositories;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

require_once __DIR__ . '/../entities/customer.php';

//use soap\entities\Customer as Customer;

//$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
//$dotenv->safeLoad();

//$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
//$dotenv->load();

class CustomerRepository
{
    public function Create($document, $fullname, $email, $phone)
    {
        $entityManager = getEntityManager();

        $customer = new Customer($document, $fullname, $email, $phone);
        
        try {
            $entityManager->persist($customer);
            $entityManager->flush();
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
