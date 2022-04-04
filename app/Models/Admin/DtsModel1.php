<?php
namespace App\Models\Admin;
use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\Admin\DtsModel1;
 
class DtsModel1 extends Model
{
    protected $table = "tabel-master-plm";
    protected $column_order = array(null, 'kode_barang', 'nup', 'nama_barang', 'kondisi', 'merk_tipe', 'tgl_rekam_pertama', 'tgl_perolehan', 'nilai_perolehan_pertama', 'nilai_mutasi', 'nilai_perolehan', 'nilai_penyusutan', 'nilai_buku', 'kuantitas', 'no_psp', 'tgl_psp', null);
    protected $column_search = array('kode_barang', 'nup', 'nama_barang', 'kondisi');
    protected $order = array('kode_barang' => 'asc');
    protected $request;
    protected $db;
    protected $dt;
    
    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
 
        $this->dt = $this->db->table($this->table);
    }

    public function _get_datatables_query(){
        $i = 0;
        $this->dt = $this->db->table($this->table)->like('status', 'Belum Terdistribusi')->orderBy('kode_barang', 'asc')->orderBy('nup', 'ASC');
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }
 
        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}