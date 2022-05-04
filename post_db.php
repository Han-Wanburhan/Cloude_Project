<?php 
include('server.php');
session_start();
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 


        
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 

            // Insert image content into database 
            // $insert = $conn->query("INSERT into post (image) VALUES ('./images/post/'"); 
            
            if(isset($_POST["caption"])){
                $insert = $conn->query("INSERT into post(id_user,caption) VALUES (".$_SESSION['user_id'].",'".$_POST["caption"]."')");

                $insert_id = mysqli_insert_id($conn);
                $insert = $conn->query("UPDATE `post` SET `image`='./images/post/".$insert_id.".".$fileType."' WHERE id=".$insert_id);
                
                $target_dir = "./images/post/";
                $path_filename_ext = $target_dir.$insert_id.".".$fileType;

                if (file_exists($path_filename_ext)) {
                    echo "Sorry, file already exists.";
                }else{
                    move_uploaded_file($image,$path_filename_ext);
                    echo "Congratulations! File Uploaded Successfully.";
                }
            }

            if($insert){ 
                echo "<script>alert('success');window.location='post.php';</script>";
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;
