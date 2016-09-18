<?php
	include('../simple_html_dom.php');
	include('../koneksi/koneksi.php');

	class HtmlDOMDetik extends CI_Controller {
	    public $new_link;

	    public function index()
		{
			$this->load->model('geturl_model');
			// $this->load->helpers('simple_html_dom');
		}

	    function get_link( ) {
	        return $this->guid;
	    }

	    function set_link($new_link) {
	        $this->guid = $new_link;
	    }
	}

	$html = file_get_html('http://rss.detik.com/index.php/indeks');

	if(!$html){
		continue;
	}
	else{
		$parsedNews = array();
		// echo "<table border=1><tr><td>Judul</td><td>Deskripsi</td></tr>";
		foreach($html->find('item') as $element) {
			$newItem = new HtmlDOMDetik;
            foreach ($element->find('guid') as $link) {
                $newItem->set_link($link->innertext);
                $url = $newItem->get_link();
            	// echo $url."<br><br>";
            }

           	$insert = $this->db->insert('rss',$url);
        }
    }
?>