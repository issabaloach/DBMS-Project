
        // update contact
      
        function update_contact(id) {
            $("#updateContactModal").modal("show");

            let updateContactID = $("#contactID-" + id).text();
            let updateContactImage = $("#contactImage-" + id).find('img').attr('src');
            let updateContactName = $("#contactName-" + id).text();
            let updateContactNumber = $("#contactNumber-" + id).text();
            let updateContactEmail = $("#contactEmail-" + id).text();
            let updateContactAddress = $("#contactAddress-" + id).text();
            console.log(updateContactImage);
            $("#updateContactID").val(updateContactID);
            $("#updateContactName").val(updateContactName);
            $("#updateContactNumber").val(updateContactNumber);
            $("#updateContactEmail").val(updateContactEmail);
            $("#updateContactAddress").val(updateContactAddress);

            // Set the src attribute of the image input using val() method
            $("#updateContactImage").html(updateContactImage);
        }


        // delete contact
        function delete_contact(id){

            if(confirm("Do you confirm to delete this contact?")){
                window.location="endpoint/delete.php?contact="+id
            }
        }

        function searchContacts() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let table = document.getElementsByTagName("table")[0];
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let nameCell = rows[i].getElementsByTagName("td")[2]; // Assuming contact name is in the 3rd column
        let contactName = nameCell.textContent || nameCell.innerText;

        if (contactName.toLowerCase().includes(input)) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}