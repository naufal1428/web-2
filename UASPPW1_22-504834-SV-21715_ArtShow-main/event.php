<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="script.js"></script>
    <title>ArtShow - Events</title>
</head>
<body>
    <div class="navigation">
      <div class="row align-items-center">
        <div class="col-auto">
          <div class="nav-left-side">
            <ul class="navbar-nav">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-end">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="#">Invoice</a></li>
                  <li><a href="#">Events</a></li>
                  <li><a href="#">Ticket</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    

    <div class="dashboard">
        <div class="content-wrap">
            <div class="container">
                <?php
                    include("koneksi.php");
                    session_start();
                    if (!isset($_SESSION['name'])) {
                        echo "<script>alert('You need to login first!')</script>";
                        header("location: login.php");
                    }

                    $events = mysqli_query($conn, "SELECT * FROM VIEW_ALL_EVENTS");
                    $num = 0;
                    while ($row = mysqli_fetch_assoc($events)) {
                        $id_event = $row['ID_EVENT'];
                        $tickets = mysqli_query($conn, "SELECT * FROM TIKET WHERE ID_EVENT = '$id_event'");
                        echo "
                        <div class='event-container'>
                            <div class='row align-items-center'>
                                <div class='col-xl-5'>
                                    <img class='img-fluid' src='assets/hero.png'>
                                </div>
                                <div class='col-xl-7'>
                                    <h3>". $row['NAMA_EVENT'] . " <br><span id='date'>" . date("M d, Y", strtotime($row['TANGGAL_EVENT'])) ."</span></h3>
                                    <p>" . $row['DESKRIPSI_EVENT'] . "</p>
                                    <div class='row'>
                                        <div class='col-md-7'>
                                            <table>
                                                <tr>
                                                    <td>Organizer</td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>". $row['NAMA_PELAKSANA'] ."</td>
                                                </tr>
                                                <tr>
                                                    <td>Capacity</td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>". $row['KAPASITAS_EVENT'] ."</td>
                                                </tr>
                                                <tr>
                                                    <td>Venue</td>
                                                    <td>&nbsp;:&nbsp;</td>
                                                    <td>". $row['LOKASI_EVENT'] ."</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class='col-md-5'>
                                            <button class='normal-button' onclick='showTicket(".$num.")'>Show Ticket</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            // if ($tickets -> num_rows > 0)
                            
                            if ($tickets -> num_rows > 0) {
                                echo "
                                    <div class='d-flex justify-content-center'>
                                    <div class='row'><div class='col-md-12'>
                                        <table class='table ticket-detail'>
                                            <tr>
                                                <th>Ticket Type</th>
                                                <th>Ticket Price</th>
                                                <th>Stock</th>
                                                <th>&nbsp;</th>
                                            </tr>";
                                $tnumr = 1;
                                while ($t_row = mysqli_fetch_assoc($tickets)) {
                                    echo "
                                        <tr>
                                            <td>". $t_row['JENIS_TIKET'] ."</td>
                                            <td name='ticket-price'>". (int)$t_row['HARGA_TIKET'] ."</td>
                                            <td>". $t_row['STOK_TIKET'] ."</td>
                                            <td><button class='normal-button' onclick='buyTicket(".$num.", ".($tnumr-1).")'>BUY</button></td>
                                        </tr>
                                    ";
                                    $tnumr++;
                                }
                                echo "
                                    </table>
                                </div></div></div>
                                ";
                            }
                            else {
                                echo "
                                    <div class='d-flex justify-content-center'>
                                    <div class='row'><div class='col-12'>
                                        <table class='table ticket-detail'>
                                            <tr>
                                                <th>Sorry, no ticket available for this event!</th>
                                            </tr>
                                        </table>
                                    </div></div></div>
                                ";
                            }
                            echo "</div>";
                        $num++;
                    }
                ?>

            </div>
        </div>
    </div>
</body>
</html>