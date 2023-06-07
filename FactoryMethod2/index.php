<?php

namespace RefactoringGuru\createConnection\Conceptual;

abstract class DatabaseConnectionFactory
{
   
    abstract public function createConnection(): DBConnection;

  
    public function configureConnection($host, $user, $password): string
    {
        
        $dbconnection = $this->createConnection();
      
        $result = "DatabaseConnectionFactory: The same DatabaseConnectionFactory's code has just worked with " .
            $dbconnection->connection($host);
            $dbconnection->connection($user);
            $dbconnection->connection($password);

        return $result;
    }
}


class MySQLConnectionFactory extends DatabaseConnectionFactory
{
    
    public function createConnection(): DBConnection
    {
        return new  MySQLConnection();
    }
}

class MariaDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new MariaDBConnection();
    }
}
class SQLServerConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new SQLServerConnection();
    }
}
class PostgreSQLConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new PostgreSQLConnection();
    }
}
class OracleDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new OracleDBConnection();
    }
}
class CassandraDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new CassandraDBConnection();
    }
}
class IngresDBConnectionFactory extends DatabaseConnectionFactory
{
    public function createConnection(): DBConnection
    {
        return new IngresDBConnection();
    }
}


interface DBConnection
{
    public function deliver(): string;
    public function load(): string;
    public function unload(): string;
}


class MySQLConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the MySQLConnection}";
    }
}

class MariaDBConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the MariaDBConnection}";
    }
}

class SQLServerConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the SQLServerConnection}";
    }
}

class PostgreSQLConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the PostgreSQLConnection}";
    }
}

class OracleDBConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the OracleDBConnection}";
    }
}

class CassandraDBConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the CassandraDBConnection}";
    }
}

class IngresDBConnection implements DBConnection
{
    public function connection(): string
    {
        return "{Result of the IngresDBConnection}";
    }
}


