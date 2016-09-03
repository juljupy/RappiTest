<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Matrix3D;

class Matrix3DTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function validate_text_case_valid(){
        $response = Matrix3D::checkRow('5');
        $this->assertEquals($response, true);
    }
    /**
     * @test
     */
    public function validate_text_case_invalid(){
        $response = Matrix3D::checkRow('0');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_m_n_valid(){
        $response = Matrix3D::checkRow('5 100');
        $this->assertEquals($response, true);
    }
    /**
     * @test
     */
    public function validate_n_invalid(){
        $response = Matrix3D::checkRow('0 100');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_m_invalid(){
        $response = Matrix3D::checkRow('0 2000');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_query_valid(){
        $response = Matrix3D::checkRow('1 1 1 3 3 3 5');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_query_invalid(){
        $response = Matrix3D::checkRow('1 1 3 1 1 1 5');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_update_valid(){
        $response = Matrix3D::checkRow('1 1 1 4 5');
        $this->assertEquals($response, false);
    }
    /**
     * @test
     */
    public function validate_update_invalid(){
        $response = Matrix3D::checkRow('0 1 1 4 5');
        $this->assertEquals($response, false);
    }
}
