<?php

namespace Horde\Rdo\Unit\Test;
use \Horde_Db_Adapter;

use Horde\Test\TestCase;

use Horde\Rdo\Factory;
use Horde\Rdo\Mapper;
use Horde\Rdo\RdoException;
use Horde_Db;

class FactoryTest extends TestCase{

    //@return Factory The Factory

     public function test__construct(){
        $adapter=$this->createMock(Horde_Db_Adapter::class);
        
        $q=new Factory($adapter);
        $c=$q->__construct($adapter);
       
        $this->assertInstanceOf(Factory::class,$q);
               
    }


    public function testcount(){

        //count returns number of cached mappers as Integer
        $adapter=$this->createMock(Horde_Db_Adapter::class);
        
        $q=new Factory($adapter);
        $c=$q->count();
        $this->assertIsInt($c);
       
    }
    
   /* public function testcreateClassExist(){

    }
*/
    public function testcreateClassDoesNotExist(){
        $adapter=$this->createMock(Horde_Db_Adapter::class);        
        $q=new Factory($adapter);
        $class='anything';
        $this->expectException(RdoException::class);
        $this->expectExceptionMessage((sprintf('Class %s not found', $class)));
        $q->create($class,$adapter);
        
    }

    public function testcreateClassWithoutAdapter(){
        $adapter=$this->createMock(Horde_Db_Adapter::class);   
         
        $q=new Factory($adapter);
        $class=$this->createMock(Mapper::class);
        
        $q->create($class,$adapter);
        $this->assertInstanceOf(Mapper::class,$class);
    }

}       