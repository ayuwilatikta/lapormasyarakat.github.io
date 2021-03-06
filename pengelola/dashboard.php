
<?php 
include "header.php";
include "sidebar.php";
?>
<div class="main-panel">
          <div class="content-wrapper">
                <div class="row">

                  <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Lapor Bencana <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">45</h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Lapor Sarana <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">15</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Jumlah Pelapor <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">95</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Berita</h4>
                    <div class="d-flex">
                      <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                        <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                        <span>jack Menqu</span>
                      </div>
                      <div class="d-flex align-items-center text-muted font-weight-light">
                        <i class="mdi mdi-clock icon-sm mr-2"></i>
                        <span>October 3rd, 2018</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6 pr-1">
                        <img src="assets/images/dashboard/bjr.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="assets/images/dashboard/longsor.jpg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                      <div class="col-6 pl-1">
                        <img src="assets/images/dashboard/gemp.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="assets/images/dashboard/hmm.jpeg" class="mw-100 w-100 rounded" alt="image">
                      </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                      <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle mr-3" alt="image">
                      <div class="mb-0 flex-grow">
                        <h5 class="mr-2 mb-2">PT. Perusahaan Listrik Negara Persero.</h5>
                        <p class="mb-0 font-weight-light">dengan akan adanya perbaikan saluran listrik, maka saluran listrik seluruh kota akan dipadamkan pada tanggal 31 februari 2000, 15.00-16.00 pm.</p>
                      </div>
                      <div class="ml-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                              <div class="col-12 grid-margin">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title">Aduan Masyarakat</h4>
                                    <div class="table-responsive">
                                      <!-- <table class="table">
                                        <thead>
                                          <tr>
                                            <th> Nama </th>
                                            <th> Aduan </th>
                                            <th> Status </th>
                                            <th> Last Update </th>
                                            <th> Tracking ID </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>
                                              <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> David Grey
                                            </td>
                                            <td> Fund is not recieved </td>
                                            <td>
                                              <label class="badge badge-gradient-success">DONE</label>
                                            </td>
                                            <td> Dec 5, 2017 </td>
                                            <td> WD-12345 </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Johnson
                                            </td>
                                            <td> High loading time </td>
                                            <td>
                                              <label class="badge badge-gradient-warning">PROGRESS</label>
                                            </td>
                                            <td> Dec 12, 2017 </td>
                                            <td> WD-12346 </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Marina Michel
                                            </td>
                                            <td> Website down for one week </td>
                                            <td>
                                              <label class="badge badge-gradient-info">ON HOLD</label>
                                            </td>
                                            <td> Dec 16, 2017 </td>
                                            <td> WD-12347 </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe
                                            </td>
                                            <td> Loosing control on server </td>
                                            <td>
                                              <label class="badge badge-gradient-danger">REJECTED</label>
                                            </td>
                                            <td> Dec 3, 2017 </td>
                                            <td> WD-12348 </td>
                                          </tr>
                                        </tbody>
                                      </table> -->
                                      <div class="d-flex mt-5 align-items-top">
                                            <img src="assets/images/faces/face2.jpg" class="img-sm rounded-circle mr-3" alt="image">
                                            <div class="mb-0 flex-grow">
                                              <h5 class="mr-2 mb-2">Stella Johnson.</h5>
                                              <p class="mb-0 font-weight-light">lokasi pabrik pembungan limbah terdapat banyak polusi, maka berhati hati lah kalau melewati sekitar pabrik pembuangan limbah.</p>
                                            </div>
                                            <div>
                                              <i class="mdi mdi-comment-processing-outline"></i>
                                            </div>
                                          </div>
                                      <div class="d-flex mt-5 align-items-top">
                                              <img src="assets/images/faces/face4.jpg" class="img-sm rounded-circle mr-3" alt="image">
                                              <div class="mb-0 flex-grow">
                                                <h5 class="mr-2 mb-2">John.</h5>
                                              <p class="mb-0 font-weight-light">lokasi pabrik pembungan limbah terdapat banyak polusi, maka berhati hati lah kalau melewati sekitar pabrik pembuangan limbah.</p>
                                            </div>
                                              <div>
                                                <i class="mdi mdi-comment-processing-outline"></i>
                                              </div>
                                            </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
<?php
include "footer.php";

 ?>