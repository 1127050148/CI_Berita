<?php
	include('../simple_html_dom.php');
	include('../koneksi/koneksi.php');

	class htmlDOMViva {
	    public $new_link;

	    public function get_link( ) {
	        return $this->guid;
	    }

	    public function set_link($new_link) {
	        $this->guid = $new_link;
	    }
	}

	$html = file_get_html('http://rss.viva.co.id/get/all');

	if(!$html){
		continue;
	}
	else{
		$parsedNews = array();
		// echo "<table border=1><tr><td>Judul</td><td>Deskripsi</td></tr>";
		foreach($html->find('item') as $element) {
			$newItem = new htmlDOMViva;
			// Parse the news item's thumbnail image.

			// // Parse the news item's title.
   //          foreach ($element->find('title') as $title) {
   //              $newItem->set_title($title->innertext);
   //              $judul = $newItem->get_title();
   //          }

			// foreach ($element->find('description') as $text) {
   //          	$newItem->set_description($text->innertext);
   //          	$term = $newItem->get_description();
   //          } //echo $term."<br><br>";

            foreach ($element->find('guid') as $link) {
                $newItem->set_link($link->innertext);
                $url = $newItem->get_link();
            	// echo $url."<br><br>";
            }

           	// echo "<table border=1><tr><td>Judul</td><td>Link</td><td>Deskripsi</td></tr>
           	// <tr><td>$judul</td><td>$url</td><td>$term</td></tr></table><br><br><br>";
           	$insert = "INSERT INTO url (link,sumber) values('".$url."','viva.co.id')";
           	mysql_query($insert) or die ("tidak dapat memasukkan data ke tabel");
        }
    }
?>