<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mtampil extends CI_Model {
		
		public function get_all() {
			$data =  $this->db->query('SELECT a.* FROM (SELECT update_bobotlatih.term AS termLatih, update_bobotlatih.id_doc AS idLatih, 
									update_bobotlatih.bobot AS bobotLatih, update_bobotlatih.bobot_vektor AS bobotVekLatih,update_bobotuji.term AS termUji, 
									update_bobotuji.id_doc AS idUji, update_bobotuji.bobot AS bobotUji, update_bobotuji.bobot_vektor AS bobotVekUji 
									FROM update_bobotlatih LEFT JOIN update_bobotuji ON update_bobotuji.term = update_bobotlatih.term
									UNION ALL
									SELECT update_bobotlatih.term AS termLatih, update_bobotlatih.id_doc AS idLatih, 
									update_bobotlatih.bobot AS bobotLatih, update_bobotlatih.bobot_vektor AS bobotVekLatih,update_bobotuji.term AS termUji, 
									update_bobotuji.id_doc AS idUji, update_bobotuji.bobot AS bobotUji, update_bobotuji.bobot_vektor AS bobotVekUji 
									FROM update_bobotlatih RIGHT JOIN update_bobotuji ON update_bobotuji.term = update_bobotlatih.term) a 
									ORDER BY a.termUji DESC');
			return $data->result_array();
		}

		public function get_all_berita() {
			$data = $this->db->query('SELECT berita_baru.id_berita_baru AS id_berita_baru, berita_baru.judul_berita AS judul,
									berita_baru.isi_berita AS isi, berita_baru.kategori AS kategori, url.sumber AS sumber
									FROM berita_baru JOIN url on berita_baru.id_link = url.id_link LIMIT 15');
			return $data->result_array();
		}

		public function get_kompas() {
			$data = $this->db->query("SELECT berita_baru.* , url.sumber AS sumber  FROM berita_baru JOIN url ON berita_baru.id_link = url.id_link WHERE url.sumber = 'kompas.com'");
			return $data->result_array();
		}

		public function get_detik() {
			$data = $this->db->query("SELECT berita_baru.* , url.sumber AS sumber  FROM berita_baru JOIN url ON berita_baru.id_link = url.id_link WHERE url.sumber = 'detik.com'");
			return $data->result_array();
		}

		public function get_liputan6() {
			$data = $this->db->query("SELECT berita_baru.* , url.sumber  FROM berita_baru JOIN url ON berita_baru.id_link = url.id_link WHERE url.sumber = 'liputan6.com'");
			return $data->result_array();
		}

		public function get_tribun() {
			$data = $this->db->query("SELECT berita_baru.* , url.sumber  FROM berita_baru JOIN url ON berita_baru.id_link = url.id_link WHERE url.sumber = 'tribunnews.com'");
			return $data->result_array();
		}

		public function get_viva() {
			$data = $this->db->query("SELECT berita_baru.* , url.sumber  FROM berita_baru JOIN url ON berita_baru.id_link = url.id_link WHERE url.sumber = 'viva.co.id'");
			return $data->result_array();
		}

        public function readmore($id) {
        	$this->db->WHERE('id_berita_baru', $id);
        	$data = $this->db->get('berita_baru');
        	return $data->result();
        }

        public function get_politik() {
			$data = $this->db->query("SELECT * FROM berita_baru WHERE kategori = 'Politik'");
			return $data->result_array();
		}

		public function get_olahraga() {
			$data = $this->db->query("SELECT * FROM berita_baru WHERE kategori = 'Olahraga'");
			return $data->result_array();
		}

		public function get_pendidikan() {
			$data = $this->db->query("SELECT * FROM berita_baru WHERE kategori = 'Pendidikan'");
			return $data->result_array();
		}

		public function get_otomotif() {
			$data = $this->db->query("SELECT * FROM berita_baru WHERE kategori = 'Otomotif'");
			return $data->result_array();
		}

		public function get_umum() {
			$data = $this->db->query("SELECT * FROM berita_baru WHERE kategori = 'Umum'");
			return $data->result_array();
		}
	}
?>  
