<?php
class API extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){
            header('Location: /MVC/Login');
        }
        //https://date.nager.at/api/v2/publicholidays/2022/CA
    }

    public function index()
    {
       $this->view('API/home');
    }

    public function ExchangeRates(){
        $data = $this->api_call("https://open.er-api.com/v6/latest/CAD");
        $this->view('API/exchangerates',$data);
    }

    public function Holidays(){
        $data = $this->api_call("https://date.nager.at/api/v2/publicholidays/2022/CA");
        $this->view('API/holidays',$data);
    }

    public function Age($name=null){
        if($name != null){
            $datafromAPI = $this->api_call("https://api.agify.io/?name=".$name);
            $data = [
                'ageData' => $datafromAPI,
                'msg' => null
            ];
            
            $this->view('API/age',$data);
        }
        else{
            $data = [
                'msg' => "Please append a name in the url"
            ];
            
            $this->view('API/age',$data);
        }
        
    }

   

    public function api_call($url){ 
        $json_data = file_get_contents($url);
        $response_data = json_decode($json_data);
        return $response_data;
    }
}
