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
        // $results = Product::find(5)->toArray();  // SELECT * FROM products WHERE id = 5 LIMIT 1

        // --- aula 161 -- consultas com condições WHERE ---

        // $results = Product::where('price', '>', 50)
        //                         ->get()
        //                         ->toArray();

        // buscar apenas o primeiro produto que custa mais de 50
        // $results = Product::where('price', '>', 50)
        //                 ->first()
        //                 ->toArray();

        // buscar apenas o primeiro elemento se ele existir, caso contrario retorna um array vazio
        // $results = Product::where('price', '>', 170)
        //                 ->firstOr( function () {
        //                     return [];
        //                 });

        // buscar dados de um produto e decide alterar um valor
        // $product = Product::find(8);
        // echo $product->price; // valor original que esta na BD
        // $product->price = 199.99; // altera o valor, define um novo preço apenas na instancia do objeto
        // echo "<br>";
        // echo $product->price; // valor alterado

        // // caso queira voltar ao valor original
        // $product->refresh(); // volta a ler o valor original da BD
        // echo "<br>";
        // echo $product->price; // valor original que esta na BD
        // // fim aula 161

        // aula 162 - exibicao de dados

        // $product = Product::find(8);
        // echo "ID: " . $product->id . "<br>";
        // echo "Nome: " . $product->product_name . "<br><hr>";


        // $product = Product::where('price', '>', 50)->first();
        // echo  $product->product_name . " Tem um precço de " . $product->price . "<br>";

        // $product = Product::findOr(1000, function () {
        //     echo "Produto nao encontrado!";
        // });

        // if ($product) {
        //    echo  $product->product_name . " Tem um preço de " . $product->price . "<br>";
        // }


        // parar a execução do codigo caso nao seja encontrado o produto
        // $product = Product::findOrFail(10);
        // echo  $product->product_name . " Tem um preço de " . $product->price . "<br>";

        // buscar agregados - contagem de produtos
        $total_products = Product::count();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $product_avg_price = Product::avg('price');
        $product_sum_price = Product::sum('price');

        $results = [
            'total_products' => $total_products,
            'product_max_price' => $product_max_price,
            'product_min_price' => $product_min_price,
            'product_avg_price' => $product_avg_price,
            'product_sum_price' => $product_sum_price,
        ];

        $this->showData($results);

        // $this->showData($results);

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
