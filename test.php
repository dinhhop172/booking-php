<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


<div id="myfirstchart" style="height: 250px;"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>

<?php

interface VehicleInterface {
    public function drive();
    public function fly();
}

class FutureCar implements VehicleInterface {
    
    public function drive() {
        echo 'Driving a future car!';
    }
  
    public function fly() {
        echo 'Flying a future car!';
    }
}

class Car implements VehicleInterface {
    
    public function drive() {
        echo 'Driving a car!';
    }
  
    public function fly() {
        throw new Exception('Not implemented method');
    }
}
$cara = new Car();
$cara->fly();

interface TaiNgheCanPhaiSac
{
   public function sac();
}
class TaiNghe
{

}

class KhongDay extends TaiNghe implements TaiNgheCanPhaiSac
{
   public function sac()
   {
       //
   }
}
class CoDay extends TaiNghe
{
   
}

class Book {
    private $bookName;
    private $bookAuthor;
    const BR = "<br />";

    public function __contruct($name, $author)
    {
        $this->bookName = $name;
        $this->bookAuthor = $author;
    }
    public function getNameAndAuthor()
    {
        return $this->bookName . ' - ' . $this->bookAuthor . self::BR;
    }
}
class BookFactory {
    public static function create($name, $author)
    {
        return new Book($name, $author);
    }
}
$book1 = BookFactory::create('Book 1', 'Author 1');
$book2 = BookFactory::create('Book 2', 'Author 2');

echo $book1->getNameAndAuthor();
echo $book2->getNameAndAuthor();




