<?php 
 
class Mflight extends CI_Model{
    public function get_ruteawal()
    {
        $this->db->order_by('ruteawal', 'asc');
        return $this->db->get('rutepesawat')->result();
    }

    public function get_ruteakhir()
    {
        // kita joinkan tabel kota dengan provinsi
        $this->db->order_by('ruteakhir', 'asc');
        $this->db->join('rutepesawat', 'ruteakhirpesawat.idrutepesawatfk = rutepesawat.idrutepesawat');
        return $this->db->get('kota')->result();
    }
}