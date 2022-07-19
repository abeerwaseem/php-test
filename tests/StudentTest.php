<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class StudentTest extends TestCase
{
    /**
     * /students [GET]
     */
    public function testShouldReturnAllStudents(){

        $this->get("students", [])
        ->seeStatusCode(200)
        ->seeJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'Name',
                    'Surname',
                    'IndentificationNo',
                    'Country',
                    'DateOfBirth',
                    'RegisteredOn'
                ]
            ],
            'status',
            'message'
        ]);

    }

    /**
     * /students/id [GET]
     */
    public function testShouldReturnStudent(){
        $this->get("students/8", [])
        ->seeStatusCode(200)
        ->seeJsonStructure([
            'data' =>
                [
                    'id',
                    'Name',
                    'Surname',
                    'IndentificationNo',
                    'Country',
                    'DateOfBirth',
                    'RegisteredOn'
                ],
                'status'
                'message'
            ]
        );

    }

    /**
     * /students [POST]
     */
    public function testShouldCreateStudent(){

        $parameters = [
            'name'                   =>  'test',
            'surname'                =>  'user',
            'indentification_no'     =>  'tx123',
            'country'                =>  'UK',
            'dob'                    =>  '1973-12-27 00:00:00',
            'registered_on'          =>  '1993-03-23 08:49:51'
        ];

        $this->post("students", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status',
            'message',
            'data' =>
                [
                    'id',
                    'Name',
                    'Surname',
                    'IndentificationNo',
                    'Country',
                    'DateOfBirth',
                    'RegisteredOn'
                ]
            ]
        );

    }

    /**
     * /students/id [PUT]
     */
    public function testShouldUpdateStudent(){

        $parameters = [
            'name'                   =>  'test',
            'surname'                =>  'user',
            'indentification_no'     =>  'tx1235',
            'country'                =>  'UK',
            'dob'                    =>  '1973-12-27 00:00:00',
            'registered_on'          =>  '1993-03-23 08:49:51'
        ];

        $this->post("students/8", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            'status' =>  'Success',
            'message' =>  'Record Updated',
            'data' =>
                [
                    'id'                    =>  8,
                    'Name'                  =>  'test',
                    'Surname'               =>  'user',
                    'IndentificationNo'     =>  'tx1235',
                    'Country'               =>  'UK',
                    'DateOfBirth'           =>  '1973-12-27 00:00:00',
                    'RegisteredOn'          =>  '1993-03-23 08:49:51'
                ]
            ]
        );
    }

}
