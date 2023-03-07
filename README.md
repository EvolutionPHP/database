# Simple Database Library 

Codeigniter 3 standalone database (MySQL).

## Installation

Use [Composer](http://getcomposer.org) to install Logger into your project:
```bash
composer require evolutionphp/database
```


## Configuration

1. Set configuration var with details of database
```php
$data = array(
	'hostname' => 'localhost', //Database Hostname
	'username' => 'root', //Database Username
	'password' => 'root', //Database Password
	'database' => 'mydb', //Database Name
	'table_prefix' => '', //Table prefix
	'char_set' => 'utf8mb4', //Database chart set
	'dbcollat' => 'utf8mb4_bin', //Database collation
	'port' => '', //Enter if you know the port number, otherwise leave empty
);
```
2. Initialize class
```php
$db = \EvolutionPHP\Database\Database::connect($data);
```
## Call instance
If you already initialize the Database class, then you can call an instance
```php
$db = \EvolutionPHP\Database\Database::connect();
```

## Usage Examples

**Standard Query With Multiple Results (Object Version)**

This is optional, you can save logs of errors. For params of logger go to [SimpleLogger](https://github.com/EvolutionPHP/logger)
```php
$query = $db->query('SELECT name, title, email FROM my_table');

foreach ($query->result() as $row)
{
        echo $row->title;
        echo $row->name;
        echo $row->email;
}

echo 'Total Results: ' . $query->num_rows();
```

**Standard Query With Single Result**
```php
$query = $this->db->query('SELECT name FROM my_table LIMIT 1');
$row = $query->row();
echo $row->name;
```

**Standard Insert**
```php
$sql = "INSERT INTO mytable (title, name) VALUES (".$this->db->escape($title).", ".$this->db->escape($name).")";
$this->db->query($sql);
echo $this->db->affected_rows();
```
**Query Builder Insert**
```php
$data = array(
        'title' => $title,
        'name' => $name,
        'date' => $date
);

$this->db->insert('mytable', $data);  // Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')
```
For more information visit [CodeIgniter3 Query Builder](http://www.codeigniter.com/userguide3/database/query_builder.html)


## Authors

This library was primarily developed by [CodeIgniter 3](http://www.codeigniter.com/userguide3/database/index.html) and modified by [Andres M](https://twitter.com/EvolutionPHP) for standalone use.
