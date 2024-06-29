<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\MySQLi\Builder;

class ModelKustom
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->dbtest = \Config\Database::connect("tests");
    }

    public function ambilData()
    {
        $sql1 = "select * from data limit 10";
        return $this->db->query($sql1)->getResult();
    }

    public function ambilDataTest()
    {
        $sql1 = "select * from dataTest limit 10";
        return $this->dbtest->query($sql1)->getResult();
    }

    public function prosesTransaksi()
    {
        $this->db->transBegin();

        // $sql1 = "update transaksi set saldo = '6000' where nama_user= 'budi'";
        $sql1 = "update transaksi set saldo = saldo - 1000 where nama_user = 'budi'";
        $this->db->query($sql1);
        $sql2 = "update transaksi set saldo = saldo + 1000 where nama_user = 'yanto'";
        $this->db->query($sql2);
        if ($this->db->transStatus() == false) {
            $this->db->transRollback();
            echo "transaksi rollback";
        } else {
            $this->db->transCommit();
        }
    }

    public function getData()
    {
        $builder = $this->db->table("posts");
        $builder->select("*");
        # $builder->where("id", 1);
        # $builder->orWhere("id", 2);
        // $builder->where("id = '1' or id = '2'");
        // $idpilihan = ['1', '2', '3'];
        // $builder->whereIn('id', $idpilihan);

        // $builder->select("id,first_name,last_name, email");

        // $builder->selectMin("date", "tanggal");

        // $builder->join("authors", "authors.id = posts.author_id");

        // $builder->like("title", "Ipsa"); // SELECT * FROM posts WHERE title like '%Ipsa voluptatum voluptas nulla%'
        $builder->orderBy('title', 'asc');
        $data = $builder->get()->getResult();
        // SELECT * FROM posts WHERE id= '1' AND author_id= '2'
        return $data;
    }
}
