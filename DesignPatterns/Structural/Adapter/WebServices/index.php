<?php 
declare(strict_types=1);
namespace DesignPatterns\Structural\Adapter;

// Interface chuẩn của hệ thống
interface UserServiceInterface{
    public function getUser($id);
}

// RESTful Service – đã tuân thủ interface
class RestUserService implements UserServiceInterface{
    public function getUser($id)
    {
        // giả lập gọi REST API
        return [
            'id' => $id,
            'name' => "admin",
            'email' => "admin@localhost"
        ];
    }
}

// Soap -- trả về 1 xml
class SoapUserService{
    public function fetchUserData($id){
        // giả sử trả về xml
        return <<<XML
        <user>
            <id>$id</id>
            <name>Admin Soap</name>
            <email>admin.soap@localhost</email>
        </user>
        XML;
    }
}


// adapter cho Soap
class SoapUserAdapter implements UserServiceInterface{
    private $soapService;

    public function __construct(SoapUserService $soapService)
    {
        $this->soapService = $soapService;
    }
    public function getUser($id)
    {
        $XMLString = $this->soapService->fetchUserData($id);
        // read string xml
        $xml = simplexml_load_string($XMLString);
        return [
            'id' => $xml->id,
            'name' => $xml->name,
            'email' => $xml->email
        ];
    }
}

// client code
function showUser(UserServiceInterface $service, $id){
    $user = $service->getUser($id);
    echo "ID: {$user['id']}<br>";
    echo "Tên: {$user['name']}<br>";
    echo "Email: {$user['email']}<br>";
}

// run test
// REST
$restService = new RestUserService();
showUser($restService, 10);

// soap thong qua Adapter
$soapService = new SoapUserService();
$adapter = new SoapUserAdapter($soapService);
showUser($adapter, 10);


