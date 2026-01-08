<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\phone;
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
        $clients2 = client::with('phones')->find(10);
        echo "Cliente: " . $clients2->client_name . "<br>";
        echo "Telefones: <br>";
        foreach ($clients2->phones as $phone) {
            echo "- " . $phone->phone_number . "<br>";
        }




    }

    public function BelongsTo()
    {
        //
        echo "<h2>Relação Belongs To (Pertence a)</h2>";
        // Metodo para pegar no telefone e descobrir a quem ele pertence
        $phone1 = phone::find(10);
        $client = $phone1->client;
        echo "Telefone: " . $phone1->phone_number . "<br>";
        echo "Pertence ao cliente: " . $client->client_name . "<br>";

        // Outra forma usando o metodo with
        $phone2 = phone::with('client')->find(11);
        echo "<br>";
        echo "Telefone: " . $phone2->phone_number . "<br>";
        echo "Pertence ao cliente: " . $phone2->client->client_name . "<br>";

    }

    public function ManyToMany()
    {
        //buscar 1 cliente e todos os produtos comprados por ele
        // echo "<h2>Relação Many to Many (Muitos para Muitos)</h2>";
        // $client1 = client::find(1);
        // $products = $client1->products;
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Produtos comprados: <br>";
        // foreach ($products as $index => $product) {
        //     $index ++;
        //     echo $index . "- " . $product->product_name . "<br>";
        // }

        // buscar 1 produto e todos os clientes que compraram esse produto
        echo "<h2>Relação Many to Many (Muitos para Muitos)</h2>";
        $product1 = Product::find(10);
        $clients = $product1->clients;
        echo "Produto: " . $product1->product_name . "<br>";
        echo "Clientes que compraram esse produto: <br>";
        foreach ($clients as $index => $client) {
            $index ++;
            echo $index . "- " . $client->client_name . "<br>";
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
