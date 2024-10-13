<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Registration Details</title>
    <link rel="stylesheet" href="styles.css" />
    <!-- Include your CSS file here -->

    <!-- Favicons -->
    <link href="../customer/assets/img/favicon.png" rel="icon" />
    <link href="../customer/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="../customer/assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="../customer/assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="../customer/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="../customer/assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="../customer/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../customer/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../customer/assets/css/style.css" rel="stylesheet" />

    <style>
      /* Payment Status Dots */
      .payment-status {
        height: 12px;
        width: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
      }
      .payment-done {
        background-color: green;
      }
      .payment-not-done {
        background-color: red;
      }
    </style>
  </head>

  <body>
  

    <main id="main">
    

      <!-- ======= Admin Interface Section ======= -->
      <section id="admin-interface" class="mt-5">
        <div class="container">
          <h2>Student Approval Interface</h2>

          <!-- Student Table -->
          <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Study Field</th>
                <th>Payment</th>
                <th>Date of Register</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Student Row 1 -->
              <tr>
                <td>1</td>
                <td>Nalinda Jayamaha</td>
                <td>1985-06-15</td>
                <td>Male</td>
                <td>ST-01</td>
                <td>CS-01</td>
                <td>Computer Science</td>
                <td><span class="payment-status payment-done"></span>Done</td>
                <td>01.12.2024</td>
                <td>
                  <button
                    class="btn btn-primary btn-sm"
                    onclick="editStudent('ST-01')"
                  >
                    Edit
                  </button>
                  <button
                    class="btn btn-success btn-sm"
                    onclick="approveStudent('ST-01')"
                  >
                    Approve
                  </button>
                  <button
                    class="btn btn-danger btn-sm"
                    onclick="rejectStudent('ST-01')"
                  >
                    Not Approved
                  </button>
                </td>
              </tr>
              <!-- Student Row 2 -->
              <tr>
                <td>2</td>
                <td>Amara Perera</td>
                <td>1992-03-20</td>
                <td>Female</td>
                <td>ST-02</td>
                <td>CS-02</td>
                <td>Information Technology</td>
                <td>
                  <span class="payment-status payment-not-done"></span>Not Done
                </td>
                <td>01.10.2024</td>
                <td>
                  <button
                    class="btn btn-primary btn-sm"
                    onclick="editStudent('ST-02')"
                  >
                    Edit
                  </button>
                  <button
                    class="btn btn-success btn-sm"
                    onclick="approveStudent('ST-02')"
                  >
                    Approve
                  </button>
                  <button
                    class="btn btn-danger btn-sm"
                    onclick="rejectStudent('ST-02')"
                  >
                    Not Approved
                  </button>
                </td>
              </tr>
              <!-- Student Row 3 -->
              <tr>
                <td>3</td>
                <td>Sunil Fernando</td>
                <td>1990-08-12</td>
                <td>Male</td>
                <td>ST-03</td>
                <td>CS-03</td>
                <td>Mechanical Engineering</td>
                <td><span class="payment-status payment-done"></span>Done</td>
                <td>01.11.2024</td>
                <td>
                  <button
                    class="btn btn-primary btn-sm"
                    onclick="editStudent('ST-03')"
                  >
                    Edit
                  </button>
                  <button
                    class="btn btn-success btn-sm"
                    onclick="approveStudent('ST-03')"
                  >
                    Approve
                  </button>
                  <button
                    class="btn btn-danger btn-sm"
                    onclick="rejectStudent('ST-03')"
                  >
                    Not Approved
                  </button>
                </td>
              </tr>
              <!-- Student Row 4 -->
              <tr>
                <td>4</td>
                <td>Manisha Silva</td>
                <td>1995-09-25</td>
                <td>Female</td>
                <td>ST-04</td>
                <td>CS-04</td>
                <td>Electrical Engineering</td>
                <td>
                  <span class="payment-status payment-not-done"></span>Not Done
                </td>
                <td>01.09.2024</td>
                <td>
                  <button
                    class="btn btn-primary btn-sm"
                    onclick="editStudent('ST-04')"
                  >
                    Edit
                  </button>
                  <button
                    class="btn btn-success btn-sm"
                    onclick="approveStudent('ST-04')"
                  >
                    Approve
                  </button>
                  <button
                    class="btn btn-danger btn-sm"
                    onclick="rejectStudent('ST-04')"
                  >
                    Not Approved
                  </button>
                </td>
              </tr>
              <!-- Student Row 5 -->
              <tr>
                <td>5</td>
                <td>Kavindu Perera</td>
                <td>1993-07-08</td>
                <td>Male</td>
                <td>ST-05</td>
                <td>CS-05</td>
                <td>Civil Engineering</td>
                <td><span class="payment-status payment-done"></span>Done</td>
                <td>01.11.2024</td>
                <td>
                  <button
                    class="btn btn-primary btn-sm"
                    onclick="editStudent('ST-05')"
                  >
                    Edit
                  </button>
                  <button
                    class="btn btn-success btn-sm"
                    onclick="approveStudent('ST-05')"
                  >
                    Approve
                  </button>
                  <button
                    class="btn btn-danger btn-sm"
                    onclick="rejectStudent('ST-05')"
                  >
                    Not Approved
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      <!-- End Admin Interface Section -->

      <!-- ======= Approved Students Section ======= -->
      <section id="approved-students" class="mt-5">
        <div class="container">
          <h2>Approved Students List</h2>

          <!-- Approved Students Table -->
          <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Student ID</th>
                <th>Study Field</th>
                <th>Approval Date</th>
              </tr>
            </thead>
            <tbody id="approvedStudentsTableBody">
              <!-- Example Approved Students -->
              <tr>
                <td>1</td>
                <td>Nalinda Jayamaha</td>
                <td>1985-06-15</td>
                <td>ST-01</td>
                <td>Computer Science</td>
                <td>01.12.2024</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Sunil Fernando</td>
                <td>1990-08-12</td>
                <td>ST-03</td>
                <td>Mechanical Engineering</td>
                <td>01.11.2024</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Kavindu Perera</td>
                <td>1993-07-08</td>
                <td>ST-05</td>
                <td>Civil Engineering</td>
                <td>01.11.2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      <!-- End Approved Students Section -->
    </main>
    <!-- End #main -->


    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
