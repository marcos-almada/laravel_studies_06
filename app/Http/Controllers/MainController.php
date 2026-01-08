<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        // // inserir um novo produto na tabela products
        // // INSERT INTO products (product_name, price) VALUES ('Produto Teste', 99.99); - query SQL equivalente
        // $new_product = new Product();
        // $new_product->product_name = "Produto Teste";
        // $new_product->price = 99.99;
        // $new_product->save();
        // // automaticamente o Eloquent ORM preenche o campo do created_at e updated_at

        // Product::create(
        //     [
        //         'product_name' => 'Outro Produto Teste',
        //         'price' => 149.99
        //     ]
        // );


        // Product::insert([ // inserir varios produtos de uma vez, nao disponibiliza os timestamps created_at e updated_at
        //     [
        //         'product_name' => 'Produto 006',
        //         'price' => 139.99,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()

        //     ],
        //     [
        //         'product_name' => 'Produto 004',
        //         'price' => 459.99,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'product_name' => 'Produto 005',
        //         'price' => 291.99,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]
        // ]);]

        // --- Update ---
        // nesta opção o eloquent se encarrega de atualizar o campo updated_at automaticamente
        // $product = Product::find(10); // SELECT * FROM products WHERE id = 10
        // $product->product_name = "Produto 010 - Nome Alterado";
        // $product->price = 299.99;
        // $product->save(); // UPDATE products SET product_name = 'Produto 010 - Nome Alterado', price = 299.99 WHERE id = 10

        // podemos lterar o preco de todos os produtos de forma massiva
        // Product::where('price', '<', 30)
        //             ->update(['price' => 91.99]); // UPDATE products SET price = 99.99 WHERE price < 100

        // update OR create (atualiza se encontrar o registo, caso contrario cria um novo)
        // Product::updateOrCreate(
        //     [
        //         'product_name' => 'Açai'
        //     ],
        //     [
        //         'price' => 19.99
        //     ]
        // );

        // --- Delete  - Hard Delete e Soft Delete ---
        // ------------------------------------
        //             HARD DELETE
        // ----------------------------------
        // $product = Product::find(15);;
        // $product->delete(); // hard delete - remove o registo da BD

        // Se quiser limpar todos os registos da tabela
        // Product::truncate(); // hard delete - remove todos os registos da tabela

        //Product::destroy(16); // hard delete - remove o registo da BD pelo id
       // Product::destroy([17, 18, 19]); // hard delete - remove varios registos da BD pelos ids

       //Product::where('price', '>=', 70)->delete(); // remove todos os produtos com preço maior ou igual a 70


       // ------------------------------------
        //      SOFT DELETE - (tem que estar habilitado no model - use SoftDeletes)
        // ------------------------------------

        // $product = Product::find(24);
        // $product->delete(); // soft delete - marca o registo como eliminado (preenche o campo deleted_at com a data/hora atual)

        // recuperar produtos que foram soft deleted
        $product = Product::withTrashed()->find(24);
        $product->restore(); // restaura o registo (define o campo deleted_at como NULL)

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
