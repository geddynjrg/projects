<!DOCTYPE html>
<html>
<head>
	<title>Naive String Matching Algorithm</title>
</head>
<body>
	<h1>Naive String Matching Algorithm</h1>
	<form method="post" action="">
		<label for="text">Text:</label>
		<input type="text" id="text" name="text"><br><br>
		<label for="pattern">Pattern:</label>
		<input type="text" id="pattern" name="pattern"><br><br>
		<input type="submit" value="Submit">
	</form>

	<?php
		if (isset($_POST['text']) && isset($_POST['pattern'])) {
			$text = $_POST['text'];
			$pattern = $_POST['pattern'];

			function naiveStringMatch($text, $pattern) {
			    $n = strlen($text);
			    $m = strlen($pattern);
			    $count = 0;
			    $compares = 0;
			    for ($i = 0; $i <= $n - $m; $i++) {
			        $j = 0;
			        while ($j < $m && $text[$i + $j] == $pattern[$j]) {
			            $j++;
			            $compares++;
			        }
			        if ($j == $m) {
			            $count++;
			        }
			        $compares++;
			        echo "Step $i: ";
			        for ($k = 0; $k < $n; $k++) {
			            if ($k >= $i && $k < $i + $m) {
			                echo "<b>".$text[$k]."</b>";
			            } else {
			                echo $text[$k];
			            }
			        }
			        echo "\n";
			        echo str_repeat(" ", ($i + 5));
			        for ($k = 0; $k < $m; $k++) {
			            echo $pattern[$k];
			        }
			        echo "\n\n";
			    }
			    echo "Iterations: ".($n - $m + 1)."\n";
			    echo "Comparisons: ".$compares."\n";
			    return $count;
			}

			$count = naiveStringMatch($text, $pattern);
			echo "Occurrences: ".$count;
		}
	?>
</body>
</html>