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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Proses Data</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="dataShow.php">Tambah Data</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="px-4 mt-4 pb-4">

            <button type="button" data-toggle="modal" data-target="#addQuartil" class="btn btn-primary mb-3">+ Tambah</button>

            <!-- Modal -->
            <div class="modal fade" id="addQuartil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="inputQuartil.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Jenis Perhitungan:</label>
                                <select name="type_sale" class="form-control" id="">
                                    <option value="Penjualan">Penjualan</option>
                                    <option value="Stock">Stock</option>
                                    <option value="ReStock">ReStock</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Quartil:</label>
                                <select name="quartil" class="form-control" id="">
                                    <option value="Q1">Q1</option>
                                    <option value="Q2">Q2</option>
                                    <option value="Q3">Q3</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Nama Barang:</label>
                                <input type="text" name="stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Tipe Barang:</label>
                                <input type="text" name="type_stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Value:</label>
                                <input type="number" step="0.01" name="value" class="form-control">
                            </div>
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <!-- <form action="inputData.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Nama Kategori:</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Nama Barang:</label>
                                <input type="text" name="stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Tipe Barang:</label>
                                <input type="text" name="type_stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Stok Awal:</label>
                                <input type="number" step="0.01" name="first_stock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Restock:</label>
                                <input type="number" step="0.01" name="restock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Penjualan:</label>
                                <input type="number" step="0.01" name="sale" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Stok Akhir:</label>
                                <input type="number" step="0.01" name="end_stock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Satuan:</label>
                                <input type="text" name="first_unit" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Harga Restock:</label>
                                <input type="number" name="restock_price" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Harga Jual:</label>
                                <input type="number" name="price_sale" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Konversi:</label>
                                <input type="number" name="conversion" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Satuan:</label>
                                <input type="text" name="second_unit" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Total Jual:</label>
                                <input type="number" name="total_sales" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form> -->
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tipe Kalkulasi</th>
                    <th scope="col">Kuartil</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody id="table">

                <?php
                include 'connection/connection.php';
                $no = 1;
                $queryData  = mysqli_query($connect, "SELECT * FROM quartil");
                while($row = mysqli_fetch_array($queryData)){ ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['type_calculation']?></td>
                        <td><?=$row['quartil']?></td>
                        <td><?=$row['item']?></td>
                        <td><?=$row['type_item']?></td>
                        <td><?=$row['value']?></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>
            </table>

        </main>
        <main class="px-4 mt-4 pb-4">

            <button type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary mb-3">+ Tambah</button>

            <!-- Modal -->
            <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="inputData.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Nama Kategori:</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Nama Barang:</label>
                                <input type="text" name="stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Tipe Barang:</label>
                                <input type="text" name="type_stuff" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Stok Awal:</label>
                                <input type="number" step="0.01" name="first_stock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Restock:</label>
                                <input type="number" step="0.01" name="restock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Penjualan:</label>
                                <input type="number" step="0.01" name="sale" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Stok Akhir:</label>
                                <input type="number" step="0.01" name="end_stock" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Satuan:</label>
                                <input type="text" name="first_unit" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Harga Restock:</label>
                                <input type="number" name="restock_price" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Harga Jual:</label>
                                <input type="number" name="price_sale" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Konversi:</label>
                                <input type="number" name="conversion" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Satuan:</label>
                                <input type="text" name="second_unit" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleInputEmail1">Total Jual:</label>
                                <input type="number" name="total_sales" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tipe Barang</th>
                        <th scope="col">Stok Awal</th>
                        <th scope="col">Restock</th>
                        <th scope="col">Penjualan</th>
                        <th scope="col">Stok Akhir</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga Restock</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Konversi</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Total Jual</th>
                    </tr>
                </thead>
                <tbody id="table">

                <?php
                include 'connection/connection.php';
                $no = 1;
                $queryData  = mysqli_query($connect, "SELECT * FROM data");
                while($row = mysqli_fetch_array($queryData)){ ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['category']?></td>
                        <td><?=$row['item']?></td>
                        <td><?=$row['type_item']?></td>
                        <td><?=$row['first_stock']?></td>
                        <td><?=$row['restock']?></td>
                        <td><?=$row['sale']?></td>
                        <td><?=$row['end_stock']?></td>
                        <td><?=$row['first_unit']?></td>
                        <td><?=$row['restock_price']?></td>
                        <td><?=$row['price_sale']?></td>
                        <td><?=$row['conversion']?></td>
                        <td><?=$row['second_unit']?></td>
                        <td><?=$row['total_sales']?></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>
            </table>

        </main>
    </div>
</body>
</html>