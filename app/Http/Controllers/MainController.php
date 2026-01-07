<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        // buscar todos os dados dos produtos
        // $results = Product::all();  // SELECT * FROM products;

        // // ciclo que vai apresentar todos os produtos - mas somente o nome
        // foreach ($results as $product) {
        //     echo "Produto: " . $product->product_name . "<br>";
        // }

        // buscar todos os dados como um array associativo
        // $results = Product::get()->toArray();  // SELECT * FROM products;


        // retornar os resultados como array de objetos stdClass
        // $results = $this->ArrayOfObject(Product::get()->toArray());  // SELECT * FROM products;

        // buscar produtos ordenados pelo nome do produto alfabeticamente
        // $results = Product::orderBy('product_name')->get()->toArray();  // SELECT * FROM products ORDER BY product_name ASC;


        // buscar os 3 primeiros produtos
        // $results = Product::limit(3)->get()->toArray();  // SELECT * FROM products LIMIT 3

        // buscar um produto pelo id
        $results = Product::find(5)->toArray();  // SELECT * FROM products WHERE id = 5 LIMIT 1

        $this->showData($results);

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
