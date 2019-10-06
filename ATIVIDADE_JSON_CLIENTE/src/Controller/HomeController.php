<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/")
 */
class HomeController extends AbstractController{

    public $data;

    public function __construct()
    {
      
    }

    /**
     * @Route("/", name="home_index")
     */
    public function index(){
        
        return $this->render('home/index.html.twig');
    }

     /**
     * @Route("/questao2", name="home_questao2")
     */
    public function questao2() {
        $ListaAutomoveis = array(
            'ListaAutomoveis' => [
                'Gol' => [
                    'Descricao' => 'Carro 1.0',
                    'Caracteristicas' => [
                        'Cor' => 'Prata', 
                        'Quilometragem' => '100.000',
                        'Fotografia' => null,
                        'Obs' => null
                    ],
                    'Preco' => 'R$ 7.000,00'
                ],
                'Oxix' => [
                    'Descricao' => 'Carro 2.0',
                    'Caracteristicas' => [
                        'Cor' => 'Branco', 
                        'Quilometragem' => '10.000',
                        'Fotografia' => null,
                        'Obs' => null
                    ],
                    'Preco' => 'R$ 47.000,00'
                ],
                'Up' => [
                    'Descricao' => 'Carro 1.2',
                    'Caracteristicas' => [
                        'Cor' => 'Vermelho', 
                        'Quilometragem' => '0.000',
                        'Fotografia' => null,
                        'Obs' => null
                    ],
                    'Preco' => 'R$ 33.000,00'
                ],
            ]
          
        ); 
        
        return new JsonResponse($ListaAutomoveis);
    }

      /**
     * @Route("/ConvertXmlToJson", name="home_xml_to_json")
     */
    public function ConvertXmlToJson(Request $request){
        $data = $request->request->all();

        // URL BUSCANDO O ARQUIVO XML
        $url = $data['url'];

        try {
            $fileContents = file_get_contents($url);
            $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
            $fileContents = trim(str_replace('"', "'", $fileContents));
            $simpleXml = simplexml_load_string($fileContents);
    
            // CONVERTENDO O ARQUIVO XML EM JSON
            return new JsonResponse($simpleXml);
        }catch(\Exception $e) {
            return new JsonResponse(['Erro encontrado' =>  $e->getMessage()]);
        }
    }

    /**
     * @Route("/ConvertJsonCriaXml", name="home_json_to_xml_ecria", defaults={"_format"="xml"})
     */
     //function defination to convert array to xml
     public function ConvertJsonCriaXml(Request $request) {
        $data = $request->request->all();
        $url = $data['url'];

        $fileContents = file_get_contents($url);
        $json = json_decode($fileContents);
        $jsonDecode = array($json);
        $jsonDecode = json_encode($jsonDecode[0], true);
        $jsonToArray = array($jsonDecode);
        $jsonTeste = json_decode($jsonToArray[0], true);

        //function defination to convert array to xml
        function array_to_xml($array, &$xml_user_info) {
            foreach($array as $key => $value) {
                if(is_array($value)) {
                    if(!is_numeric($key)){
                        $subnode = $xml_user_info->addChild("$key");
                        array_to_xml($value, $subnode);
                    }else{
                        $subnode = $xml_user_info->addChild("item$key");
                        array_to_xml($value, $subnode);
                    }
                }else {
                    $xml_user_info->addChild("$key",htmlspecialchars("$value"));
                }
            }
        }

        //creating object of SimpleXMLElement
        $xml_user_info = new \SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><Main></Main>");

        //function call to convert array to xml
        array_to_xml($jsonTeste, $xml_user_info);

        //saving generated xml file
        $xml_file = $xml_user_info->asXML('JsonToXml.xml');

        return $response = new Response($xml_user_info->asXML());
     }
}