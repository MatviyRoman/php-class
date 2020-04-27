<?php

// 0. заполняем массив через функцию rand(1,100), размера который придет параметром в конструктор
// 1. максимум
// 2. минимум
// 3. парные
// 4. не парные
// 5. все цифры что делятся на 4

class Number
{
    private $num;
    private $arr = [];

    public function __construct($num)
    {
        $this->num = $num;
        for ($i = 0; $i < $this->num; $i++) {
            $this->arr[] = rand(1, 100);
        }
        self::getArray();
        return $this->arr;
    }

    public function getArray($desc = true)
    {
        for ($j = 0; $j < $this->num; $j++) {
            for ($i = $j + 1; $i < $this->num; $i++) {
                if ($desc) {
                    if ($this->arr[$i] > $this->arr[$j]) {
                        list($this->arr[$i], $this->arr[$j]) = [$this->arr[$j], $this->arr[$i]];
                    }
                } else {
                    if ($this->arr[$i] < $this->arr[$j]) {
                        list($this->arr[$i], $this->arr[$j]) = [$this->arr[$j], $this->arr[$i]];
                    }
                }
            }
        }
        return $this->arr;
    }

    public function maxNum()
    {
        return $this->arr[0];
    }

    public function minNum()
    {
        return $this->arr[--$this->num];
    }

    public function evenNum($arr = null)
    {
        foreach ($this->arr as $k => $v) {
            if ($v % 2 == 0) {
                $arr[] = $v;
            }
        }
        return $arr;
    }

    public function oddNum($arr = null)
    {
        foreach ($this->arr as $k => $v) {
            if ($v % 2 == 1) {
                $arr[] = $v;
            }
        }
        return $arr;
    }

    public function fourNum($arr = null)
    {
        foreach ($this->arr as $k => $v) {
            if ($v % 4 == 0) {
                $arr[] = $v;
            }
        }
        return $arr;
    }
}

$number = rand(5, 10);
echo 'number: ' . $number . "\n";

$arr = new Number($number);
print "\n";
print 'Max number: ';
print_r($arr->maxNum());
print "\n";
print 'Min number: ';
print_r($arr->minNum());
print "\n\n";
print 'Even number: ';
print_r($arr->evenNum());
print "\n";
print 'Odd number: ';
print_r($arr->oddNum());
print "\n";
print "все цифры что делятся на 4:\n";
print_r($arr->fourNum());
print "\n";