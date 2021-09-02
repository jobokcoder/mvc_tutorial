<?php

class User
{
    public $name;
    
    public function connect($name)
    {
        
        $pg_db_host = 'localhost';
        $pg_db_username = 'postgres'; // 자신이 설정한 DB 유저(role)이름. postgres는 기본 이름
        $pg_db_name = 'postgres'; // 자신이 만든 DB 이름, postgres는 기본 DB이름
        $pg_db_password = 'sample241'; // 자신이 설정한 비밀번호 입력

        $dsn = "pgsql:host=$pg_db_host;dbname=$pg_db_name;port=5555";
        // cf. 만약, mysql로 DB를 바꾸려면 pgsql을 mysql로 바꿔주기만 하면 됨. 이게 PDO의 장점

        $pdo = new PDO($dsn, $pg_db_username, $pg_db_password); // PDO 객체 생성.

        $stmt = $pdo->prepare("INSERT INTO test (id, name) VALUES (4, ?)");
        $stmt->execute([$name]);

        $pdo=null;
    }
}


?>