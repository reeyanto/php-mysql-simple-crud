<?php
class Mahasiswa {

    private $conn;

    /**
     * digunakan untuk inisialisasi $this->conn
     */
    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "db_php_mysql_simple_crud");
    }

    /**
     * digunakan untuk mengambil satu atau semua data
     * untuk satu data, isi parameter dengan nim
     * untuk semua data, kosongkan parameter
     * 
     * kembalian berupa response json
     */
    public function fetch($nim = null) {
        // siapkan query
        $sql  = "select * from mahasiswa where 1";
        $sql .= (isset($nim)) ? " and nim = '$nim'" : "";

        // jalankan query
        $query  = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        // siapkan response data
        $res['data']   = [];
        while($data = mysqli_fetch_object($query)) {
            array_push($res['data'], $data);
        }
        
        // kirim response
        if(count($res['data']) > 0) {
            echo $this->response([
                'status' => 'sukses',
                'data'   => $res['data']
            ]);
        } else {
            echo $this->response([
                'status' => 'gagal',
                'data'   => 0
            ]);
        }
    }

    /**
     * digunakan untuk melakukan proses insert data
     * parameter $data berupa array asosiatif key (berupa nama kolom) dan value
     * 
     * kembalian berupa response json
     */
    public function insert($data) {
        // siapkan query insert
        $sql = "insert into mahasiswa set ";
        foreach($data as $dt => $val) {
            $sql .= "$dt = '$val', ";
        }
        $sql = substr($sql, 0, -2);

        // jalankan query
        $query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        // kembalikan response
        if($query) {
            echo $this->response(['status' => 'sukses']);
        } else {
            echo $this->response(['status' => 'gagal']);
        }
    }

    /**
     * digunakan untuk melakukan proses update data berdasarkan nim
     * parameter $data berupa array asosiatif key (berupa nama kolom) dan value
     * 
     * kembalian berupa response json
     */
    public function update($data, $id) {
        // siapkan query
        $sql = "update mahasiswa set ";
        foreach($data as $dt => $val) {
            $sql .= "$dt = '$val', ";
        }
        $sql = substr($sql, 0, -2);
        $sql.= " where id = '$id'";

        // jalankan query
        $res = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        // kirim response
        if($res) {
            echo $this->response(['status' => 'sukses']);
        } else {
            echo $this->response(['status' => 'gagal']);
        }
    }

    /**
     * digunakan untuk melakukan proses hapus data berdasarkan nim
     * parameter $nim diisi dengan string nim
     * 
     * kembalian berupa response json
     */
    public function delete($nim) {
        $sql    = "delete from mahasiswa where nim = '$nim'";
        $query  = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        if($query && mysqli_affected_rows($this->conn)) {
            echo $this->response(['status' => 'sukses']);
        } else {
            echo $this->response(['status' => 'gagal']);
        }
    }

    // kembalikan pesan response
    private function response($response) {
        header('Content-type:application/json');
        return json_encode($response);
    }
}
