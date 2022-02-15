@extends('layouts.task-layout')
@section('content')
Customers
<pre>
<code>
    CREATE TABLE `customers` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `customer_name`  VARCHAR(255) DEFAULT NULL,
    `gender` TINYINT NOT NULL DEFAULT '0' COMMENT '0 – пол не указан, 1 - юноша, 2 - девушка.',
    `birth_date` INT(11) NOT NULL COMMENT 'День рождения в Unix Time Stamp.',
    PRIMARY KEY (`id`)
    );
</code>
</pre>

Books
<pre>
<code>
    CREATE TABLE `books` (
    `id` INT AUTO_INCREMENT,
    `customer_id`  INT(11) NOT NULL,
    `book_title` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
    );
</code>
</pre>

Query
<pre>
<code>
    SELECT customer_name as name,  count(book_title) as books_count
    FROM books
    LEFT JOIN customers ON books.customer_id = customers.id
    WHERE birth_date BETWEEN '1011112296' AND '1168878696'
    AND gender = '1'
    GROUP BY name;
</code>
</pre>
@endsection
