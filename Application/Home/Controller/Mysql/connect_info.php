<?php
interface connect_info
{
    const host="localhost";  //主机名
    const username="sport";   //数据库连接名
    const password="500239";   //密码
    const dbname="yann";        //表名
    public function dbconnect();
}
