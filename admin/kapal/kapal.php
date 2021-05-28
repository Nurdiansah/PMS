<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Kapal</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Kapal</a>
                    </li>
                </ul>
            </div>
            <?php

            $kapals = mysqli_query($koneksi,  "SELECT * FROM kapal ");

            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Kapal</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Kapal
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Tambah</span>
                                                <span class="fw-light">
                                                    Kapal
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="kapal/kapal_store.php">
                                            <div class="modal-body">
                                                <p class="small">Tambah kapal baru di form ini, </p>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama</label>
                                                            <input id="addName" name="nm_kapal" type="text" class="form-control" placeholder="Nama Kapal" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Type</label>
                                                            <input id="addPosition" name="type_kapal" type="text" class="form-control" placeholder="Type Kapal">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Imo Number</label>
                                                            <input id="addOffice" name="imo_number" type="text" class="form-control" placeholder="Imo Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Call Sign</label>
                                                            <input id="addPosition" name="call_sign" type="text" class="form-control" placeholder="Call Sign">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Owner Company</label>
                                                            <input id="addOffice" name="owner_company" type="text" class="form-control" placeholder="Owner Company">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-2">
                                                        <label for="">Clear deck space</label>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Panjang</label>
                                                            <input id="addPosition" type="number" name="panjang" step="0.01" class="form-control" placeholder="Panjang" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Lebar</label>
                                                            <input id="addOffice" type="number" name="lebar" step="0.01" class="form-control" placeholder="Lebar" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Draft</label>
                                                            <input id="addName" name="draft" type="text" class="form-control" placeholder="Draft">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Type</th>
                                            <th>Panjang</th>
                                            <th>Lebar</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Type</th>
                                            <th>Panjang</th>
                                            <th>Lebar</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        foreach ($kapals as $key => $kapal) {
                                            echo "
                                                    <tr>
                                                        <td>" . $kapal['nm_kapal'] . "</td>
                                                        <td>" . $kapal['type_kapal'] . "</td>
                                                        <td>" . $kapal['panjang'] . "</td>
                                                        <td>" . $kapal['lebar'] . "</td>
                                                        <td> 
                                                            <a onclick='javascript: return confirm('Yakin Ingin Logout ?')' href='kapal/kapal_destroy.php?id=" . base64_encode(($kapal['id'])) . "'>                        
                                                                <button class='btn bg-danger'><i class = 'fa fa-trash'></i></button> 
                                                            </a>
                                                        </td>
                                                    </tr>                                           
                                                    ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.codevintek.com">
                            Codevintek
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2021, made with <i class="fa fa-anchor heart text-danger"></i> by <a href="https://www.Codevinte.com">Codevintek</a>
            </div>
        </div>
    </footer>
</div>