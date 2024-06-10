<?php 
include('conn/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact Manager</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body class="font-mono ... bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% ...">
    <div class="container mt-5">
        <div class="m-3" role="alert">
            <h3 class="text text-center text-4xl text-bold ">Contact Manager</h3>
        </div>
        
        <!-- Add Contact Modal Trigger -->
        <div class="row mb-3">
            <div class="col-12">
                <button type="button" class="cursor-pointer transition-all 
bg-gray-700 text-white px-6 py-2 rounded-lg
border-green-400
border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
active:border-b-[2px] active:brightness-90 active:translate-y-[2px] hover:shadow-xl hover:shadow-green-300 shadow-green-300 active:shadow-none" data-bs-toggle="modal" data-bs-target="#addContactModal"><i class="fa-regular fa-user"></i>&nbsp;Add Contact</button>
            </div>
            <!-- Search Contact -->
           <div class="flex mt-3" >
           <input type="text" class="form-control" id="searchInput" placeholder="Search contacts">
            <button class="cursor-pointer transition-all bg-gray-700 text-white px-4 py-2 rounded-lg border-green-400 border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px] active:border-b-[2px] active:brightness-90 active:translate-y-[2px] hover:shadow-xl hover:shadow-green-300 shadow-green-300 active:shadow-none" onclick="searchContacts()">
                <i class="fa-solid fa-search"></i>
            </button>
           </div>
            <!-- Add Contact Modal -->
            <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalLabel">Add Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                       
                        <div class="modal-body">
                            <form action="endpoint/add.php" method="POST" class="add-form" enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="contactID">Contact ID</label>
                                    <input type="text" class="form-control" id="contactID" name="tbl_contact_id">
                                </div>
                                <div class="form-group">
                                    <label for="contactImage">Contact Image</label>
                                    <input type="file" class="form-control" id="contactImage" name="contact_image" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactName">Contact Name</label>
                                        <input type="text" class="form-control" id="contactName" name="contact_name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contact_number" maxlength="11" placeholder="11 Digit Phone Number"  required>
                                </div>
                                <div class="form-group">
                                    <label for="contactEmail">Email Addres</label>
                                    <input type="email" class="form-control" id="contactEmail" name="contact_email" placeholder="Active Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactAddress">Address</label>
                                    <input type="text" class="form-control" id="contactAddress" name="contact_address" placeholder="Current Address" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             
            <!-- Update Contact Modal -->
            <div class="modal fade" id="updateContactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Update Contact</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="endpoint/update.php" method="POST" class="add-form" enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="updateContactID">Contact ID</label>
                                    <input type="text" class="form-control" id="updateContactID" name="tbl_contact_id">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactImage">Contact Image</label>
                                    <input type="file" class="form-control" id="updateContactImage" name="contact_image">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactName">Contact Name</label>
                                        <input type="text" class="form-control" id="updateContactName" name="contact_name">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactNumber">Phone Number</label>
                                    <input type="text" class="form-control" id="updateContactNumber" name="contact_number" maxlength="11">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactEmail">Email Addres</label>
                                    <input type="email" class="form-control" id="updateContactEmail" name="contact_email">
                                </div>
                                <div class="form-group">
                                    <label for="updateContactAddress">Address</label>
                                    <input type="text" class="form-control" id="updateContactAddress" name="contact_address">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="main mt-3  ">
                <div class="card  " style="padding: 20px;">
                    <table class="table table ">
                        <thead>
                            <tr>
                                <th>Contact ID</th>
                                <th>Image</th>
                                <th>Full Name</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            include('conn/conn.php');

                            $stmt = $conn->prepare("SELECT * FROM `tbl_contact`");
                            $stmt->execute();

                            $result = $stmt->fetchAll();
                            
                            foreach($result as $row) {

                                $contactID = $row['tbl_contact_id'];
                                $contactImage = $row['contact_image'];
                                $contactName = $row['contact_name'];
                                $contatcNumber = $row['contact_number'];
                                $contactEmail = $row['contact_email']; 
                                $contactAddress = $row['contact_address'];
                            

                            ?>

                            <tr>
                                <td id="contactID-<?= $contactID ?>"><?php echo $contactID ?></td>
                                <td id="contactImage-<?= $contactID ?>"><img src="images/<?php echo $contactImage ?>" class="img-fluid" style="width: 100px" alt=""></td>
                                <td id="contactName-<?= $contactID ?>"><?php echo $contactName ?></td>
                                <td id="contactNumber-<?= $contactID ?>"><?php echo $contatcNumber ?></td>
                                <td id="contactEmail-<?= $contactID ?>"><?php echo $contactEmail ?></td>
                                <td id="contactAddress-<?= $contactID ?>"><?php echo $contactAddress ?></td>
                                <td>
                                    <div class="gap-2 ">
                                        <button type="submit" class="btn-secondary " onclick="update_contact('<?php echo $contactID ?>')"><i class="fa-solid fa-pencil"></i></button>
                                        <button type="button" class="btn-danger" onclick="delete_contact('<?php echo $contactID ?>')"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Bootstrap Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

 <script src="script.js"></script>
</body>
</html>