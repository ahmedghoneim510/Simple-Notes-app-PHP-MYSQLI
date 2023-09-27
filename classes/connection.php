<?php

    class connection {
        public $servername = "localhost";
        function connect(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=notes", "root", "");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
                return $conn;
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }
        public function GetNotes(){
            $pdo=$this->connect();
            $sql="select * from note order by create_data desc ";
            $stat=$pdo->prepare($sql);
            $stat->execute();
            return  $stat->fetchAll(PDO::FETCH_ASSOC);
        }
        public function Addnote($note){
            $pdo=$this->connect();
            $sql="insert into note (title, description,create_data) values(?,?,?)";
            $stat=$pdo->prepare($sql);
            $dat=date("Y-m-d H:i:s");
            $stat->execute([$note['title'],$note['description'],$dat]);

        }
        public function GetNodeById($id){
            $pdo=$this->connect();
            $sql="select * from note where id =?";
            $stat=$pdo->prepare($sql);
            $stat->execute([$id]);
            return $stat->fetchAll(PDO::FETCH_ASSOC);

        }
        public function UpdateNode(int $id,$note){

            $pdo=$this->connect();
            $sql="update note set title = ? ,description=?  where id =$id";
            $stat=$pdo->prepare($sql);
            $dat=date("Y-m-d H:i:s");
            echo '<pre>';
            print_r($note);
            echo '</pre>';
            $stat->execute([$note['title'],$note['description']]);

        }
        public function DeleteNote(int $id){

            $pdo=$this->connect();
            $sql="delete from note where id =?";
            $stat=$pdo->prepare($sql);
            $stat->execute([$id]);

        }
    }

?>