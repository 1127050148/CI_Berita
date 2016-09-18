<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Stemming extends CI_Controller
	{
		function index() 
		{
			$this->load->model('model_stem');
			$isi = $this->model_stem->get_all();
			$kata = array(
				'isi'=> $isi
				);
			$this->load->view('vclassification',$kata);
		}

		function text($data)
		{
			if (strlen($data <= 2)) {
				return $data;
			}

			$data = self:: hapuspartikel($data);
			$data = self:: hapuspp($data);
			$data = self:: hapusawalan1($data);
			$data = self:: hapusawalan2($data);
			$data = self:: hapusakhiran($data);

			return $data;
		}

		//langkah 1 - hapus partikel
		function hapuspartikel($data)
		{
			if(text($data)!=1)
			{
				if((substr($data, -3) == 'kah' )||( substr($data, -3) == 'lah' )||( substr($data, -3) == 'pun' ))
				{
					$data = substr($data, 0, -3);			
				}
			}
			return $data;
		}

		//langkah 2 - hapus possesive pronoun
		function hapuspp($data)
		{
			if(text($data)!=1)
			{
				if(strlen($data) > 4)
				{
					if((substr($data, -2)== 'ku')||(substr($data, -2)== 'mu'))
					{
						$data = substr($data, 0, -2);
					}
				}
				else if((substr($data, -3)== 'nya'))
				{
					$data = substr($data,0, -3);
				}
			}
			return $data;
		}

		//langkah 3 hapus first order prefiks (awalan pertama)
		function hapusawalan1($data)
		{
			if(text($data)!=1)
			{
				if(substr($data,0,4)=="meng")
				{
					if(substr($data,4,1)=="e"||substr($data,4,1)=="u")
					{
						$data = "k".substr($data,4);
					}
					else
					{
						$data = substr($data,4);
					}
				}
				else if(substr($data,0,4)=="meny")
				{
					$data = "s".substr($data,4);
				}
				else if(substr($data,0,3)=="men")
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,3)=="mem"){
					if(substr($data,3,1)=="a" || substr($data,3,1)=="i" || substr($data,3,1)=="e" || substr($data,3,1)=="u" || substr($data,3,1)=="o")
					{
						$data = "p".substr($data,3);
					}
					else
					{
						$data = substr($data,3);
					}
				}
				else if(substr($data,0,2)=="me")
				{
					$data = substr($data,2);
				}
				else if(substr($data,0,4)=="peng")
				{
					if(substr($data,4,1)=="e" || substr($data,4,1)=="a")
					{
						$data = "k".substr($data,4);
					}
					else
					{
						$data = substr($data,4);
					}
				}
				else if(substr($data,0,4)=="peny")
				{
					$data = "s".substr($data,4);
				}
				else if(substr($data,0,3)=="pen")
				{
					if(substr($data,3,1)=="a" || substr($data,3,1)=="i" || substr($data,3,1)=="e" || substr($data,3,1)=="u" || substr($data,3,1)=="o")
					{
						$data = "t".substr($data,3);
					}
					else
					{
						$data = substr($data,3);
					}
				}
				else if(substr($data,0,3)=="pem")
				{
					if(substr($data,3,1)=="a" || substr($data,3,1)=="i" || substr($data,3,1)=="e" || substr($data,3,1)=="u" || substr($data,3,1)=="o")
					{
						$data = "p".substr($data,3);
					}
					else
					{
						$data = substr($data,3);
					}
				}
				else if(substr($data,0,2)=="di")
				{
					$data = substr($data,2);
				}
				else if(substr($data,0,3)=="ter")
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,2)=="ke")
				{
					$data = substr($data,2);
				}
			}
			return $data;
		}

		//langkah 4 hapus second order prefiks (awalan kedua)
		function hapusawalan2($data)
		{
			if(text($data)!=1)
			{
				if(substr($data,0,3)=="ber")
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,3)=="bel")
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,2)=="be")
				{
					$data = substr($data,2);
				}
				else if(substr($data,0,3)=="per" && strlen($data) > 5)
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,2)=="pe"  && strlen($data) > 5)
				{
					$data = substr($data,2);
				}
				else if(substr($data,0,3)=="pel"  && strlen($data) > 5)
				{
					$data = substr($data,3);
				}
				else if(substr($data,0,2)=="se"  && strlen($data) > 5)
				{
					$data = substr($data,2);
				}
			}
			return $data;
		}

		////langkah 5 hapus suffiks
		function hapusakhiran($data)
		{
			if(text($data)!=1)
			{
				if (substr($data, -3)== "kan" )
				{
					$data = substr($data, 0, -3);
				}
				else if(substr($data, -1)== "i" )
				{
				    $data = substr($data, 0, -1);
				}
				else if(substr($data, -2)== "an")
				{
					$data = substr($data, 0, -2);
				}
			}	
			return $data;
		}
	}

?>