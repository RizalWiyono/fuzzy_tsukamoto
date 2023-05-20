<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container shadow p-0 bg-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Elang A.M</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Proses Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dataShow.php">Tambah Data</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="px-4 mt-4 pb-4">
            <h3><span class="badge badge-primary" style="width: 100%;">Data</span></h3>
            <div class="row">
                <main class="mb-2 col-md-4">
                    <h5><span class="badge badge-success" style="width: 100%;">Penjualan</span></h5>

                    <?php
                    $dataArray = array();
                    $dataArrayItem = array();
                    include 'connection/connection.php';
                    $no = 1;
                    $queryData  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Penjualan' AND quartil='Q3'");
                    while($row = mysqli_fetch_array($queryData)){ 
                    ?>
                        <div class="p-2 border mb-3 rounded">
                            <?php
                            $item = $row['item'];
                            $typeItem = $row['type_item'];

                            array_push($dataArrayItem, (object)[
                                'item' => $item.' '.$typeItem
                            ]);

                            $queryDataMin  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Penjualan' AND quartil='Q1' AND item='$item' AND type_item='$typeItem'");
                            while($rowMin = mysqli_fetch_array($queryDataMin)){
                                array_push($dataArray, (object)[
                                    'tertinggi' => round($row['value']),
                                    'terendah' => round($rowMin['value']),
                                ]);
                            ?>
                                <p class="m-0 font-weight-bold" ><?=$row['item'].' '.$row['type_item']?> Tertinggi: <?= round($row['value']) ?></p>
                                <p class="m-0 font-weight-bold" ><?=$rowMin['item'].' '.$rowMin['type_item']?> Terendah: <?= round($rowMin['value']) ?></p>
                            <?php } ?>
                        </div>
                    <?php $no++; } ?>
                </main>

                <main class="mb-2 col-md-4">
                    <h5><span class="badge badge-warning" style="width: 100%;">Stock</span></h5>

                    <?php
                    include 'connection/connection.php';
                    $no = 1;
                    $queryData  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Stock' AND quartil='Q3'");
                    while($row = mysqli_fetch_array($queryData)){ ?>
                        <div class="p-2 border mb-3 rounded">
                            <?php
                            $item = $row['item'];
                            $typeItem = $row['type_item'];
                            $queryDataMin  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Stock' AND quartil='Q1' AND item='$item' AND type_item='$typeItem'");
                            while($rowMin = mysqli_fetch_array($queryDataMin)){
                            ?>
                                <p class="m-0 font-weight-bold" ><?=$row['item'].' '.$row['type_item']?> Tertinggi: <?= round($row['value']) ?></p>
                                <p class="m-0 font-weight-bold" ><?=$rowMin['item'].' '.$rowMin['type_item']?> Terendah: <?= round($rowMin['value']) ?></p>
                            <?php } ?>
                        </div>
                    <?php $no++; } ?>
                </main>
                <main class="mb-2 col-md-4">
                    <h5><span class="badge badge-info" style="width: 100%;">ReStock</span></h5>

                    <?php
                    include 'connection/connection.php';
                    $no = 1;
                    $dataArrRestock = array();
                    $queryData  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='ReStock' AND quartil='Q3'");
                    while($row = mysqli_fetch_array($queryData)){ ?>
                        <div class="p-2 border mb-3 rounded">
                            <?php
                            $item = $row['item'];
                            $typeItem = $row['type_item'];
                            $queryDataMin  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='ReStock' AND quartil='Q1' AND item='$item' AND type_item='$typeItem'");
                            while($rowMin = mysqli_fetch_array($queryDataMin)){
                                array_push($dataArrRestock, (object)[
                                    'tertinggi' => round($row['value']),
                                    'terendah' => round($rowMin['value']),
                                ]);
                            ?>
                                <p class="m-0 font-weight-bold" ><?=$row['item'].' '.$row['type_item']?> Tertinggi: <?= round($row['value']) ?></p>
                                <p class="m-0 font-weight-bold" ><?=$rowMin['item'].' '.$rowMin['type_item']?> Terendah: <?= round($rowMin['value']) ?></p>
                            <?php } ?>
                        </div>
                    <?php $no++; } ?>
                </main>
            </div>
            
            <h3><span class="badge badge-primary" style="width: 100%;">Diagram Keanggotaan</span></h3>
            <div class="row">
                <main class="mb-2 col-md-6">
                    <h5><span class="badge badge-success" style="width: 100%;">Penjualan</span></h5>

                    <?php
                    include 'connection/connection.php';
                    $no = 1;
                    $dataArrPenjualan = array();
                    $queryData  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Penjualan' AND quartil='Q3'");
                    while($row = mysqli_fetch_array($queryData)){ ?>
                        <div class="p-2 border mb-3 rounded">
                            <?php
                            $item = $row['item'];
                            $typeItem = $row['type_item'];
                            $queryDataMin  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Penjualan' AND quartil='Q1' AND item='$item' AND type_item='$typeItem'");
                            while($rowMin = mysqli_fetch_array($queryDataMin)){
                                $querySampleMin  = mysqli_query($connect, "SELECT * FROM data WHERE item='$item' AND type_item='$typeItem'");
                                while($rowSampleMin = mysqli_fetch_array($querySampleMin)){
                                    $valueSampleMin = $rowSampleMin['first_unit'] === 'Sak' ? $rowSampleMin['sale']*25 : $rowSampleMin['sale'] ;
                                    if($valueSampleMin >= $row['value']) {
                                        $fixValue = 1;
                                    }elseif($valueSampleMin <= $rowMin['value']) {
                                        $fixValue = 0;
                                    }else{
                                        $fixValue = ($row['value']-$valueSampleMin)/($row['value']-$rowMin['value']);
                                    }?> 

                                    <p class="m-0 font-weight-bold" ><?=$row['item'].' '.$row['type_item']?> Tertinggi: <?= round($fixValue,1) ?></p>
                                <?php } ?>

                                <?php 
                                $querySample  = mysqli_query($connect, "SELECT * FROM data WHERE item='$item' AND type_item='$typeItem'");
                                while($rowSample = mysqli_fetch_array($querySample)){
                                    $valueSample = $rowSample['first_unit'] === 'Sak' ? $rowSample['sale']*25 : $rowSample['sale'] ;
                                    if($valueSample >= $row['value']) {
                                        $fixValues = 0;
                                    }elseif($valueSample <= $rowMin['value']) {
                                        $fixValues = 1;
                                    }else{
                                        // echo 'asd';
                                        $fixValues = ($valueSample-$rowMin['value'])/($row['value']-$rowMin['value']);
                                    } ?>
                                    <p class="m-0 font-weight-bold" ><?=$rowMin['item'].' '.$rowMin['type_item']?> Terendah: <?= round($fixValues,1) ?></p>
                                <?php }
                                array_push($dataArrPenjualan, (object)[
                                    'tertinggi' => round($fixValue,1),
                                    'terendah' => round($fixValues,1),
                                ]);
                            ?>
                            <?php } ?>
                        </div>
                    <?php $no++; } ?>
                </main>

                <main class="mb-2 col-md-6">
                    <h5><span class="badge badge-warning" style="width: 100%;">Stock</span></h5>

                    <?php
                    include 'connection/connection.php';
                    $no = 1;
                    $dataArrStock = array();
                    $queryData  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Stock' AND quartil='Q3'");
                    while($row = mysqli_fetch_array($queryData)){ ?>
                        <div class="p-2 border mb-3 rounded">
                            <?php
                            $item = $row['item'];
                            $typeItem = $row['type_item'];
                            $queryDataMin  = mysqli_query($connect, "SELECT * FROM quartil WHERE type_calculation='Stock' AND quartil='Q1' AND item='$item' AND type_item='$typeItem'");
                            while($rowMin = mysqli_fetch_array($queryDataMin)){
                                $querySampleMin  = mysqli_query($connect, "SELECT * FROM data WHERE item='$item' AND type_item='$typeItem'");
                                while($rowSampleMin = mysqli_fetch_array($querySampleMin)){
                                    $valueSampleMin = $rowSampleMin['first_unit'] === 'Sak' ? $rowSampleMin['end_stock']*25 : $rowSampleMin['end_stock'] ;
                                    if($valueSampleMin >= $row['value']) {
                                        $fixValue = 1;
                                    }elseif($valueSampleMin <= $rowMin['value']) {
                                        $fixValue = 0;
                                    }else{
                                        $fixValue = ($row['value']-round($valueSampleMin))/($row['value']-$rowMin['value']);
                                    }?> 

                                    <p class="m-0 font-weight-bold" ><?=$row['item'].' '.$row['type_item']?> Tertinggi: <?= round($fixValue,1) ?></p>
                                <?php } ?>

                                <?php 
                                $querySample  = mysqli_query($connect, "SELECT * FROM data WHERE item='$item' AND type_item='$typeItem'");
                                while($rowSample = mysqli_fetch_array($querySample)){
                                    $valueSample = $rowSample['first_unit'] === 'Sak' ? $rowSample['end_stock']*25 : $rowSample['end_stock'] ;
                                    if($valueSample >= $row['value']) {
                                        $fixValues = 0;
                                    }elseif($valueSample <= $rowMin['value']) {
                                        $fixValues = 1;
                                    }else{
                                        // echo 'asd';
                                        $fixValues = (round($valueSample)-$rowMin['value'])/($row['value']-$rowMin['value']);
                                    } ?>
                                    <p class="m-0 font-weight-bold" ><?=$rowMin['item'].' '.$rowMin['type_item']?> Terendah: <?= round($fixValues,1) ?></p>
                                <?php }
                                array_push($dataArrStock, (object)[
                                    'tertinggi' => round($fixValue,1),
                                    'terendah' => round($fixValues,1)
                                ]);
                            ?>
                            <?php } ?>
                        </div>
                    <?php $no++; } ?>
                </main>
            </div>

            <h3><span class="badge badge-primary" style="width: 100%;">Komposisi</span></h3>

            <div class="row">
                    
                    <?php
                    $dataArrayAlpha = array();
                    foreach($dataArrPenjualan as $x => $dataPenjualan) { 
                        $minAlpha1 = min($dataPenjualan->terendah, $dataArrStock[$x]->terendah);
                        $calcAlpha1 = ( $minAlpha1 ) * ( $dataArrRestock[$x]->tertinggi - $dataArrRestock[$x]->terendah ) + $dataArrRestock[$x]->terendah;

                        $minAlpha2 = min($dataPenjualan->terendah, $dataArrStock[$x]->tertinggi);
                        $calcAlpha2 = ( $minAlpha2 ) * ( $dataArrRestock[$x]->tertinggi - $dataArrRestock[$x]->terendah ) + $dataArrRestock[$x]->terendah;

                        $minAlpha3 = min($dataPenjualan->tertinggi, $dataArrStock[$x]->terendah);
                        $calcAlpha3 = ( $minAlpha3 ) * ( $dataArrRestock[$x]->tertinggi - $dataArrRestock[$x]->terendah ) + $dataArrRestock[$x]->tertinggi;

                        $minAlpha4 = min($dataPenjualan->tertinggi, $dataArrStock[$x]->tertinggi);
                        $calcAlpha4 = ( $minAlpha4 ) * ( $dataArrRestock[$x]->tertinggi - $dataArrRestock[$x]->terendah ) + $dataArrRestock[$x]->tertinggi;

                        array_push($dataArrayAlpha, (object)[
                            'alpha1' => $minAlpha1,
                            'calc1' => round($calcAlpha1,1),
                            'alpha2' => $minAlpha2,
                            'calc2' => round($calcAlpha2,1),
                            'alpha3' => $minAlpha3,
                            'calc3' => round($calcAlpha3,1),
                            'alpha4' => $minAlpha4,
                            'calc4' => round($calcAlpha4,1),
                        ]);
                    ?>
                        <main class="mb-2 col-md-6">
                            <div class="p-2 border mb-3 rounded">
                                <h5><span class="badge badge-light" style="width: 100%;"><?= $dataArrayItem[$x]->item ?></span></h5>

                                <p class="m-0 font-weight-bold" >Penjualan Rendah and Stock Rendah then Restock Rendah : <?= round($calcAlpha1,1) ?></p>
                                <p class="m-0 font-weight-bold" >Penjualan Rendah and Stock Tinggi then Restock Rendah : <?= round($calcAlpha2,1) ?></p>
                                <p class="m-0 font-weight-bold" >Penjualan Tinggi and Stock Rendah then Restock Tinggi : <?= round($calcAlpha3,1) ?></p>
                                <p class="m-0 font-weight-bold" >Penjualan Tinggi and Stock Tinggi then Restock Tinggi : <?= round($calcAlpha4,1) ?></p>
                            </div>
                        </main>
                    <?php } ?>
                                    
            </div>

            <h3><span class="badge badge-primary" style="width: 100%;">Defuzzifikasi</span></h3>

            <div class="row">
                    
                    <?php
                    foreach($dataArrayAlpha as $x => $dataAlpha) { 
                        $totalTop = ( $dataAlpha->alpha1 * $dataAlpha->calc1 ) + ( $dataAlpha->alpha2 * $dataAlpha->calc2 ) + ( $dataAlpha->alpha3 * $dataAlpha->calc3 ) + ( $dataAlpha->alpha4 * $dataAlpha->calc4 );
                        $totalBottom = ( $dataAlpha->alpha1 + $dataAlpha->alpha2 + $dataAlpha->alpha3 + $dataAlpha->alpha4 );
                        // $total = ( $dataAlpha->alpha1 * $dataAlpha->calc1 ) + ( $dataAlpha->alpha2 * $dataAlpha->calc2 ) + ( $dataAlpha->alpha3 * $dataAlpha->calc3 ) + ( $dataAlpha->alpha4 * $dataAlpha->calc4 ) / ( $dataAlpha->alpha1 + $dataAlpha->alpha2 + $dataAlpha->alpha3 + $dataAlpha->alpha4 );
                    ?>
                        <main class="mb-2 col-md-3">
                            <div class="p-2 border mb-3 rounded text-center">
                                <h5><span class="badge badge-light" style="width: 100%;"><?= $dataArrayItem[$x]->item ?></span></h5>

                                <h4 class="m-0 font-weight-bold" ><?= round($totalTop / $totalBottom) ?></h4>
                            </div>
                        </main>
                    <?php } ?>
                                    
            </div>
        </main>
    </div>
</body>
</html>