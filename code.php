<?php
use Kreait\Firebase\Contract\Firestore;
use Google\Cloud\Firestore\FirestoreClient;
    session_start();
    include('db.php');
 

    if(isset($_REQUEST['btnRegister']))
    {

        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Password = $_POST['pass'];

        $userProperties = [
            'email' => $Email,
            'emailVerified' => false,
            'password' => $Password,
            'displayName' => $Name,
            'disabled' => false,
        ];
        try{
            $createdUser = $auth->createUser($userProperties);

            if($createdUser){
                $_SESSION['status']="User Created/Registered Successfully"; 
                $_SESSION['uid'] = $user->uid;
                $_SESSION['email'] = $Email;
                $_SESSION['name'] = $Name;
                $_SESSION['password'] = $Password;
                $_SESSION['noupdate'] = "No Update";
                header('Location:dash.php');
                exit();
            }else{
                $_SESSION['status']="User Registeration Failed"; 
                header('Location:registeration.php');
                exit();
            }
        }catch(Exception $e){
            echo "Email Exists already";
        }
        

    }

    if(isset($_POST['btnLogin']))
    {
        $email = $_POST['txtEmail'];
        $Password = $_POST['txtPassword']; 
        $name = $_SESSION['name'];

        try {
            $user = $auth->getUserByEmail("$email");
            try{
                $signInResult = $auth->signInWithEmailAndPassword($email, $Password); 
                $idTokenString = $signInResult->idToken();;

                try {
                    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                    $uid = $verifiedIdToken->claims()->get('sub');
                    $_SESSION['UID'] = $uid;
                    $_SESSION['idToken'] = $idTokenString;
                    $_SESSION['name'] = $name;
                    //$_SESSION['uid'] = $UID->uid;

                    $_SESSION['status'] = "Logged In Successfull";
                    header('Location:dash.php');
                    exit();

                } catch (FailedToVerifyToken $e) {
                    echo 'The token is invalid: '.$e->getMessage();
                }
            }catch(Exception $e){
                $_SESSION['wrong'] = "Wrong Password";
                header('Location:login.php');
                exit();
            }
            

        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            $_SESSION['invalid'] = "Invalid Email";
            header('Location:login.php');
            exit();
        }

    }

    //Dashboard Save data to firestore

    if(isset($_REQUEST['btnSave']))
    {
        
        $email = $_POST['email'];
        $Password = $_POST['pass']; 
        $Name = $_POST['name'];
        $date = $_POST['dob'];
        $file_name = $_POST["imgavatar"];
        $address = $_POST['address'];
        $uid = $_SESSION['UID'];

        
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $Password;
        $_SESSION['address'] = $address;
        $_SESSION['dob'] = $date;
        $_SESSION['name'] = $Name;
        

        $data = [
            'Name'=> $Name,
            'Email'=> $email,
            'Address'=> $address,
            'DOB'=> $date,
            'Password'=> $Password
        ];

         $tmp_path = $_FILES['imgavatar']['name'];
         move_uploaded_file($_FILES['imgavatar']['tmp_name'],"images/".$_FILES['imgavatar']['name']);
    
           
        $path = "images/".$_FILES['imgavatar']['name'];
        $_SESSION['imagepath'] = $path;
         
         

        $firestore = $factory->createFirestore();
        $db = $firestore->database();
        $collection = $db->collection('Users');
        $docref = $collection->document($uid)->set($data);

        $bucName = "internship-assignment-76856.appspot.com"; 
        $stroClient = $storage->getStorageClient();
        $defaultbuc = $storage->getbucket($bucName);
        //$name = $_FILES['imgavatar']['name'];
        $file = fopen($path,'r');
        $_SESSION['filepath'] = $file;
        
        $defaultbuc->upload($file,[
            "name"=>"images/".$_FILES['imgavatar']['name']
        ] );


        $_SESSION['status'] = "Data Saved Successfully";
        header('Location:dash.php');
        exit();

    }
    // else{
    //     $_SESSION['status'] = "Not Allowed";
    //     echo("Not");
    //      header('Location:login.php');
    //      exit();
    // }

    if(isset($_REQUEST['btnForgot']))
    {

        $email = $_POST['txtEmail'];
        $link = $auth->getPasswordResetLink($email);
        $auth->sendPasswordResetLink($email);
        //$send  = $auth->sendPasswordResetEmail($email); 

        $_SESSION['status'] = "Password reset Successfull";
        header('Location:login.php');
        exit();

    }
?>