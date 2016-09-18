<?php
	include('../simple_html_dom.php');
	include('../koneksi/koneksi.php');

	class htmlDOMLiputan {
	    public $new_link;

	    public function get_link( ) {
	        return $this->link;
	    }

	    public function set_link($new_link) {
	        $this->link = $new_link;
	    }
	}

	$html = file_get_html('http://liputan6.com/');

	if(!$html){
		continue;
	}
	else{
		$parsedNews = array();
		// echo "<table border=1><tr><td>Judul</td><td>Deskripsi</td></tr>";
		foreach($html->find('div.headline-splash__top-stories') as $element) {
			$newItem = new htmlDOMLiputan;
			// Parse the news item's thumbnail image.

            foreach ($element->find('ul.headline-splash__top-stories-list a') as $link) {
                $newItem->set_link($link->href);
                $url = $newItem->get_link();
            	// echo $url."<br><br>";
            	$insert = "INSERT INTO url (link,sumber) values('".$url."','liputan6.com')";
           		mysql_query($insert) or die ("tidak dapat memasukkan data ke tabel");
            }

           	// echo "<table border=1><tr><td>Judul</td><td>Link</td><td>Deskripsi</td></tr>
           	// <tr><td>$judul</td><td>$url</td><td>$term</td></tr></table><br><br><br>";
           	// $insert = "INSERT INTO url (link,sumber) values('".$url."','liputan6.com')";
           	// mysql_query($insert) or die ("tidak dapat memasukkan data ke tabel");
        }
    }
?>