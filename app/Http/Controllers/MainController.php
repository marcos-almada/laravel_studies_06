<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        echo "<h2>Eloquent Relaçoes</h2>";




    }

    public function OneToOne()
    {
        echo "<h2>Relação One to One (Um para Um)</h2>";
        // buscar o telefone de um cliente
        // $client1 = client::find(12)->phone;
        // echo "Telefone do cliente ID:" . $client1->client_id . " - " . $client1->phone_number . "<br>";
        // echo "<hr>";

        // todos os dados do cliente com o telefone
        // $client2 = client::find(12);
        // $phone = $client2->phone->phone_number;
        // echo "<br>";
        // echo "Cliente: " . $client2->client_name . "<br>";
        // echo "Telefone: " . $phone . "<br>";
        // echo "<hr>";

        // Outra forma es usando o metodo with
        // $client3 = client::with('phone')->find(12);
        // echo "<br>";
        // echo "Cliente: " . $client3->client_name . "<br>";
        // echo "Telefone: " . $client3->phone->phone_number . "<br>";
        // echo "<hr>";

        // SE QUISERMOS BUSCAR UM CONJUNTO DE CLIENTES COM SEUS RESPECTIVOS TELEFONES
        $clients = client::with('phone')->get();
        foreach ($clients as $client) {
            echo "<br>";
            echo "Cliente: " . $client->client_name . ": " . $client->phone->phone_number . "<br>";
            echo "<hr>";
        }

    }

    public function OneToMany()
    {
        echo "<h2>Relação One to Many (Um para Muitos)</h2>";
        // Buscar o ID e o nome do cliente e todos os seus telefones
        // $clients1 = client::find(10);
        // $phones = $clients1->phones;
        // echo "Cliente: " . $clients1->client_name . "<br>";
        // echo "Telefones: <br>";
        // foreach ($phones as $phone) {
        //     echo "- " . $phone->phone_number . "<br>";
        //}

        // Outra forma usando o metodo with
        $clients2 = client::with('phones')->find(11);
        echo "Cliente: " . $clients2->client_name . "<br>";
        echo "Telefones: <br>";
        foreach ($clients2->phones as $phone) {
            echo "- " . $phone->phone_number . "<br>";
        }


    }

    private function showData($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function ArrayOfObject($data)
    {
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[] = (object)$value;
        }

        return $tmp;
    }

}
