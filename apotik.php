<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    echo $a = "ini berupa kata string <br>"; //string
    echo $b = "ini berupa kata string kedua <br>"; //string
    echo $c = 10; //integer
    echo '<br>';
    echo $d = 12.5; //float
    echo '<br>';
    echo $e = false; //boolean
    echo '<br><br>';
    $f = ['satu', 'dua', 'tuga', 'empat']; //array
    var_dump($f);
    echo '<br><br>';
    var_dump($e);

    //operator aritmatika + - * / %

    $a = 20;
    $b = 30;

    // $a = $a + $b;
    // echo $a;
    // $b += $a;
    // echo $b;

    $penjumlahan = $a + $b;
    echo '<br>';
    echo $penjumlahan;

    $pengurangan = $a - $b;
    echo '<br>';
    echo $pengurangan;


    //operator pembanding

    $a =30;
    $b =30;

    $bandingkan = $a == $b;
    var_dump($bandingkan);


    // operator increment & decrement
    // $a = 2
    // $a--;
    // echo $a;

    for($a=10;$a>=1;$a--) { //decrement
        echo $a;
        echo '<br>';
    }

    for($b=10;$b<=30;$b++) { //increment
        echo $b;
        echo '<br>';
    }
    // Deklarasi variabel dengan berbagai tipe data
    
    // echo "ini berupa kata string <br>"; //string
    // echo "ini berupa kata string kedua <br>"; //string
    // echo $c = 10; //integer
    // echo "<br>";
    // echo $d = 12.5; //float
    // echo "<br>";
    // echo $e = false; //boolean
    // echo "<br><br>";
    // $f = ['satu', 'dua', 'tuga', 'empat']; //array
    // var_dump($f);
    // echo "<br><br>";
    // var_dump($e);

    // // Operator aritmatika
    // $a = 20;
    // $b = 30;
    // $penjumlahan = $a + $b;
    // echo "<br>Penjumlahan: " . $penjumlahan;
    // $pengurangan = $a - $b;
    // echo "<br>Pengurangan: " . $pengurangan;

    // // Operator pembanding
    // $a = 30;
    // $b = 30;
    // $bandingkan = $a == $b;
    // echo "<br>Perbandingan: ";
    // var_dump($bandingkan);

    // // Operator increment & decrement
    // echo "<br>Decrement:<br>";
    // for ($a = 10; $a >= 1; $a--) {
    //     echo $a . "<br>";
    // }

    // echo "<br>Increment:<br>";
    // for ($b = 10; $b <= 30; $b++) {
    //     echo $b . "<br>";
    // }
    ?>

</body>

</html>