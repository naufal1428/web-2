<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link href="style.css" rel="stylesheet">
  <script type="text/javascript" src="script.js"></script>
  <title>ArtShow</title>
</head>
<body>
  <div class="navigation">
    <div class="row align-items-center">
      <div class="col-auto">
        <div class="nav-left-side">
          <ul class="navbar-nav">
            <?php
              session_start();
              if (!isset($_SESSION['name'])) {
                echo "
                <li><a href='login.php'>Login</a></li>
                <li><a href='#'>Sign Up</a></li>";
              }
              else {
                echo "
                <li><a href='event.php'>Dashboard</a></li>
                ";
              }
            ?>
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
                <li><a href="#home">Home</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div class="hero" id="home">
    <div class="container">
      <div class="row">
        <div class="col align-self-end">
          <h1>ArtShow</h1>
          <p>Find a wide selection of interesting art events, ranging from
            theatrical performances, classical music concerts, fine arts
            exhibitions, dance festivals, to contemporary art performances!</p>
            <button class="normal-button"><a href="#events">Check Incoming Events</a></button>
        </div>
      </div>
    </div>
  </div>

  <div class="transition"></div>
  <div class="incoming-event" id="events">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1>Incoming Events</h1>
            <?php
              include('koneksi.php');
              $incoming = mysqli_query($conn, 'select * from view_event_akan_datang;');
              // echo mysqli_num_rows($incoming);
              // foreach ($incoming as $event) {
              //   echo $event['nama_event'];
              // }
              $num = 1;
              if (mysqli_num_rows($incoming) > 0) {
                while($row = mysqli_fetch_assoc($incoming)) {
                  echo "
                  <div class='event-wrap'>
                    <div class='row justify-content-evenly align-items-center'>
                      <div class='col-md-5'>
                        <img class='img-fluid' src='assets/hero.png'>
                      </div>
                      <div class='col-md-6'>
                        <div class='row' id='event-name'>
                          <h3>".$row['NAMA_EVENT']."</h3>
                        </div>
                        <div class='row' id='event-desc'>
                          <p>".$row['DESKRIPSI_EVENT']."</p>
                        </div>
                        <div class='row justify-content-end' id=event-date'>
                          <p style='text-align:right; font-style:italic'>".$row['TANGGAL_EVENT']."</p><br>
                          <button class='normal-button' id='show-btn-".$num."' onclick='showDetail(".$num.")'>More Detail</button>
                        </div>
                        <div class='event-detail' id='detail-".$num."'>
                          <table>
                            <tr>
                              <td>Capacities</td>
                              <td>&nbsp;:&nbsp;</td>
                              <td>".$row['KAPASITAS_EVENT']."</td>
                            </tr>
                            <tr>
                              <td>Venue</td>
                              <td>&nbsp;:&nbsp;</td>
                              <td>".$row['LOKASI_EVENT']."</td>
                            </tr>
                            <tr>
                              <td>Organizer</td>
                              <td>&nbsp;:&nbsp;</td>
                              <td>".$row['NAMA_PELAKSANA']."</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>";
                  $num++;
                }
              }
              else {
                echo "We apologize, there are currently no incoming events";
              }
            ?>
            <div class="event-wrap">
              <div class="row justify-content-center">
                <div class="col">
                  <h3>Still looking for more?</h3>
                  <button class="normal-button"><a href="event.php">Check All Events</a></button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="about-us" id="about">
    <div class="content-wrap">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1>Why Choose Us?</h1>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <table>
                  <tr>
                    <th rowspan="2" id="tnum">1</th>
                    <th>Easy to Use</th>
                  </tr>
                  <tr>
                    <td>Search, find, and order tickets for your favorite art events easily through our platform.</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table>
                  <tr>
                    <th rowspan="2" id="tnum">2</th>
                    <th>Various Types of Event</th>
                  </tr>
                  <tr>
                    <td>Enjoy a variety of art events from various genres and themes, so you can 
                        find one that suits your interests and preferences.</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table>
                  <tr>
                    <th rowspan="2" id="tnum">3</th>
                    <th>Trust & Security</th>
                  </tr>
                  <tr>
                    <td>We work closely with trusted event organizers to ensure a safe 
                        and secure experience for our customers.</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table>
                  <tr>
                    <th rowspan="2" id="tnum">4</th>
                    <th>Easy Payment</th>
                  </tr>
                  <tr>
                    <td>Pay for tickets conveniently through the various payment methods we provide.</td>
                  </tr>
                </table>
              </div>
            </div>
            <h3>So what are you waiting for?</h3>
            <button class="normal-button" id="btn" onclick="orderNow()">Order Now</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-us" id="contact">
    <div class="content-wrap">
      <div class="container">
        <h1>Contact Us</h1>
        <div class="row justify-content-evenly align-items-start">
          <div class="col-xl-6">
            <form>
              <input type="text" id="form-name" placeholder="Name"><br>
              <input type="email" id="form-email" placeholder="Email"><br>
              <select name="form-type">
                <optgroup id="form-type">
                  <option value="critic">Critic</option>
                  <option value="suggestion">Suggestion</option>
                  <option value="question">Question</option>
                </optgroup>
              </select>
              <input type="text" id="form-subject" placeholder="Subject"><br>
              <textarea id="form-msg" placeholder="Write your message here..."></textarea><br>
            </form>
            <div class="row justify-content-start">
              <div class="col-1">
                <div class="contact-alt">
                <button class="normal-button" id="submit-msg" onclick="submitForm()">Submit</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="contact-alt">
              <h2>OR...</h2>
              <h4>Meet us at</h4><hr>
              <p>+621234567890</p>
              <p>contact@artshow.com</p>
              <p>Gedung SV UGM, Sekip Unit 1, Jl. Persatuan, Blimbing Sari, Caturtunggal, Kec. Depok, 
                Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
            </div>
          </div>
          <div class="responded">
              <!-- <h4>Thanks for your {type}, {name}!</h4>
              <p>We will contact you as soon as possible</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row">
      <div class="col-md-2">
        <span>ArtShow &copy; 2023</span>
      </div>
      <div class="col-md-10">
        <ul>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>