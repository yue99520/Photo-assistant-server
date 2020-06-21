<?php

namespace Tests\Unit;

use Tests\TestCase;

class CollectionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $collections = collect([
            ['id' => 1, 'email' => '123@gmail.com', 'name' => 'ernie', 'old' => 20],
            ['id' => 2, 'email' => '456@gmail.com', 'name' => 'jacky', 'old' => 15],
            ['id' => 3, 'email' => '789@gmail.com', 'name' => 'john', 'old' => 10],
        ]);
//        $collections = $collections->pluck('email', 'id'); // An array with [id => email]
//        $collections = $collections->pull('name'); // null
//        $collections = $collections->random(); // random one set of data

//        $collections = $collections->reduce(function ($carry, $item) {
//            return $carry . ", " . $item['email'];
//        }, "Emails:"); // Make a iteration, the return value is next iteration's carry

//        $collections = $collections->sum(function ($item){
//            return $item['old'] + $item['id'];
//        });

//        $collections = $collections->reject(function ($value, $key) {
//            return $value['id'] == 1;
//        }); // reject() will reject the items witch are return true

//        $collections = $collections->search(function ($item, $key) {
//            return $item['name'] === 'john';
//        }); // search() is going to return the key of item that first one of closure return true.

//        $collections = $collections->sortBy(function ($item, $key){
//            return $item['old'];
//        }); // sort from small to big.

//        $collections = $collections->union([3 => ['id' => 4, 'email' => '101112@gmail.com', 'name' => 'bill', 'old'=> 5]]);

        $collections = $collections->map(function ($value, $key) {
            $value['product'] = $value['id'] + $value['old'] * 2 + strlen($value['name']);
            return $value;
        });

        dd($collections);
    }
}
