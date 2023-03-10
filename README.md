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

## Database Manipulation
The Database Forge Class contains methods that help you manage your database.

**Initializing the Forge Class**
```php
$forge = new \EvolutionPHP\Database\Library\Forge($db);
```

**Creating a table**
Fields are created via an associative array. Within the array you must include a ‘type’ key that relates to the datatype of the field. For example, INT, VARCHAR, TEXT, etc. Many datatypes (for example VARCHAR) also require a ‘constraint’ key.
```php
$fields = array(
        'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
        ),
        'blog_author' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
                'default' => 'King of Town',
        ),
        'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
);
$forge->add_field($fields);
```

Lets add keys

```php
$forge->add_key('blog_id', TRUE);
// gives PRIMARY KEY `blog_id` (`blog_id`)

$forge->add_key('blog_name');
// gives KEY `blog_name` (`blog_name`)
```

Creating a table
```php
$forge->create_table('table_name', TRUE);
// gives CREATE TABLE IF NOT EXISTS table_name
```

For more information visit [CodeIgniter3 Database Forge Class](https://codeigniter.com/userguide3/database/forge.html)

## Authors

This library was primarily developed by [CodeIgniter 3](http://www.codeigniter.com/userguide3/database/index.html) and modified by [Andres M](https://twitter.com/EvolutionPHP) for standalone use.
