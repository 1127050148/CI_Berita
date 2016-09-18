<?php
	include('../simple_html_dom.php');
	include('../koneksi/koneksi.php');

	class htmlDOMKompas {
	    public $new_link;
 
	   public  function get_link( ) {
	        return $this->link;
	    }

	    public function set_link($new_link) {
	        $this->link = $new_link;
	    }
	}

	$html = file_get_html('http://www.kompas.com/');

	if(!$html){
		continue;
	}
	else{
		$parsedNews = array();
		// echo "<table border=1><tr><td>Judul</td><td>Deskripsi</td></tr>";
		foreach($html->find('div#populer') as $element) {
			$newItem = new htmlDOMKompas;
			
            foreach ($element->find('div.most__title a') as $link) {
                $newItem->set_link($link->href);
                $url = $newItem->get_link();
            	// echo $url."<br><br>";
            	$insert = "INSERT INTO url (link,sumber) values('".$url."','kompas.com')";
           		mysql_query($insert) or die ("tidak dapat memasukkan data ke tabel");
            }
        }
    }
?>