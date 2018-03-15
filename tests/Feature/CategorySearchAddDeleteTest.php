<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\CallsApi;

class CategorySearchAddDeleteTest extends TestCase
{
    use CallsApi;

    public function setUp()
    {
        parent::setUp();
        //$this->authenticate();
    }

    /** @test */
    public function canSearchIncomeCategories()
    {
        /*$searchCategories = [
            "query" => "Wag",
            "group_name" => "income"
        ];

        dd($this->call('GET', 'api/category/search', $searchCategories));*/
    }

    /** @test */
    /*public function canAddIncomeCategories()
    {

    }*/

    /** @test */
    /*public function canDeleteIncomeCategories()
    {

    }*/

    /** @test */
    /*public function canNotDeleteSystemIncomeCategories()
    {

    }*/
}
