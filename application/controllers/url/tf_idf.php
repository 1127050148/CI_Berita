<?
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tf_idf extends CI_Controller
	{
		function tfidf()
		{
			$idf = array();
			foreach ($this->terms as $term => $value) {
				$D = 0;
				$dfi = 0;
				foreach ($this->kalimat as $kalKey => $kalimat) {
					$this->tf[$kalKey][$term] = 0;

					$found = FALSE;
					$string = explode(" ", $kalimat);
					foreach ($string as $str) {
						if (strcmp($str, $term) == 0) {
							$this->tf[$kalKey][$term]++;
							$dfi++;
							$found = TRUE;
						}
					}
					$D++;
				}
				if ($dfi > 0) {
					$idf[$term] = log10($D / $dfi);
				}
				echo "<br />IDF (".$term.") = log(".$D." / ".$dfi.") = ".$idf[$term];
			}
			$this->idf = $idf;
			return TRUE;
		}

		function queryRelevance()
		{
			echo "<br />";
			$denom = 0;
			$tf = $this->tf;
			$idf = $this->idf;

			$denom_idf = 0;
			foreach ($$this->term as $term) {
				$denom_idf += ($idf[$term] * $idf[$term]);
			}
			$denom_idf = sqrt($denom_idf);
			foreach ($$this->kalimat as $keyKal => $kalimat) {
				echo "<br />W (S".($keyKal+1).") = ";
				$denom_kal = 0;
				$nom = 0;
				foreach ($this->term as $term) {
					$denom_kal += ($tf[$keyKal][$term] * $tf[$keyKal][$term]);
					$nom += ($idf[$term] * $tf[$keyKal][$term]);
				}
				$denom_kal = sqrt($denom_kal);
				$denom = $denom_idf * $denom_kal;
				echo "(".$nom." / ".$denom.") = ";

				if ($denom != 0) {
					$this->W[$keyKal] = $nom / $denom;
				}
				else {
					$this->W[$keyKal] = 0;
				}
				echo $this->W[$keyKal];
			}
			return TRUE;
		}

		function cosineSimilarity()
		{
			echo "<br />";
			$cs = array();
			$tf = $this->tf;
			$denom_base = array();

			foreach ($this->kalimat as $key => $kal) {
				$denom_kal = 0;
				foreach ($this->terms as $term) {
					$denom_kal += ($tf[$key][$term] * $tf[$key][$term]);
				}
				$denom_kal = sqrt($denom_kal);
				$denom_base[$key] = $denom_kal;
			}
			foreach ($this->kalimat as $keyX => $kalX) {
				foreach ($this->kalimat as $keyY => $kalY) {
					$nom = 0;
					$denom_kal = 0;
					foreach ($this->terms as $term) {
						$denom_kal += ($tf[$keyY][$term] * $tf[$keyY][$term]);
						$nom += ($tf[$keyX][$term] * $tf[$keyX][$term]);
					}
					$denom_kal = sqrt($denom_kal);
					$denom = $denom_base[$keyX] * $denom_kal;

					if ($denom != 0) {
						$cs[$keyX][$keyY] = $nom / $denom;
					}
					else {
						$cs[$keyX][$keyY] = 0;
					}
				}
			}
			$this->cs = $cs;

			echo "<br /> Cosine Similarity<br />";
			echo "<table border=1> <tr><th>&nbsp;</th>";
			foreach ($this->cs as $n => $cs) {
				echo "<th>S".($n+1)."</th>";
			}
			echo "</tr>";

			foreach ($this->cs as $x => $cx) {
				echo "<tr><td>S".($x+1)."</td>";
				foreach ($cx as $y => $cy) {
					echo "<td>".$cy."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
			return TRUE;
		}
	}

?>