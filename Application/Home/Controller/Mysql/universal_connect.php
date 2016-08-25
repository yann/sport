<?php
//universal_conncect 通用连接过程
require_once("connect_info.php");
class universal_connect implements connect_info{
    private static $host=connect_info::host;
    private static $username=connect_info::username;
    private static $password=connect_info::password;
    private static $dbname=connect_info
    ::dbname;
    private static $con;  //静态变量处理的速度优势
    public function dbconnect()
    {
        self::$con=new mysqli(self::$host,self::$username,self::$password,self::$dbname);
        return self::$con;
    }
}