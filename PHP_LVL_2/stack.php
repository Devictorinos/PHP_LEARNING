<?php

namespace stack;

class ReadingList
{
    protected $stack;
    protected $limit;
    
    public function __construct($limit = 10)
    {
        // инициализация стека
        $this->stack = array();
        // устанавливаем ограничение на количество элементов в стеке
        $this->limit = $limit;
    }

    public function push($item)
    {
        // проверяем, не полон ли наш стек
        if (count($this->stack) < $this->limit) {
            // добавляем новый элемент в начало массива
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Стек переполнен!');
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            // проверка на пустоту стека
            throw new RunTimeException('Стек пуст!');
        } else {
            // Извлекаем первый элемент массива
            return array_shift($this->stack);
        }
    }

    public function top()
    {
        return current($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }
}


// $myBooks = new ReadingList();

// $myBooks->push('A Dream of Spring');
// $myBooks->push('The Winds of Winter');
// $myBooks->push('A Dance with Dragons');
// $myBooks->push('A Feast for Crows');
// $myBooks->push('A Storm of Swords');
// $myBooks->push('A Clash of Kings');
// $myBooks->push('A Game of Thrones');
// echo $myBooks->pop(); // Получили и удалили 'A Game of Thrones'
// echo $myBooks->pop(); // Получили и удалили 'A Clash of Kings'
// echo $myBooks->pop(); // Получили и удалили 'A Storm of Swords'
// echo $myBooks->top(); // Получили 'A Feast for Crows'

