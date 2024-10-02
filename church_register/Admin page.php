<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ebenezer Mountains Assembly</title>
<style>
  body{
  font-family:"Montserrat", sans-serif;
  background: #eee;

}

/* nav bar */
.sidebar{
  height: 100vh;
  background: linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.9)), url(images/img1.jpeg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow:5px 7px 25px #999;
}
.bottom-border{
  border-bottom:1px groove #eee;
}
.sidebar-link{
  transition:all .4s;
}
.sidebar-link:hover{
  background-color: #444;
  border-radius:5px;
}
.current{
  background-color: #f44336;
  border-radius: 7px;
  box-shadow: 2px 5px 10px #111;
  transition:all .3s;
}
.current:hover{
  background-color: #f66436;
  border-radius: 7px;
  box-shadow: 2px 5px 20px #111;
  transform:translateY(-1px);
}
.search-input{
  background: transparent;
  border:none;
  border-radius: 0;
  border-bottom:2px solid #999;
  transition:all .4s;
}

.search-input:focus{
  background: transparent;
  box-shadow: none;
  border-bottom:2px solid #dc3545;
}
.search-button{
  border-radius: 25%;
  padding:10px 16px;
}
.search-button:hover{
  background: #eee;
  transform:translateY(-1px);
}
.icon-parent{
  position: relative;
}
.icon-bullet::after{
  content:'';
  position: absolute;
  top:7px;
  left:15px;
  height: 12px;
  width: 12px;
  background-color: #f44336;
  border-radius:50%;
}
@media(max-width:768px){
  .sidebaar{
      position: static;
      height: auto;
  }
  .top-navbar{
      position: static;
  }
}
/* end nav bar */

/* cards */
.card-common{
  box-shadow: 1px 2px 5px #999;
  transition:all .4s;
}
.card-common:hover{
  box-shadow:2px 3px 15px #999;
  transform:translateY(-1px);
}
/* end cards */

/* task list */
.task-border{
  border-left:3px solid #f66436;
}
</style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js">
  </script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
            <a href="#"
              class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">  CHURCH OF PENTECOST</a>
            <div class="bottom-border pb-3">
              <img src="data:image/jpeg;base64,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">
              <a href="add_attendance.php" class="text-white">Church Attendance Records</a>
            </div>
            <ul class="navbar-nav flex-column mt-4">
              <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"><i
                    class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
              <li class="nav-item"><a href="Congregations.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
                    class="fas fa-user text-light fa-lg mr-3"></i>Congregations</a></li>
              <li class="nav-item"><a href="add_user.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
              class="fas fa-user text-light fa-lg mr-3"></i>Men & Womens Ministry</a></li>
              <li class="nav-item"><a href="add_youth_member.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
              class="fas fa-user text-light fa-lg mr-3"></i>Youth Ministry</a></li>
              <li class="nav-item"><a href="add_Children_ministry.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
              class="fas fa-user text-light fa-lg mr-3"></i>Children Ministry</a></li>
              <li class="nav-item"><a href="add_member.php" class="nav-link text-white p-3 mb-2 sidebar-link"><i
              class="font-size:24px"></i>Logout</a></li>
              
             
            </ul>
          </div>
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
            <div class="row align-items-center">
              <div class="col-md-4">
                <h4 class="text-light text-uppercase mb-0">EBENEZER MOUNTAINS ASSEMBLY</h4>
              </div>
              <div class="col-md-5">
               
                   
              </div>
              <div class="col-md-3">
                <ul class="navbar-nav">
                  <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i
                        class="fas fa-comments text-muted fa-lg"></i></a></li>
                  <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i
                        class="fas fa-bell text-muted fa-lg"></i></a></li>
                  <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal"
                      data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="modal fade" id="sign-out">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Want to leave?</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
          Press logout to leave
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
        </div>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-md-8 col-lg-9 ml-auto">
          <div class="row pt-md-5 mt-md-3 mb-5">
            <div class="col-xl-3 col-sm-6 p2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    
                    <div class="text-right text-secondary">
                      <h5>Congregations</h5>
                      <h3>100</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fa fa-sync mr-3"></i>
                  <a href="congregations.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                   
                    <div class="text-right text-secondary">
                      <h5>Men & Women Ministry</h5>
                      <h3>20</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fa fa-sync mr-3"></i>
                  <a href="Mens&women.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                   
                    <div class="text-right text-secondary">
                      <h5>Youth Ministry</h5>
                      <h3>50</h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fa fa-sync mr-3"></i>
                  <a href="view_youth_members.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 p2">
              <div class="card card-common">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    
                    <div class="text-right text-secondary">
                      <h5> Announcement</h5>
                      <h3></h3>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-secondary">
                  <i class="fa fa-sync mr-3"></i>
                  <a href="announcements.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end of cards -->


  <!-- tables -->
 
              <!-- end pagination -->
            </div>
            <!-- second table -->
            
  <!-- end of cards -->


  <!-- tables -->
  <section>
    <div class="container-fluid">
      <div class="row mb-5">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row align-item-center">
            <div class="col-xl-6 col-12 mb-4 mb-xl-0">
              <h3 class="text-muted text-center mb-3">ELDERS & PRESIDING ELDERS</h3>
              <table class="table bg-light text-center table-striped">
                <thead>
                  <tr class="text-muted">
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Role</th>
                    <th>Ministry</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>Mr Samuel Bamfo Kwagyir</td>
                    <td>0501328402</td>
                    <td>Presiding Elder</td>
                    <td>Mens Ministry</td>
                  </tr>

                  <tr>
                    <th>2</th>
                    <td>Mr Isaac Baah Tweneboah</td>
                    <td>0243709238</td>
                    <td>Elder</td>
                    <td>Mens Ministry</td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td>Mr Charles Asiedu</td>
                    <td>0244755757</td>
                    <td>Elder</td>
                    <td>Mens Ministry</td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td>Ross Abeiku Painstill</td>
                    <td>0555872905</td>
                    <td>Elder</td>
                    <td>Mens Ministry</td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td>Ross Abeiku Painstill</td>
                    <td>0555872905</td>
                    <td>Elder</td>
                    <td>Mens Ministry</td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td>Ross Abeiku Painstill</td>
                    <td>0555872905</td>
                    <td>Elder</td>
                    <td>Mens Ministry</td>
                  </tr>
                  
                </tbody>
              </table>

              <!-- pagination -->
              <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a href="Admin page.php" class="page-link py-2 px-3">
                      <span>«</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a href="view_announcements.php" class="page-link py-2 px-3">
                      1
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="Adminstrator.php" class="page-link py-2 px-3">
                      2
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      3
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      <span>»</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- end pagination -->
            </div>
            <!-- second table -->
            <div class=" col-xl-6 col-12">
              <h3 class="text-muted text-center mb-3">DEACONS & DEACONNESSS</h3>
              <table class="table text-center table-dark table-hover">
                <thead>
                  <tr class="text-muted">
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Role</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>1</th>
                    <td>Abaidoo Prince</td>
                    <td>0595322546</td>
                    <td>Deacon</td>

                  </tr>
                  <tr>
                    <th>2</th>
                    <td>Mr Francis Siaw</td>
                    <td>0209388019</td>
                    <td>Deacon</td>
                    
                  </tr>
                  <tr>
                    <th>3</th>
                    <td>Clement Danquah</td>
                    <td>054474988/0578749444</td>
                    <td>Deacon</td>

                  </tr>
                  <tr>
                    <th>4</th>
                    <td>Eric Anyane</td>
                    <td>0246070432/0549581191</td>
                    <td>Deacon</td>
                    
                  </tr>
                  <tr>
                    <th>5</th>
                    <td>Mr Anthony Keelson</td>
                    <td>0204917175</td>
                    <td>Deacon</td>
                    
                  </tr>
                  <tr>
                    <th>6</th>
                    <td>Mr Emmanuel Adofo</td>
                    <td>0243272446</td>
                    <td>Deacon</td>
                   
                  </tr>
                  <tr>
                    <th>7</th>
                    <td>Michael Gyima</td>
                    <td>0547478376</td>
                    <td>Deacon</td>
                    
                  </tr>
                   <tr>
                    <th>8</th>
                    <td>Mrs Paulina Anyane</td>
                    <td>0277262123</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>9</th>
                    <td>Mrs Ursula Owusu</td>
                    <td>0541212766</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>10</th>
                    <td>Mrs Vivian Boakye</td>
                    <td>0540875176</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>11</th>
                    <td>Mrs Dora Asiedu</td>
                    <td>0555489670</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>12</th>
                    <td>Nama Beatrice Asiedu</td>
                    <td>0540229821</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>13</th>
                    <td>Mama Noami Ansong</td>
                    <td>0240109399</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>14</th>
                    <td>Mama Felicia Amonoo</td>
                    <td>0243633267</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>15</th>
                    <td>Mama Abgela Abass</td>
                    <td>0243717630</td>
                    <td>Deaconness</td>
                    
                  </tr>
                   <tr>
                    <th>16</th>
                    <td>Mama Mary Acheampong</td>
                    <td>0547448375</td>
                    <td>Deaconness</td>
                    
                  </tr>
                  
                </tbody>
              </table>
              <!-- pagination -->
              <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      <span>Previous;</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a href="#" class="page-link py-2 px-3">
                      1
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      2
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      3
                    </a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link py-2 px-3">
                      <span>Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- end pagination -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end tables -->

  <!-- progress/ task list -->
  
  
    

         
                
  
</body>
</html>